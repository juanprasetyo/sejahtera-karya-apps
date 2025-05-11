<?php

namespace App\Http\Controllers\Pemdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Pemdes | Dashboard',
            'dataChart' => [
                ['hole', 89],
                ['lala', 23],
                ['kef', 56],
                ['fd', 96],
                ['ge', 45],
                ['hole', 89],
                ['lala', 23],
                ['kef', 56],
                ['fd', 96],
                ['ge', 45],
                ['fd', 96],
                ['ge', 45],
                ['hole', 89],
                ['lala', 23],
                ['kef', 56],
                ['fd', 96],
                ['ge', 45],
            ],
        ];

        return view('pemdes.index', $data);
    }
}
