1. hapus juga semua input di dengan type hidden dan hapus form html dengan id=form_input tapi tidak dengan element di dalamnya
2. ubah <?= $menu ?> jadi {{ $menu }}
3. hapus <?= operator_laporan('String') ?> jika ada dan hapus <?= operator_laporan('Number') ?> jika ada
4. ganti semua lebar input dan select menjadi 229px
5. ubah src img menggunakan blade code style 
6. panggil fungsi tutupLoader(),isiOperatorLaporan("String", "operatorString"),isiOperatorLaporan("Number", "operatorNumber")  di akhir code document ready javascript (cukup dipanggil saja tidak perlu buat code fungsinya lagi)
7. hapus code didalam event click button dengan id btn_export_excel dan btn_print
