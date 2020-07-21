const flashdata = $('.flash-data').data('flashdata');

if(flashdata) {
    Swal.fire({
        tittle: 'Succces',
        text: 'Data berhasil disimpan',
        type: 'success' 
    });
}

// tombol hapus
$('.btnhapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus data!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
}); 