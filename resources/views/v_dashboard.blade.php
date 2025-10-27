<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icon.png') }}">
  <link href="{{ asset('assets/eliteadmin/css/sweetalert2.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('assets/eliteadmin/css/style.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/jquery-clockpicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/daterangepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/eliteadmin/css/spectrum.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/eliteadmin/css/bootstrap-datepicker3.min.css') }}">
  <style>
    body {
      font-size: 12px;
    }

    .h5,
    h5 {
      font-size: 14px;
    }

    @keyframes placeHolderShimmer {
      0% {
        background-position: -468px 0;
      }

      100% {
        background-position: 468px 0;
      }
    }

    .title-block {
      padding-bottom: 24px;
      padding-top: 8px;
    }

    .loading {
      -webkit-animation-duration: 1s;
      -webkit-animation-fill-mode: forwards;
      -webkit-animation-iteration-count: infinite;
      -webkit-animation-name: placeHolderShimmer;
      -webkit-animation-timing-function: linear;
      background: #f0f0f0;
      background-image: -webkit-gradient(linear, left center, right center, from(#f0f0f0), color-stop(.2, #dddddd), color-stop(.4, #f0f0f0), to(#f0f0f0));
      background-image: -webkit-linear-gradient(left, #f0f0f0 0%, #dddddd 20%, #f0f0f0 40%, #f0f0f0 100%);
      background-repeat: no-repeat;
      border-radius: 2px;
    }

    .title {
      height: 10px;
      width: 25%;
      margin-bottom: 28px;
    }

    .content {
      height: 10px;
      margin-bottom: 12px;
    }
  </style>

</head>

<body onLoad="window.history.forward()" class="skin-blue fixed-layout">

  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
    </div>
  </div>

  <div id="main-wrapper">
    <div class="page-wrapper m-0 p-0">
      <div class="container-fluid p-2">
        <div class="card" id="lokasi_wrapper" style="display:none">
          <div class="card body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group p-2 mb-0">
                  <label class="d-block">Lokasi</label>
                  <select id="idlokasi" style="width: 100%" multiple></select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card p-2 mb-2 J9433" id="card-omzet-bulanan" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="wrapper card-body" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Total Omzet Bulanan</h5>
                  <button class="btn btn-primary" id="tglomzetbulanan-trigger">
                    <input type="text" class="p-0" id="tglomzetbulanan"
                      style="border: 0;width: 0px;visibility: visible"><i class="fa fa-calendar"></i>
                  </button>
                </div>

                <p>Pada <span class="periode"></span></p>

                <hr>

                <p>
                  <i class="font-weight-bold fa fa-arrow-down persentase-turun text-danger" style="display: none"></i>
                  <i class="font-weight-bold fa fa-arrow-up persentase-naik text-success" style="display: none"></i>
                  <span class="font-weight-bold persentase-omzet"></span> (<span class="selisih-omzet"></span>)
                  <br>
                  dibandingkan dengan bulan <span class="periode-sebelumnya"></span>
                </p>

                <hr>

                <h6 class="font-weight-bold">Pesanan Penjualan</h6>

                <div class="d-flex no-block justify-content-between">
                  <div>
                    <i class="fa fa-shopping-cart"></i> <span class="jumlah-transaksi-so"></span> transaksi
                  </div>
                  <div>
                    <i class="fa fa-money-bill-alt"></i> <span class="omzet-transaksi-so"></span>
                  </div>
                </div>

                <h6 class="font-weight-bold">Penjualan</h6>

                <div class="d-flex no-block justify-content-between">
                  <div>
                    <i class="fa fa-shopping-cart"></i> <span class="jumlah-transaksi-penjualan"></span> transaksi
                  </div>
                  <div>
                    <i class="fa fa-money-bill-alt"></i> <span class="omzet-transaksi-penjualan"></span>
                  </div>
                </div>
              </div>
            </div>


            <div class="card p-2 OU954" id="card-stok-dibawah-limit" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="card-body wrapper" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Barang dengan Stok Dibawah Limit</h5>
                </div>

                <div style="max-height: 300px; overflow: auto">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Barang</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Limit Min</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 p-0">
            <div class="K984K card p-2 mb-2" id="card-omzet-tahunan" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="wrapper card-body" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Total Omzet Tahunan</h5>
                  <button class="btn btn-primary" style="visibility: hidden">
                    <i class="fa fa-calendar"></i>
                  </button>
                </div>

                <p>Hingga <span class="tanggal"></span></p>

                <hr>

                <p>
                  <i class="font-weight-bold fa fa-arrow-down persentase-turun text-danger" style="display: none"></i>
                  <i class="font-weight-bold fa fa-arrow-up persentase-naik text-success" style="display: none"></i>
                  <span class="font-weight-bold persentase-omzet"></span> (<span class="selisih-omzet"></span>)
                  <br>
                  dibandingkan dengan periode yang sama di tahun <span class="tahun-sebelumnya"></span>
                </p>

                <hr>

                <h6 class="font-weight-bold">Pesanan Penjualan</h6>

                <div class="d-flex no-block justify-content-between">
                  <div>
                    <i class="fa fa-shopping-cart"></i> <span class="jumlah-transaksi-so"></span> transaksi
                  </div>
                  <div>
                    <i class="fa fa-money-bill-alt"></i> <span class="omzet-transaksi-so"></span>
                  </div>
                </div>

                <h6 class="font-weight-bold">Penjualan</h6>

                <div class="d-flex no-block justify-content-between">
                  <div>
                    <i class="fa fa-shopping-cart"></i> <span class="jumlah-transaksi-penjualan"></span> transaksi
                  </div>
                  <div>
                    <i class="fa fa-money-bill-alt"></i> <span class="omzet-transaksi-penjualan"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-2 O9843" id="card-piutang-jatuh-tempo" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="wrapper card-body p-2" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Daftar Piutang Jatuh Tempo (Total: <span class="font-weight-bold"
                      id="total-piutang"></span>)</h5>
                </div>

                <div style="max-height: 300px; overflow: auto">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Kota</th>
                        <th class="text-center">Jth. Tempo Terlama</th>
                        <th class="text-center">Sisa Piutang</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="card K895J" id="card-hutang-jatuh-tempo" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="wrapper card-body p-2" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Daftar Hutang Jatuh Tempo (Total: <span id="total-hutang"></span>)</h5>
                </div>

                <div style="max-height: 300px; overflow: auto">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Supplier</th>
                        <th class="text-center">Kota</th>
                        <th class="text-center">Tgl. Jatuh Tempo</th>
                        <th class="text-center">Sisa Hutang</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card p-2 mb-2 K08K3" id="card-chart-penjualan" style="display:none">
              <div class="skeleton-loading card-body">
                <div class="title-block">
                  <div class="loading title"></div>
                  <div class="loading content"></div>
                  <div class="loading content last-row"></div>
                </div>
              </div>

              <div class="wrapper card-body" style="display: none;">
                <div class="d-flex no-block justify-content-between align-items-center">
                  <h5 class="font-weight-bold">Penjualan 3 Bulan Terakhir</h5>
                  <button class="btn btn-primary" id="tglchartjual-trigger">
                    <input type="text" class="p-0" id="tglchartjual"
                      style="border: 0;width: 0px;visibility: visible"><i class="fa fa-calendar"></i>
                  </button>
                </div>

                <p>Dari : <span class="bulan-awal"></span> - <span class="bulan-akhir"></span></p>

                <canvas id="chart-penjualan-bulanan" style="width: 100%" height="100"></canvas>

                <p class="font-weight-bold mb-0 mt-2">Keterangan : </p>

                <div class="legend"></div>
              </div>
            </div>


            <div class="card p-2 mb-2 G9K43" id="card-so-belum-tuntas" style="display:none">
              <div class="card-body">
                <h5 class="font-weight-bold">Jumlah Transaksi Pesanan Penjualan Belum Tuntas</h4>
                  <span style="font-size: 30px" class="jumlah-transaksi"></span>
              </div>
            </div>


            <div class="card p-2 mb-2 L95K4" id="card-po-belum-tuntas" style="display:none">
              <div class="card-body">
                <h5 class="font-weight-bold">Jumlah Transaksi Pesanan Pembelian Belum Tuntas</h4>
                  <span style="font-size: 30px" class="jumlah-transaksi"></span>
              </div>
            </div>

            <div class="card p-2 mb-2 I854G" id="card-bbk-belum-berlanjut" style="display:none">
              <div class="card-body">
                <h5 class="font-weight-bold">Jumlah Transaksi Pengeluaran Belum Berlanjut</h4>
                  <span style="font-size: 30px" class="jumlah-transaksi"></span>
              </div>
            </div>

            <div class="card p-2 LO094" id="card-bbm-belum-berlanjut" style="display:none">
              <div class="card-body">
                <h5 class="font-weight-bold">Jumlah Transaksi Penerimaan Belum Berlanjut</h4>
                  <span style="font-size: 30px" class="jumlah-transaksi"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/eliteadmin/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/waves.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/custom.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/jquery-clockpicker.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/bootstrap-material-datetimepicker.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/jquery.number.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/spectrum.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/eliteadmin/js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/function.js') }}"></script>
  <script src="{{ asset('assets/js/globalvariable.js') }}"></script>
  <script src="{{ asset('assets/js/api-url.js') }}"></script>

  <script>
    let daftar_bulan = [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    ];
    let tanggalHariIni = new Date();
    let dashboardAksesMap = {
      'G9K43': renderJumlahSOBelumTuntas,
      'L95K4': renderJumlahPOBelumTuntas,
      'I854G': renderJumlahBBKBelumBerlanjut,
      'LO094': renderJumlahBBMBelumBerlanjut,
      'O9843': renderDaftarPiutangCustomerJatuhTempo,
      'K895J': renderDaftarHutangJatuhTempo,
      'OU954': renderStokDibawahLimit,
      'J9433': renderOmzetBulanan,
      'K984K': renderOmzetTahunan,
      'K08K3': renderChartPenjualan
    };
    let data = [];
    var chartjual = null;

    $.ajaxSetup({
      headers: {
        'Authorization': 'Bearer ' + '{{ session('TOKEN') }}'
      },
      dataType: 'json',
    });

    $(document).ready(function() {
      loadAksesDashboard();
    });

    async function loadAksesDashboard() {
      bukaLoader();
      try {
        const response = await fetch(
          link_api.master.user.getDahboardAksesUser, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer {{ session('TOKEN') }}'
            },
            body: JSON.stringify({
              uuiduser: '{{ session('DATAUSER')['uuiduser'] }}',
            })
          }
        );
        if (response.ok) {
          const res = await response.json();
          if (!res.success) {
            throw new Error(res.message);
          }

          data = res.data;
          for (let i = 0; i < data.length; i++) {
            if (data[i].hakakses == 1) {
              $('.' + data[i].kodedashboard).show();
            } else {
              $('.' + data[i].kodedashboard).hide();
            }
          }

          const punya_akses = data.filter((item) => item.hakakses == 1).length > 0;
          if (punya_akses) {
            $('#lokasi_wrapper').show();
            initLokasi();
            const isChartPenjualanAkses = data.find((item) => item.kodedashboard == 'K08K3' && item.hakakses == 1);
            if (isChartPenjualanAkses) {
              $('#tglchartjual').datepicker({
                  format: {
                    language: 'id',
                    toDisplay: function(date, format, language) {
                      var d = new Date(date);

                      return daftar_bulan[d.getMonth()] + ' ' + d.getFullYear();
                    },
                    toValue: function(date, format, language) {
                      return date;
                    }
                  },
                  startView: "months",
                  minViewMode: "months",
                  autoclose: true
                })
                .datepicker('setDate', tanggalHariIni)
                .on('changeDate', function(e) {
                  renderChartPenjualan();
                });

              $('#tglchartjual-trigger').click(function(e) {
                $('#tglchartjual').datepicker('show');
              });
            }

            const isOmzetBulananAkses = data.find((item) => item.kodedashboard == 'J9433' && item.hakakses == 1);
            if (isOmzetBulananAkses) {
              $('#tglomzetbulanan').datepicker({
                  format: {
                    language: 'id',
                    toDisplay: function(date, format, language) {
                      var d = new Date(date);

                      return daftar_bulan[d.getMonth()] + ' ' + d.getFullYear();
                    },
                    toValue: function(date, format, language) {
                      return date;
                    }
                  },
                  startView: "months",
                  minViewMode: "months",
                  autoclose: true
                })
                .datepicker('setDate', tanggalHariIni)
                .on('changeDate', function(e) {
                  renderOmzetBulanan();
                });

              $('#tglomzetbulanan-trigger').click(function(e) {
                $('#tglomzetbulanan').datepicker('show');
              });
            }

            $.ajax({
              url: link_api.master.lokasi.browse,
              type: 'POST',
              dataType: 'JSON',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer {{ session('TOKEN') }}'
              },
              success: function(res) {
                const response = res.data;
                for (var i = 0; i < response.length; i++) {
                  var newOption = $("<option selected='selected'></option>")
                    .val(response[i].uuidlokasi)
                    .text(response[i].nama);

                  $('#idlokasi').append(newOption).trigger('change');
                }

                initRenderDashboard();
              }
            });
          } else {
            $('#lokasi_wrapper').hide();
          }
        } else {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
      } catch (e) {
        showErrorAlert(e);
      }
    }

    function initLokasi() {
      $('#idlokasi').select2({
        ajax: {
          url: link_api.master.lokasi.browse,
          type: 'POST',
          dataType: 'JSON',
          headers: {
            'Authorization': 'Bearer {{ session('TOKEN') }}'
          },
          processResults: function(res) {
            var data = res.data;
            var transformed = data.map(function(item) {
              item.id = item.uuidlokasi;
              item.text = item.nama;

              return item;
            });

            return {
              results: transformed
            };
          }
        }
      });

      $('#idlokasi').on('select2:select', function() {
        initRenderDashboard();
      });

      $('#idlokasi').on('select2:unselect', function() {
        initRenderDashboard();
      });
    }

    function initRenderDashboard() {
      data.forEach(item => {
        if (item.hakakses == 1) {
          const kode = item.kodedashboard;
          const func = dashboardAksesMap[kode];
          if (func) {
            func();
          }
        }
      });
    }

    function renderOmzetBulanan() {
      var el = $('#tglomzetbulanan').datepicker('getDate');
      var bulan = el.getMonth() + 1;
      var tahun = el.getFullYear();
      var bulanPeriodeSebelumnya = bulan - 1 < 0 ? 11 : bulan - 1;
      var tahunPeriodeSebelumnya = bulan - 1 < 0 ? tahun - 1 : tahun;
      var idlokasi = $('#idlokasi').val();

      $('#card-omzet-bulanan').find('.wrapper').hide();
      $('#card-omzet-bulanan').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadOmzetBulanan,
        data: {
          bulan: bulan,
          tahun: tahun,
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-omzet-bulanan');

          el.find('.periode-sebelumnya').text(
            daftar_bulan[bulanPeriodeSebelumnya - 1] + ' ' +
            tahunPeriodeSebelumnya
          );

          el.find('.periode').text(daftar_bulan[bulan - 1] + ' ' + tahun);

          el.find('.jumlah-transaksi-so').text(data.jumlahtransaksi.so);
          el.find('.jumlah-transaksi-penjualan').text(data.jumlahtransaksi.penjualan);

          el.find('.omzet-transaksi-so').text($.number(data.totalomzet.so,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));
          el.find('.omzet-transaksi-penjualan').text($.number(data.totalomzet.penjualan,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));

          el.find('.persentase-omzet').text(parseFloat(data.persentase).toFixed(2));
          el.find('.selisih-omzet').text($.number(data.selisihomzet,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));

          if (data.omzetnaik == 1) {
            el.find('.persentase-naik').show();
            el.find('.persentase-turun').hide();
            el.find('.persentase-omzet').removeClass('text-danger').addClass('text-success');
          } else if (data.omzetnaik == -1) {
            el.find('.persentase-naik').hide();
            el.find('.persentase-turun').show();
            el.find('.persentase-omzet').removeClass('text-success').addClass('text-danger');
          } else if (data.omzetnaik == 0) {
            el.find('.persentase-naik').hide();
            el.find('.persentase-turun').hide();
            el.find('.persentase-omzet').removeClass('text-danger text-success');
          }

          $('#card-omzet-bulanan').find('.wrapper').show();
          $('#card-omzet-bulanan').find('.skeleton-loading').hide();
        }
      });
    }

    function renderJumlahSOBelumTuntas() {
      var idlokasi = $('#idlokasi').val();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadPesananPenjualanBelumTuntas,
        headers: {
          'Authorization': 'Bearer {{ session('TOKEN') }}'
        },
        data: {
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-so-belum-tuntas');

          el.find('.jumlah-transaksi').text(data.jumlah);
        }
      });
    }

    function renderJumlahPOBelumTuntas() {
      var idlokasi = $('#idlokasi').val();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadPesananPembelianBelumTuntas,
        data: {
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-po-belum-tuntas');

          el.find('.jumlah-transaksi').text(data.jumlah);
        }
      })
    }

    function renderJumlahBBKBelumBerlanjut() {
      var idlokasi = $('#idlokasi').val();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadJumlahBBKBelumLanjut,
        data: {
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-bbk-belum-berlanjut');

          el.find('.jumlah-transaksi').text(data.jumlah);
        }
      })
    }

    function renderJumlahBBMBelumBerlanjut() {
      var idlokasi = $('#idlokasi').val();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadJumlahBBMBelumLanjut,
        data: {
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-bbm-belum-berlanjut');

          el.find('.jumlah-transaksi').text(data.jumlah);
        }
      })
    }

    function renderDaftarPiutangCustomerJatuhTempo() {
      var idlokasi = $('#idlokasi').val();

      $('#card-piutang-jatuh-tempo').find('.wrapper').hide();
      $('#card-piutang-jatuh-tempo').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadPiutangCustJatuhTempo,
        data: {
          uuidlokasi: idlokasi,
          page: 1,
          rows: 5
        },
        success: function(response) {
          const data = response.data;
          $('#card-piutang-jatuh-tempo').find('table tbody').html('');

          if (data.length > 0) {
            var total = 0;

            for (var i = 0; i < data.length; i++) {
              var row = data[i];
              total += parseFloat(row.piutang);

              $('#card-piutang-jatuh-tempo table tbody').append(
                `<tr>
                                    <td>${i + 1}</td>
                                    <td>${row.namacustomer}</td>
                                    <td>${row.kota == null ? '-' : row.kota}</td>
                                    <td>${row.tgljatuhtempo}</td>
                                    <td class="text-right">${$.number(row.piutang, {{ session('DECIMALDIGITAMOUNT') }}, ',', '.')}</td>
                                </tr>`
              );
            }

            $('#total-piutang').text($.number(total, {{ session('DECIMALDIGITAMOUNT') }}));
          } else {
            $('#card-piutang-jatuh-tempo').find('table tbody').html(`
                            <tr>
                                <td colspan="4">
                                    <p class="alert alert-primary m-0">
                                        Tidak Ada Piutang yang Sudah Jatuh Tempo.
                                    </p>
                                </td>
                            </tr>
                        `);
          }

          $('#card-piutang-jatuh-tempo').find('.wrapper').show();
          $('#card-piutang-jatuh-tempo').find('.skeleton-loading').hide();
        }
      })
    }

    function renderDaftarHutangJatuhTempo() {
      var idlokasi = $('#idlokasi').val();

      $('#card-hutang-jatuh-tempo').find('.wrapper').hide();
      $('#card-hutang-jatuh-tempo').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadHutangJatuhTempo,
        data: {
          uuidlokasi: idlokasi,
          page: 1,
          rows: 5
        },
        success: function(response) {
          const data = response.data;
          $('#card-hutang-jatuh-tempo').find('table tbody').html('');

          if (data.length > 0) {
            var total = 0;

            for (var i = 0; i < data.length; i++) {
              var row = data[i];
              total += parseFloat(row.hutang);

              $('#card-hutang-jatuh-tempo table tbody').append(
                `<tr>
                    <td>${i + 1}</td>
                    <td>${row.namasupplier}</td>
                    <td>${row.kota == null ? '-' : row.kota}</td>
                    <td>${row.tgljatuhtempo}</td>
                    <td class="text-right">${$.number(row.hutang, {{ session('DECIMALDIGITAMOUNT') }}, ',', '.')}</td>
                </tr>`
              );
            }

            $('#total-hutang').text($.number(total, {{ session('DECIMALDIGITAMOUNT') }}));
          } else {
            $('#card-piutang-jatuh-tempo').find('table tbody').html(`
                            <tr>
                                <td colspan="4">
                                    <p class="alert alert-primary m-0">
                                        Tidak Ada Hutang yang Sudah Jatuh Tempo.
                                    </p>
                                </td>
                            </tr>
                        `);
          }

          $('#card-hutang-jatuh-tempo').find('.wrapper').show();
          $('#card-hutang-jatuh-tempo').find('.skeleton-loading').hide();
        }
      });
    }

    function renderStokDibawahLimit() {
      var idlokasi = $('#idlokasi').val();

      $('#card-stok-dibawah-limit').find('.wrapper').hide();
      $('#card-stok-dibawah-limit').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadBarangStokBawahLimit,
        data: {
          uuidlokasi: idlokasi,
          page: 1,
          rows: 5
        },
        success: function(response) {
          const data = response.data;
          $('#card-stok-dibawah-limit').find('table tbody').html('');

          if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
              var row = data[i];

              $('#card-stok-dibawah-limit table tbody').append(
                `<tr>
                                    <td>${i + 1}</td>
                                    <td>
                                        ${row.namabarang} - ${row.kodebarang} ${((row.barcode != null && row.barcode != '') || (row.partnumber != null && row.partnumber != '')) ? '<br>' : '' }
                                        ${(row.barcode != null && row.barcode != '') ? row.barcode : ''}
                                        ${((row.barcode != null && row.barcode != '') && (row.partnumber != null && row.partnumber != '')) ? '-' : '' }
                                        ${(row.partnumber != null && row.partnumber != '') ? row.partnumber : ''}
                                    </td>
                                    <td class="text-right">${row.stok}</td>
                                    <td class="text-right">${row.limitmin}</td>
                                </tr>`
              );
            }
          } else {
            $('#card-stok-dibawah-limit').find('table tbody').html(`
                            <tr>
                                <td colspan="4">
                                    <p class="alert alert-primary m-0">
                                        Tidak Ada Barang dengan Stok Dibawah Limit.
                                    </p>
                                </td>
                            </tr>
                        `);
          }

          $('#card-stok-dibawah-limit').find('.wrapper').show();
          $('#card-stok-dibawah-limit').find('.skeleton-loading').hide();
        }
      })
    }

    function renderOmzetTahunan() {
      $('#card-omzet-tahunan').find('.tanggal').text(
        tanggalHariIni.getDate() + ' ' +
        daftar_bulan[tanggalHariIni.getMonth()] + ' ' +
        tanggalHariIni.getFullYear()
      );

      $('#card-omzet-tahunan').find('.tahun-sebelumnya').text((tanggalHariIni.getFullYear() - 1) + ' (1 Januari ' + (
        tanggalHariIni.getFullYear() - 1) + ' - ' + tanggalHariIni.getDate() + ' ' + daftar_bulan[tanggalHariIni
        .getMonth()] + ' ' + (tanggalHariIni.getFullYear() - 1) + ')');

      var idlokasi = $('#idlokasi').val();

      $('#card-omzet-tahunan').find('.wrapper').hide();
      $('#card-omzet-tahunan').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadOmzetTahunan,
        data: {
          uuidlokasi: idlokasi
        },
        success: function(response) {
          const data = response.data;
          var el = $('#card-omzet-tahunan');

          el.find('.jumlah-transaksi-so').text(data.jumlahtransaksi.so);
          el.find('.jumlah-transaksi-penjualan').text(data.jumlahtransaksi.penjualan);

          el.find('.omzet-transaksi-so').text($.number(data.totalomzet.so,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));
          el.find('.omzet-transaksi-penjualan').text($.number(data.totalomzet.penjualan,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));

          el.find('.persentase-omzet').text(parseFloat(data.persentase).toFixed(2));
          el.find('.selisih-omzet').text($.number(data.selisihomzet,
            {{ session('DECIMALDIGITAMOUNT') }}, ',', '.'));

          if (data.omzetnaik == 1) {
            el.find('.persentase-naik').show();
            el.find('.persentase-turun').hide();
            el.find('.persentase-omzet').removeClass('text-danger').addClass('text-success');
          } else if (data.omzetnaik == -1) {
            el.find('.persentase-naik').hide();
            el.find('.persentase-turun').show();
            el.find('.persentase-omzet').removeClass('text-success').addClass('text-danger');
          } else if (data.omzetnaik == 0) {
            el.find('.persentase-naik').hide();
            el.find('.persentase-turun').hide();
            el.find('.persentase-omzet').removeClass('text-success').removeClass('text-danger');
          }

          $('#card-omzet-tahunan').find('.wrapper').show();
          $('#card-omzet-tahunan').find('.skeleton-loading').hide();
        }
      })
    }

    function renderChartPenjualan() {
      var el_tanggal = $('#tglchartjual').datepicker('getDate');
      var bulan = el_tanggal.getMonth() + 1;
      var tahun = el_tanggal.getFullYear();
      var el = $('#card-chart-penjualan');
      var idlokasi = $('#idlokasi').val();

      $('#card-chart-penjualan').find('.wrapper').hide();
      $('#card-chart-penjualan').find('.skeleton-loading').show();

      $.ajax({
        type: 'POST',
        url: link_api.atena.dashboard.loadDataChartPenjualan,
        headers: {
          'Authorization': 'Bearer {{ session('TOKEN') }}'
        },
        data: {
          bulan: bulan,
          tahun: tahun,
          uuidlokasi: idlokasi
        },
        success: function(response) {
          response = response.data;
          var canvas = $('#chart-penjualan-bulanan');

          el.find('.legend').html('');

          var labels = [];
          var data = [];

          for (i in response) {
            var bulan_tahun = daftar_bulan[response[i].bulan - 1] + ' ' + response[i].tahun;

            labels.push(bulan_tahun);
            data.push(response[i].total);

            el.find('.legend').append(
              '<div class="d-flex no-block justify-content-between align-items-center">' +
              '<span>' + bulan_tahun + '</span>' +
              '<span>' + $.number(response[i].total, {{ session('DECIMALDIGITAMOUNT') }}, ',',
                '.') + '</span>' +
              '</div>'
            );

            if (i == 0) {
              el.find('.bulan-awal').text(bulan_tahun);
            } else if (i == response.length - 1) {
              el.find('.bulan-akhir').text(bulan_tahun);
            }
          }

          chartjual = new Chart(canvas, {
            type: 'horizontalBar',
            data: {
              labels: labels,
              datasets: [{
                label: false,
                data: data,
                backgroundColor: [
                  'rgb(54, 162, 235)',
                  'rgb(54, 162, 235)',
                  'rgb(54, 162, 235)'
                ],
                borderWidth: 0
              }]
            },
            options: {
              scales: {
                xAxes: [{
                  ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                      return nFormatter(value, 2);
                    }
                  }
                }]
              },
              legend: {
                display: false
              },
              tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {
                    var label = $.number(tooltipItem.xLabel,
                      {{ session('DECIMALDIGITAMOUNT') }}, ',', '.');

                    return label;
                  }
                }
              }
            }
          });

          $('#card-chart-penjualan').find('.wrapper').show();
          $('#card-chart-penjualan').find('.skeleton-loading').hide();
        }
      });
    }
  </script>
</body>

</html>
