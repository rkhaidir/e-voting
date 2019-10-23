// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();

  $('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    console.log('ya');
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Kamu Yakin!',
      text: "Ingin menghapus ini",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
  })

  $('#summernote').summernote({
    placeholder: '',
    tabsize: 3,
    height: 300
  });
  $('#datetimepicker1').datetimepicker({});
});
