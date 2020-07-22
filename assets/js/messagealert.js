const flashData = $('.flash-data').data('flashdata');

if(flashData) {
    let title = flashData == "success" ? "Success" : "Opps!";
    let msg = flashData == "success" ? "Data Berhasil di simpan" : "Terjadi Kesalahan Simpan";
    Swal.fire({
        title: title,
        text: msg,
        icon: flashData 
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