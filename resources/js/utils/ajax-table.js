import axios from "axios";

const ajaxTable = (options, url) => {
  return axios.get(url, {
    params: options,
  }).then((response) => {
    options.tableElement.innerHTML = response.data;
  }).catch(error => {
    console.error('Gagal ambil data:', error);
  });
}

export default ajaxTable;