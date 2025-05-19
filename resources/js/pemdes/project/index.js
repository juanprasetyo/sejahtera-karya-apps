import axios from "axios";
import Swal from "sweetalert2";
import ajaxTable from "../../utils/ajax-table";

document.addEventListener('DOMContentLoaded', function () {
  const swalWithCustomButton = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-error",
      cancelButton: "btn btn-default mr-4"
    },
    buttonsStyling: false
  });

  const projectListElement = document.querySelector('#projects_list');
  const selectPerPageElement = projectListElement?.querySelector('select');
  const searchElement = projectListElement?.querySelector('input[type="search"]');
  const tableElement = projectListElement?.querySelector('#projects_table');

  const url = '/pemdes/projects';

  const runAjaxTable = async () => {
    const options = {
      perPage: selectPerPageElement?.value,
      keywords: searchElement?.value,
      tableElement: tableElement,
    };

    await ajaxTable(options, url);
    registerDeleteButtons();
  };

  selectPerPageElement?.addEventListener('change', runAjaxTable);
  searchElement?.addEventListener('change', runAjaxTable);

  const registerDeleteButtons = () => {
    const buttonsDelete = tableElement?.querySelectorAll('.btn-delete');
    buttonsDelete?.forEach(buttonDelete => {
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
    });
  };

  runAjaxTable();
});
