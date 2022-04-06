//Ajax Tanaman
$(function () {
  $('.tambahTanaman').on('click', function () {
    $('#judulModalTanaman').html('Tambah Data Tanaman');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#qr_image').attr('hidden', '');
    $('#picture').attr('hidden', '');
    $('#peringatan').removeAttr('hidden');
    $('#qr_image').attr('hidden', '');
    $('#simpan').removeAttr('hidden');

    //readonly
    $('#id_spesies').removeAttr('hidden');
    $('#nama_spesies').attr('hidden', '');
    $('#nama_tanaman').removeAttr('readonly');
    $('#ciri_tanaman').removeAttr('readonly');
    $('#nama_jumlah').attr('hidden', '');
    $('#jumlah').attr('hidden', '');
    $('#perawatan_khusus').removeAttr('readonly');
    $('#qr_code').removeAttr('hidden');
    $('#foto').removeAttr('hidden');

    $('.modal-body form').attr('action', '/tanaman/tambah');
    $('#id_spesies').val('');
    $('#nama_tanaman').val('');
    $('#ciri_tanaman').val('');
    $('#jumlah').val('');
    $('#perawatan_khusus').val('');
    $('#qr_code').val('');
    $('#foto').val('');
  });

  $('.editTanaman').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalTanaman').html('Edit Data Tanaman');
    $('.modal-footer button[type=submit]').html('Edit Data');
    $('#simpan').removeAttr('hidden');

    //readonly
    $('#id_spesies').removeAttr('hidden');
    $('#nama_spesies').attr('hidden', '');
    $('#nama_tanaman').removeAttr('readonly');
    $('#ciri_tanaman').removeAttr('readonly');
    $('#nama_jumlah').removeAttr('hidden');
    $('#jumlah').removeAttr('hidden');
    $('#jumlah').attr('readonly', '');
    $('#perawatan_khusus').removeAttr('readonly');
    $('#qr_code').removeAttr('hidden');
    $('#foto').removeAttr('hidden');

    $('.modal-body form').attr('action', '/tanaman/edit');
    $('#qr_image').removeAttr('hidden');
    $('#picture').removeAttr('hidden');
    $('#peringatan').attr('hidden', '');

    $.ajax({
      url: '/tanaman/getedit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_spesies').val(data.id_spesies);
        $('#nama_tanaman').val(data.nama_tanaman);
        $('#ciri_tanaman').val(data.ciri_tanaman);
        $('#jumlah').val(data.jumlah);
        $('#perawatan_khusus').val(data.perawatan_khusus);
        $('#qr_image').attr('src', '/upload/' + data.qr_code);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#qrLama').val(data.qr_code);
        $('#fotoLama').val(data.foto);
        $('#id_tanaman').val(data.id_tanaman);
      },
    });
  });

  $('.detailTanaman').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalTanaman').html('Detail Data Tanaman');
    $('.modal-footer button[type=submit]').attr('Ubah Data');
    $('#simpan').attr('hidden', '');

    //Readonly
    $('#id_spesies').attr('hidden', '');
    $('#nama_spesies').removeAttr('hidden');
    $('#nama_tanaman').attr('readonly', '');
    $('#ciri_tanaman').attr('readonly', '');
    $('#jumlah').attr('readonly', '');
    $('#perawatan_khusus').attr('readonly', '');
    $('#qr_code').attr('hidden', '');
    $('#foto').attr('hidden', '');

    $('.modal-body form').attr('action', '/tanaman/edit');
    $('#qr_image').removeAttr('hidden');
    $('#picture').removeAttr('hidden');
    $('#peringatan').attr('hidden', '');

    $.ajax({
      url: '/tanaman/getdetail',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_spesies').val(data.id_spesies);
        $('#nama_tanaman').val(data.nama_tanaman);
        $('#ciri_tanaman').val(data.ciri_tanaman);
        $('#jumlah').val(data.jumlah);
        $('#perawatan_khusus').val(data.perawatan_khusus);
        $('#qr_image').attr('src', '/upload/' + data.qr_code);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#qrLama').val(data.qr_code);
        $('#fotoLama').val(data.foto);
        $('#id_tanaman').val(data.id_tanaman);
      },
    });
  });
});

//
//
//
//
//
//
//

//Ajax Laporan
$(function () {
  //Tambah Laporan
  $('.tambahLaporan').on('click', function () {
    $('#judulModalLaporan').html('Tambah Data Laporan');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#peringatan').removeAttr('hidden');
    $('#picture').attr('hidden', '');
    $('#simpan').removeAttr('hidden');

    //Readonly
    $('#id_user').removeAttr('hidden');
    $('#id_lokasi').removeAttr('hidden');
    $('#id_sublokasi_tanaman').removeAttr('hidden');
    $('#jenis_laporan').removeAttr('hidden');
    $('#foto').removeAttr('hidden');
    $('#nama_user').attr('hidden', '');
    $('#nama_lokasi').attr('hidden', '');
    $('#nama_sublokasi_tanaman').attr('hidden', '');
    $('#isi_jenis').attr('hidden', '');
    $('#jenis_laporan').removeAttr('readonly');
    $('#isi_laporan').removeAttr('readonly');
    $('#tanggal').removeAttr('readonly');

    $('.modal-body form').attr('action', '/laporan/tambah');
    $('#id_user').val('');
    $('#id_lokasi').val('');
    $('#id_sublokasi_tanaman').val('');
    $('#jenis_laporan').val('');
    $('#isi_laporan').val('');
    $('#tanggal').val('');
    $('#foto').val('');
  });

  //Edit Laporan
  $('.editLaporan').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalLaporan').html('Edit Data Laporan');
    $('.modal-footer button[type=submit]').html('Edit Data');
    $('#picture').removeAttr('hidden');
    $('#simpan').removeAttr('hidden');

    //Readonly
    $('#id_user').removeAttr('hidden');
    $('#id_lokasi').removeAttr('hidden');
    $('#id_sublokasi_tanaman').removeAttr('hidden');
    $('#jenis_laporan').removeAttr('hidden');
    $('#foto').removeAttr('hidden');
    $('#nama_user').attr('hidden', '');
    $('#nama_lokasi').attr('hidden', '');
    $('#nama_sublokasi_tanaman').attr('hidden', '');
    $('#isi_jenis').attr('hidden', '');
    $('#jenis_laporan').removeAttr('readonly');
    $('#isi_laporan').removeAttr('readonly');
    $('#tanggal').removeAttr('readonly');

    $('.modal-body form').attr('action', '/laporan/edit');
    $('#peringatan').attr('hidden', '');

    $.ajax({
      url: '/laporan/getedit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_user').val(data.id_user);
        $('#id_lokasi').val(data.id_lokasi);
        $('#id_sublokasi_tanaman').val(data.id_sublokasi_tanaman);
        $('#jenis_laporan').val(data.jenis_laporan);
        $('#isi_laporan').val(data.isi_laporan);
        $('#tanggal').val(data.tanggal);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#fotoLama').val(data.foto);
        $('#id_laporan').val(data.id_laporan);
      },
    });
  });

  //Detail Laporan
  $('.detailLaporan').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalLaporan').html('Detail Data Laporan');
    $('.modal-footer button[type=submit]').html('Edit Data');
    $('#picture').removeAttr('hidden');
    $('#simpan').attr('hidden', '');

    //Readonly
    $('#id_user').attr('hidden', '');
    $('#id_lokasi').attr('hidden', '');
    $('#id_sublokasi_tanaman').attr('hidden', '');
    $('#jenis_laporan').attr('hidden', '');
    $('#foto').attr('hidden', '');
    $('#nama_user').removeAttr('hidden');
    $('#nama_lokasi').removeAttr('hidden');
    $('#nama_sublokasi_tanaman').removeAttr('hidden');
    $('#isi_jenis').removeAttr('hidden');
    $('#nama_user').attr('readonly', '');
    $('#nama_lokasi').attr('readonly', '');
    $('#nama_sublokasi_tanaman').attr('readonly', '');
    $('#isi_jenis').attr('readonly', '');
    $('#jenis_laporan').attr('readonly', '');
    $('#isi_laporan').attr('readonly', '');
    $('#tanggal').attr('readonly', '');

    $('.modal-body form').attr('action', '/laporan/edit');
    $('#peringatan').attr('hidden', '');

    $.ajax({
      url: '/laporan/getdetail',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_user').val(data.id_user);
        $('#nama_lokasi').val(data.id_lokasi);
        $('#nama_sublokasi_tanaman').val(data.id_sublokasi_tanaman);
        $('#isi_jenis').val(data.jenis_laporan);
        $('#isi_laporan').val(data.isi_laporan);
        $('#tanggal').val(data.tanggal);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#fotoLama').val(data.foto);
        $('#id_laporan').val(data.id_laporan);
      },
    });
  });
});

//
//
//
//
//
//
//

//Ajax Famili
$(function () {
  $('.tambahFamili').on('click', function () {
    $('#judulModalFamili').html('Tambah Data Famili');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('.modal-body form').attr('action', '/klasifikasi/tambahFamili');
    $('#nama_famili').val('');
    $('#keterangan').val('');
  });

  $('.editFamili').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalFamili').html('Edit Data Famili');
    $('.modal-footer button[type=submit]').html('Edit Data');

    $('.modal-body form').attr('action', '/klasifikasi/editFamili');

    $.ajax({
      url: '/klasifikasi/getEditFamili',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_famili').val(data.nama_famili);
        $('#keterangan').val(data.keterangan);
        $('#id_famili').val(data.id_famili);
      },
    });
  });
});

//
//
//
//
//
//
//

//Ajax Famili
$(function () {
  $('.tambahGenus').on('click', function () {
    $('#judulModalGenus').html('Tambah Data Genus');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('.modal-body form').attr('action', '/klasifikasi/tambahGenus');
    $('#id_famili').val('');
    $('#nama_genus').val('');
    $('#keterangan').val('');
  });

  $('.editGenus').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalGenus').html('Edit Data Genus');
    $('.modal-footer button[type=submit]').html('Edit Data');

    $('.modal-body form').attr('action', '/klasifikasi/editGenus');

    $.ajax({
      url: '/klasifikasi/getEditGenus',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_famili').val(data.id_famili);
        $('#nama_famili').val(data.nama_famili);
        $('#nama_genus').val(data.nama_genus);
        $('#keterangan').val(data.keterangan);
        $('#id_genus').val(data.id_genus);
      },
    });
  });
});

//
//
//
//
//
//
//

//Ajax Spesies
$(function () {
  $('.tambahSpesies').on('click', function () {
    $('#judulModalSpesies').html('Tambah Data Spesies');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('.modal-body form').attr('action', '/klasifikasi/tambahSpesies');
    $('#id_genus').val('');
    $('#nama_spesies').val('');
    $('#keterangan').val('');
  });

  $('.editSpesies').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalSpesies').html('Edit Data Spesies');
    $('.modal-footer button[type=submit]').html('Edit Data');

    $('.modal-body form').attr('action', '/klasifikasi/editSpesies');

    $.ajax({
      url: '/klasifikasi/getEditSpesies',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_genus').val(data.id_genus);
        $('#nama_genus').val(data.nama_genus);
        $('#nama_spesies').val(data.nama_spesies);
        $('#keterangan').val(data.keterangan);
        $('#id_spesies').val(data.id_spesies);
      },
    });
  });
});

//
//
//
//
//

// Ajax Perawatan
$(function () {
  $('.tambahPerawatan').on('click', function () {
    $('#judulModalPerawatan').html('Tambah Data Perawatan');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#simpan').removeAttr('hidden');

    //Readonly
    $('#nama_tanaman').attr('hidden', '');
    $('#nama_tanaman').attr('readonly', '');
    $('#id_tanaman').removeAttr('hidden');
    $('#nama').attr('hidden', '');
    $('#nama').attr('readonly', '');
    $('#id_user').removeAttr('hidden');
    $('#nama_lokasi').attr('hidden', '');
    $('#nama_lokasi').attr('readonly', '');
    $('#id_lokasi').removeAttr('hidden');
    $('#input_jenis_perawatan').attr('hidden', '');
    $('#input_jenis_perawatan').attr('readonly', '');
    $('#jenis_perawatan').removeAttr('hidden');
    $('#waktu').removeAttr('readonly', '');
    $('#tanggal').removeAttr('readonly', '');
    $('#input_status_perawatan').attr('hidden', '');
    $('#input_status_perawatan').attr('readonly', '');
    $('#status_perawatan').removeAttr('hidden');

    $('.modal-body form').attr('action', '/perawatan/tambah');
    $('#id_user').val('');
    $('#id_lokasi').val('');
    $('#jenis_perawatan').val('');
    $('#waktu').val('');
    $('#tanggal').val('');
  });

  $('.editPerawatan').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalPerawatan').html('Edit Data Perawatan');
    $('.modal-footer button[type=submit]').html('Edit Data');
    $('#simpan').removeAttr('hidden');

    //Readonly
    $('#nama_tanaman').attr('hidden', '');
    $('#nama_tanaman').attr('readonly', '');
    $('#id_tanaman').removeAttr('hidden');
    $('#nama').attr('hidden', '');
    $('#nama').attr('readonly', '');
    $('#id_user').removeAttr('hidden');
    $('#nama_lokasi').attr('hidden', '');
    $('#nama_lokasi').attr('readonly', '');
    $('#id_lokasi').removeAttr('hidden');
    $('#input_jenis_perawatan').attr('hidden', '');
    $('#input_jenis_perawatan').attr('readonly', '');
    $('#jenis_perawatan').removeAttr('hidden');
    $('#waktu').removeAttr('readonly', '');
    $('#tanggal').removeAttr('readonly', '');
    $('#input_status_perawatan').attr('hidden', '');
    $('#input_status_perawatan').attr('readonly', '');
    $('#status_perawatan').removeAttr('hidden');

    $('.modal-body form').attr('action', '/perawatan/edit');
    $('#peringatan').attr('hidden', '');

    $.ajax({
      url: '/perawatan/getedit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_perawatan').val(data.id_perawatan);
        $('#id_tanaman').val(data.id_tanaman);
        $('#id_user').val(data.id_user);
        $('#nama').val(data.nama);
        $('#id_lokasi').val(data.id_lokasi);
        $('#nama_lokasi').val(data.nama_lokasi);
        $('#jenis_perawatan').val(data.jenis_perawatan);
        $('#waktu').val(data.waktu);
        $('#tanggal').val(data.tanggal);
        $('#status_perawatan').val(data.status_perawatan);
      },
    });
  });

  $('.detailPerawatan').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalPerawatan').html('Detail Data Perawatan');
    $('.modal-footer button[type=submit]').attr('Ubah Data');
    $('#simpan').attr('hidden', '');

    $('.modal-body form').attr('action', '/perawatan/detail');

    //Readonly
    $('#nama_tanaman').removeAttr('hidden');
    $('#nama_tanaman').attr('readonly', '');
    $('#id_tanaman').attr('hidden', '');
    $('#nama').removeAttr('hidden');
    $('#nama').attr('readonly', '');
    $('#id_user').attr('hidden', '');
    $('#nama_lokasi').removeAttr('hidden');
    $('#nama_lokasi').attr('readonly', '');
    $('#id_lokasi').attr('hidden', '');
    $('#input_jenis_perawatan').removeAttr('hidden');
    $('#input_jenis_perawatan').attr('readonly', '');
    $('#jenis_perawatan').attr('hidden', '');
    $('#waktu').attr('readonly', '');
    $('#tanggal').attr('readonly', '');
    $('#input_status_perawatan').removeAttr('hidden');
    $('#input_status_perawatan').attr('readonly', '');
    $('#status_perawatan').attr('hidden', '');

    $.ajax({
      url: '/perawatan/getdetail',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_perawatan').val(data.id_perawatan);
        $('#id_tanaman').val(data.id_tanaman);
        $('#nama_tanaman').val(data.nama_tanaman);
        $('#id_user').val(data.id_user);
        $('#nama').val(data.nama);
        $('#id_lokasi').val(data.id_lokasi);
        $('#nama_lokasi').val(data.nama_lokasi);
        $('#input_jenis_perawatan').val(data.jenis_perawatan);
        $('#waktu').val(data.waktu);
        $('#tanggal').val(data.tanggal);
        $('#input_status_perawatan').val(data.status_perawatan);
      },
    });
  });
});

//
//
//
//
//

//Ajax Lokasi
$(function () {
  $('.tambahLokasi').on('click', function () {
    $('#judulModalLokasi').html('Tambah Data Lokasi');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#simpan').removeAttr('hidden');

    //readonly
    $('#nama_lokasi').removeAttr('readonly');
    $('#keterangan').removeAttr('readonly');

    $('.modal-body form').attr('action', '/lokasi/tambahLokasi');
    $('#nama_lokasi').val('');
    $('#keterangan').val('');
  });

  $('.editLokasi').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalLokasi').html('Edit Data Lokasi');
    $('.modal-footer button[type=submit]').html('Edit Data');
    $('#simpan').removeAttr('hidden');

    //readonly
    $('#nama_lokasi').removeAttr('readonly');
    $('#keterangan').removeAttr('readonly');

    $('.modal-body form').attr('action', '/lokasi/editLokasi');

    $.ajax({
      url: '/lokasi/getEditLokasi',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_lokasi').val(data.nama_lokasi);
        $('#keterangan').val(data.keterangan);
        $('#id_lokasi').val(data.id_lokasi);
      },
    });
  });

  $('.detailLokasi').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalLokasi').html('Detail Data Lokasi');
    // $('.modal-footer button[type=submit]').attr('Ubah Data')
    $('#simpan').attr('hidden', '');

    //Readonly
    $('#nama_lokasi').attr('readonly', '');
    $('#keterangan').attr('readonly', '');

    $('.modal-body form').attr('action', '/lokasi/detail');

    $.ajax({
      url: '/lokasi/getDetailLokasi',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_lokasi').val(data.nama_lokasi);
        $('#keterangan').val(data.keterangan);
      },
    });
  });
});

//
//
//
//
//

//Ajax Lokasi
$(function () {
  $('.tambahSublokasi').on('click', function () {
    $('#judulModalSublokasi').html('Tambah Data Sublokasi');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('.modal-body form').attr('action', '/lokasi/tambahSublokasi');

    $('#picture').attr('hidden', '');

    $('#id_tanaman').val('');
    $('#id_lokasi').val('');
    $('#detail_sublokasi').val('');
    $('#media_tanam').val('');
    $('#foto').val('');
  });

  $('.editSublokasi').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalSublokasi').html('Edit Data Sublokasi');
    $('.modal-footer button[type=submit]').html('Edit Data');

    $('.modal-body form').attr('action', '/lokasi/editSublokasi');

    //Readonly
    $('#nama_tanaman').attr('hidden', '');
    $('#id_tanaman').removeAttr('hidden');
    $('#nama_lokasi').attr('hidden', '');
    $('#id_lokasi').removeAttr('hidden');
    $('#detail_sublokasi').removeAttr('readonly');
    $('#pilih_media_tanam').attr('hidden', '');
    $('#media_tanam').removeAttr('hidden');
    $('#picture').attr('hidden');
    $('#foto').removeAttr('hidden');
    $('#peringatan').attr('hidden', '');
    $('#picture').removeAttr('hidden');
    $('#simpan').removeAttr('hidden');

    $.ajax({
      url: '/lokasi/getEditSublokasi',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#id_tanaman').val(data.id_tanaman);
        $('#id_lokasi').val(data.id_lokasi);
        $('#detail_sublokasi').val(data.detail_sublokasi);
        $('#media_tanam').val(data.media_tanam);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#fotoLama').val(data.foto);
        $('#id_sublokasi_tanaman').val(data.id_sublokasi_tanaman);
      },
    });
  });

  $('.detailSublokasi').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalSublokasi').html('Detail Data Sublokasi');
    // $('.modal-footer button[type=submit]').attr('Ubah Data')
    $('#simpan').attr('hidden', '');

    //Readonly
    $('#nama_tanaman').removeAttr('hidden');
    $('#nama_tanaman').attr('readonly', '');
    $('#id_tanaman').attr('hidden', '');
    $('#nama_lokasi').removeAttr('hidden');
    $('#nama_lokasi').attr('readonly', '');
    $('#id_lokasi').attr('hidden', '');
    $('#detail_sublokasi').attr('readonly', '');
    $('#pilih_media_tanam').removeAttr('hidden');
    $('#pilih_media_tanam').attr('readonly', '');
    $('#media_tanam').attr('hidden', '');
    $('#picture').removeAttr('hidden');
    $('#foto').attr('hidden', '');
    $('#peringatan').attr('hidden', '');

    $('.modal-body form').attr('action', '/lokasi/detail');

    $.ajax({
      url: '/lokasi/getDetailLokasi',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_tanaman').val(data.id_tanaman);
        $('#nama_lokasi').val(data.id_lokasi);
        $('#detail_sublokasi').val(data.detail_sublokasi);
        $('#pilih_media_tanam').val(data.media_tanam);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#fotoLama').val(data.foto);
        $('#id_sublokasi_tanaman').val(data.id_sublokasi_tanaman);
      },
    });
  });
});
//
//
//
//
//
//Ajax Famili
$(function () {
  $('.tambahPengelola').on('click', function () {
    $('#judulModalPengelola').html('Tambah Data Pengelola');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('#password').removeAttr('hidden');
    $('#label_pass').removeAttr('hidden');
    $('#peringatan').removeAttr('hidden');
    $('#foto').removeAttr('hidden');
    $('#picture').attr('hidden', '');

    $('.modal-body form').attr('action', '/pengelola/tambah');
    $('#nama_pengelola').val('');
    $('#email').val('');
    $('#password').val('');
    $('#no_telp').val('');
  });

  $('.editPengelola').on('click', function () {
    const id = $(this).data('id');

    $('#judulModalPengelola').html('Edit Data Pengelola');
    $('.modal-footer button[type=submit]').html('Edit Data');

    $('#password').attr('hidden', '');
    $('#label_pass').attr('hidden', '');
    $('#peringatan').attr('hidden', '');
    $('#foto').attr('hidden', '');
    $('#picture').removeAttr('hidden');

    $('.modal-body form').attr('action', '/pengelola/edit');

    $.ajax({
      url: '/pengelola/getEdit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama_pengelola').val(data.nama);
        $('#email').val(data.email);
        $('#no_telp').val(data.no_telp);
        $('#picture').attr('src', '/upload/' + data.foto);
        $('#fotoLama').val(data.foto);
        $('#id_pengelola').val(data.id_user);
      },
    });
  });
});
