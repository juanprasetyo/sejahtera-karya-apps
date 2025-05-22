<?php

namespace App\Http\Controllers\Pemdes;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keywords = $request->input('keywords', "");
        $perPage = $request->input('perPage', '10');
        $userId = Auth::id();
        $data = Project::select('id', 'name as nama', 'start_date as tanggal_mulai', 'end_date as tanggal_berakhir', 'required_workers as pekerja_dibutuhkan')
                        ->where('user_id', $userId)
                        ->where('name', 'like', '%' . $keywords . '%')
                        ->orderBy('id', 'desc')
                        ->paginate($perPage)
                        ->appends(['perPage' => $perPage, 'keywords' => $keywords])
                        ->onEachSide(1);

        if ($request->ajax()) {
            return view('partials.table', compact('data'))->render();
        }

        return view('pemdes.projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemdes.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:20|max:500',
            'start_date' => 'required|after_or_equal:today',
            'end_date' => 'required|after_or_equal:start_date',
            'required_workers' => 'required|gt:1'
        ]);

        try {
            $project = Project::create([
                'user_id' => $userId,
                ...$validatedData,
            ]);
            if ($project) return redirect()
                                    ->route('pemdes.projects.create')
                                    ->with('status', 'success')
                                    ->with('message', 'Proyek berhasil dibuat.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('pemdes.projects.create')
                ->with('status', 'error')
                ->with('status', $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = Auth::id();
        $project = Project::with('user')->find($id);

        if (!$project) {
            return abort(404);
        }

        if ($project->user_id !== $userId) {
            return abort(403, 'Kamu tidak memiliki akses ke proyek ini.');
        }
        
        return view('pemdes.projects.detail', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userId = Auth::id();
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                "message" => "Data tidak ditemukan."
            ], 404);
        }

        if ($project->user_id !== $userId) {
            return response()->json([
                'message' => "Kamu tidak punya akses!"
            ], 400);
        }

        $deleted = $project->delete();
        if ($deleted > 0) {
            return response()->json([
                'message' => "Berhasil dihapus."
            ], 200);
        } else {
            return response()->json([
                'message' => "Internal server error."
            ], 500);
        }
    }
}
