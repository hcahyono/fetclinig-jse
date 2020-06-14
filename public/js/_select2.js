$(function(){
  console.log('loaded')
  if ($('#select_peliharaan').length > 0) {
    $('#select_peliharaan').select2({
      theme: "bootstrap",
      language: "id",
      placeholder: "Ketik nama pemilik atau peliharaan",
      dropdownAutoWidth: true,
      minimumInputLength: 3,
      ajax: {
        url: $('#select_peliharaan').data('url'),
        type: "get",
        // headers: {"X-CSRF-TOKEN": _token},
        dataType: "json",
        delay: 500, // wait 500 milliseconds before triggering the request
        processResults: function (data, params) {
            // console.log(data);
            params.page = params.page || 1;
            return {results: data.data, pagination: {more: (params.page * 10) < data.total}};
        }
      }
    })
  }
});