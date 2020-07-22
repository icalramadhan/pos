const flashData = $('.flash-data').data('flashdata');
const flashDataLogin = $('.flash-datalogin').data('flashdata');

if(flashData) {
    let title = (flashData == "success" || flashData == "successlogin") ? "Success" : "Opps!";
    let msg = flashData == "success" ? "Data Berhasil di simpan"  : (flashData == "successlogin" ? "Anda berhasil login" : "Terjadi Kesalahan Simpan");
    let icon = (flashData == "success" || flashData == "successlogin") ? "success" : "error";
    Swal.fire({
        title: title,
        text: msg,
        icon: icon
    });
}

if(flashDataLogin) {
  let title = "Opps!";
  let msg = "Terjadi Kesalahan Simpan Password atau Username";
  let icon = "error";
  Swal.fire({
      title: title,
      text: msg,
      icon: icon
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

// tombol logout
$('.btnlogout').on('click', function (e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Logout!'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })
}); 