import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function() {
  const swalWithCustomButton = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-error",
      cancelButton: "btn btn-default mr-4"
    },
    buttonsStyling: false
  });

  const buttonDelete = document.querySelector('.btn-delete');
  
  buttonDelete.addEventListener('click', function (event) {
    event.preventDefault();
    const dataId = this.getAttribute('data-id');

    swalWithCustomButton.fire({
      title: "Apakah kamu yakin?",
      text: "Kamu tidak akan dapat membatalkan ini!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Ya, hapus!",
      cancelButtonText: "Tidak, batalkan!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        axios.delete(`${url}/${dataId}`)
          .then(response => {
            if (response.status === 200) {
              swalWithCustomButton.fire({
                title: "Terhapus!",
                text: "Proyek berhasil dihapus.",
                icon: "success"
              });
              runAjaxTable();
            }
          }).catch((error) => {
            swalWithCustomButton.fire({
              title: "Error",
              text: error?.response?.data?.message || "Gagal menghapus proyek.",
              icon: "error"
            });
          });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithCustomButton.fire({
          title: "Dibatalkan",
          text: "Proyek batal dihapus.",
          icon: "error"
        });
      }
    });
  });
})
