@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Master</label>
      <div align="right" valign="top">
        <p>Proses 3 dari 10</p>
        {{-- signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:prev()"><i class="far fa-arrow-alt-circle-left"></i> Sebelumnya</a>
        <a class="easyui-linkbutton" onclick="javascript:simpan()"><i class="fas fa-save"></i> Simpan</a>
        {{-- end signup condition --}}
        <a class="easyui-linkbutton" onclick="javascript:next()"><i class="far fa-arrow-alt-circle-right"></i> Simpan dan
          Lanjut</a>
      </div>
    </div>
    <div id="form_input" style="width:100%;height:100%">
      <input type="hidden" name="mode" id="mode">
      <input type="hidden" name="uuidperusahaan" id="IDPERUSAHAAN">
      <table style="padding:5px">
        <tr>
          <td align="center" id="label_form"></td>
          <td align="center" id="label_form">Auto</td>
          <td align="center" id="label_form">Prefix</td>
          <td align="center" id="label_form">Jumlah Digit</td>
          <td align="center" id="label_form" style="width:100px">Contoh</td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Lokasi</td>
          <td align="center" id="label_form"><input id="SBLOKASI" name="sblokasi" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXLOKASI" name="prefixlokasi" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITLOKASI" name="digitlokasi" style="width:80px" class="number"
              data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELLOKASI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Barang</td>
          <td align="center" id="label_form"><input id="SBBARANG" name="sbbarang" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXBARANG" name="prefixbarang" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITBARANG" name="digitbarang" style="width:80px" class="number"
              data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELBARANG"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Syarat Bayar</td>
          <td align="center" id="label_form"><input id="SBSYARATBAYAR" name="sbsyaratbayar" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSYARATBAYAR" name="prefixsyaratbayar" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSYARATBAYAR" name="digitsyaratbayar" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSYARATBAYAR"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Pemasok</td>
          <td align="center" id="label_form"><input id="SBSUPPLIER" name="sbsupplier" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSUPPLIER" name="prefixsupplier" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSUPPLIER" name="digitsupplier" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSUPPLIER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Ekspedisi</td>
          <td align="center" id="label_form"><input id="SBEKSPEDISI" name="sbekspedisi" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXEKSPEDISI" name="prefixekspedisi" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITEKSPEDISI" name="digitekspedisi" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELEKSPEDISI"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Departemen Kerja</td>
          <td align="center" id="label_form"><input id="SBDEPARTEMENKERJA" name="sbdepartemenkerja"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXDEPARTEMENKERJA" name="prefixdepartemenkerja"
              style="width:40px" class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITDEPARTEMENKERJA" name="digitdepartemenkerja"
              style="width:80px" class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELDEPARTEMENKERJA"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Sopir</td>
          <td align="center" id="label_form"><input id="SBSOPIR" name="sbsopir" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSOPIR" name="prefixsopir" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITSOPIR" name="digitsopir" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELSOPIR"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Kendaraan</td>
          <td align="center" id="label_form"><input id="SBKENDARAAN" name="sbkendaraan" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXKENDARAAN" name="prefixkendaraan" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITKENDARAAN" name="digitkendaraan" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELKENDARAAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Pelanggan</td>
          <td align="center" id="label_form"><input id="SBCUSTOMER" name="sbcustomer" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXCUSTOMER" name="prefixcustomer" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITCUSTOMER" name="digitcustomer" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELCUSTOMER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Jenis Pemakaian</td>
          <td align="center" id="label_form"><input id="SBJENISPEMAKAIAN" name="sbjenispemakaian"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXJENISPEMAKAIAN" name="prefixjenispemakaian"
              style="width:40px" class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITJENISPEMAKAIAN" name="digitjenispemakaian"
              style="width:80px" class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELJENISPEMAKAIAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kode Mata Uang</td>
          <td align="center" id="label_form"><input id="SBCURRENCY" name="sbcurrency" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXCURRENCY" name="prefixcurrency" style="width:40px"
              class="label_input"></td>
          <td align="center" id="label_form"><input id="DIGITCURRENCY" name="digitcurrency" style="width:80px"
              class="number" data-options="precision:0"></td>
          <td align="left" id="label_form"><label id="LABELCURRENCY"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $("#mode").val("0");
      $("#SBLOKASI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXLOKASI").textbox("disable").textbox("clear");
            $("#DIGITLOKASI").numberbox("disable").numberbox("clear");
            generate_kode("LOKASI");
          } else {
            getDataConfig("LOKASI");
          }
        }
      });

      $("#SBBARANG").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXBARANG").textbox("disable").textbox("clear");
            $("#DIGITBARANG").numberbox("disable").numberbox("clear");
            generate_kode("BARANG");
          } else {
            getDataConfig("BARANG");
          }
        }
      });

      $("#SBSYARATBAYAR").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSYARATBAYAR").textbox("disable").textbox("clear");
            $("#DIGITSYARATBAYAR").numberbox("disable").numberbox("clear");
            generate_kode("SYARATBAYAR");
          } else {
            getDataConfig("SYARATBAYAR");
          }
        }
      });

      $("#SBSUPPLIER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSUPPLIER").textbox("disable").textbox("clear");
            $("#DIGITSUPPLIER").numberbox("disable").numberbox("clear");
            generate_kode("SUPPLIER");
          } else {
            getDataConfig("SUPPLIER");
          }
        }
      });

      $("#SBEKSPEDISI").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXEKSPEDISI").textbox("disable").textbox("clear");
            $("#DIGITEKSPEDISI").numberbox("disable").numberbox("clear");
            generate_kode("EKSPEDISI");
          } else {
            getDataConfig("EKSPEDISI");
          }
        }
      });

      $("#SBDEPARTEMENKERJA").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXDEPARTEMENKERJA").textbox("disable").textbox("clear");
            $("#DIGITDEPARTEMENKERJA").numberbox("disable").numberbox("clear");
            generate_kode("DEPARTEMENKERJA");
          } else {
            getDataConfig("DEPARTEMENKERJA");
          }
        }
      });

      $("#SBSOPIR").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSOPIR").textbox("disable").textbox("clear");
            $("#DIGITSOPIR").numberbox("disable").numberbox("clear");
            generate_kode("SOPIR");
          } else {
            getDataConfig("SOPIR");
          }
        }
      });

      $("#SBKENDARAAN").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXKENDARAAN").textbox("disable").textbox("clear");
            $("#DIGITKENDARAAN").numberbox("disable").numberbox("clear");
            generate_kode("KENDARAAN");
          } else {
            getDataConfig("KENDARAAN");
          }
        }
      });

      $("#SBCUSTOMER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXCUSTOMER").textbox("disable").textbox("clear");
            $("#DIGITCUSTOMER").numberbox("disable").numberbox("clear");
            generate_kode("CUSTOMER");
          } else {
            getDataConfig("CUSTOMER");
          }
        }
      });

      $("#SBJENISPEMAKAIAN").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXJENISPEMAKAIAN").textbox("disable").textbox("clear");
            $("#DIGITJENISPEMAKAIAN").numberbox("disable").numberbox("clear");
            generate_kode("JENISPEMAKAIAN");
          } else {
            getDataConfig("JENISPEMAKAIAN");
          }
        }
      });

      $("#SBCURRENCY").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXCURRENCY").textbox("disable").textbox("clear");
            $("#DIGITCURRENCY").numberbox("disable").numberbox("clear");
            generate_kode("CURRENCY");
          } else {
            getDataConfig("CURRENCY");
          }
        }
      });

      $("#PREFIXLOKASI").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("LOKASI");
          }
        }
      });
      $("#DIGITLOKASI").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("LOKASI");
          }
        }
      });

      $("#PREFIXUSER").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("USER");
          }
        }
      });
      $("#DIGITUSER").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("USER");
          }
        }
      });

      $("#PREFIXMERK").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("MERK");
          }
        }
      });
      $("#DIGITMERK").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("MERK");
          }
        }
      });

      $("#PREFIXBARANG").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("BARANG");
          }
        }
      });
      $("#DIGITBARANG").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("BARANG");
          }
        }
      });

      $("#PREFIXSYARATBAYAR").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SYARATBAYAR");
          }
        }
      });
      $("#DIGITSYARATBAYAR").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SYARATBAYAR");
          }
        }
      });

      $("#PREFIXSUPPLIER").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SUPPLIER");
          }
        }
      });
      $("#DIGITSUPPLIER").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SUPPLIER");
          }
        }
      });

      $("#PREFIXEKSPEDISI").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("EKSPEDISI");
          }
        }
      });
      $("#DIGITEKSPEDISI").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("EKSPEDISI");
          }
        }
      });

      $("#PREFIXDEPARTEMENKERJA").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("DEPARTEMENKERJA");
          }
        }
      });
      $("#DIGITDEPARTEMENKERJA").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("DEPARTEMENKERJA");
          }
        }
      });

      $("#PREFIXSOPIR").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SOPIR");
          }
        }
      });
      $("#DIGITSOPIR").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("SOPIR");
          }
        }
      });

      $("#PREFIXKENDARAAN").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("KENDARAAN");
          }
        }
      });
      $("#DIGITKENDARAAN").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("KENDARAAN");
          }
        }
      });

      $("#PREFIXCUSTOMER").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("CUSTOMER");
          }
        }
      });
      $("#DIGITCUSTOMER").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("CUSTOMER");
          }
        }
      });

      $("#PREFIXJENISPEMAKAIAN").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("JENISPEMAKAIAN");
          }
        }
      });
      $("#DIGITJENISPEMAKAIAN").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("JENISPEMAKAIAN");
          }
        }
      });

      $("#PREFIXCURRENCY").textbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).textbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("CURRENCY");
          }
        }
      });
      $("#DIGITCURRENCY").numberbox({
        onChange: function(newValue, oldValue) {
          var opt = $(this).numberbox('options');
          if (opt.disabled == false && newValue != oldValue) {
            generate_kode("CURRENCY");
          }
        }
      });

      getDataMaster();
    });

    async function loadDataMaster(data) {
      lokasi = data.lokasi.prefix;
      barang = data.barang.prefix;
      syaratbayar = data.syaratbayar.prefix;
      supplier = data.supplier.prefix;
      ekspedisi = data.ekspedisi.prefix;
      departemenkerja = data.departemenkerja.prefix;
      sopir = data.sopir.prefix;
      kendaraan = data.kendaraan.prefix;
      customer = data.customer.prefix;
      jenispemakaian = data.jenispemakaian.prefix;
      currency = data.currency.prefix;

      $("#PREFIXLOKASI").textbox("setValue", lokasi.replace("[NUM]", ""));
      $("#PREFIXBARANG").textbox("setValue", barang.replace("[NUM]", ""));
      $("#PREFIXSYARATBAYAR").textbox("setValue", syaratbayar.replace("[NUM]", ""));
      $("#PREFIXSUPPLIER").textbox("setValue", supplier.replace("[NUM]", ""));
      $("#PREFIXEKSPEDISI").textbox("setValue", ekspedisi.replace("[NUM]", ""));
      $("#PREFIXDEPARTEMENKERJA").textbox("setValue", departemenkerja.replace("[NUM]", ""));
      $("#PREFIXSOPIR").textbox("setValue", sopir.replace("[NUM]", ""));
      $("#PREFIXKENDARAAN").textbox("setValue", kendaraan.replace("[NUM]", ""));
      $("#PREFIXCUSTOMER").textbox("setValue", customer.replace("[NUM]", ""));
      $("#PREFIXJENISPEMAKAIAN").textbox("setValue", jenispemakaian.replace("[NUM]", ""));
      $("#PREFIXCURRENCY").textbox("setValue", currency.replace("[NUM]", ""));

      $("#DIGITLOKASI").numberbox("setValue", data.lokasi.jumlahdigit);
      $("#DIGITBARANG").numberbox("setValue", data.barang.jumlahdigit);
      $("#DIGITSYARATBAYAR").numberbox("setValue", data.syaratbayar.jumlahdigit);
      $("#DIGITSUPPLIER").numberbox("setValue", data.supplier.jumlahdigit);
      $("#DIGITEKSPEDISI").numberbox("setValue", data.ekspedisi.jumlahdigit);
      $("#DIGITDEPARTEMENKERJA").numberbox("setValue", data.departemenkerja.jumlahdigit);
      $("#DIGITSOPIR").numberbox("setValue", data.sopir.jumlahdigit);
      $("#DIGITKENDARAAN").numberbox("setValue", data.kendaraan.jumlahdigit);
      $("#DIGITCUSTOMER").numberbox("setValue", data.customer.jumlahdigit);
      $("#DIGITJENISPEMAKAIAN").numberbox("setValue", data.jenispemakaian.jumlahdigit);
      $("#DIGITCURRENCY").numberbox("setValue", data.currency.jumlahdigit);

      if (data.lokasi.value == "AUTO") {
        $("#SBLOKASI").switchbutton('check');
      } else {
        $("#SBLOKASI").switchbutton('uncheck');
      }

      if (data.barang.value == "AUTO") {
        $("#SBBARANG").switchbutton('check');
      } else {
        $("#SBBARANG").switchbutton('uncheck');
      }

      if (data.syaratbayar.value == "AUTO") {
        $("#SBSYARATBAYAR").switchbutton('check');
      } else {
        $("#SBSYARATBAYAR").switchbutton('uncheck');
      }

      if (data.supplier.value == "AUTO") {
        $("#SBSUPPLIER").switchbutton('check');
      } else {
        $("#SBSUPPLIER").switchbutton('uncheck');
      }

      if (data.ekspedisi.value == "AUTO") {
        $("#SBEKSPEDISI").switchbutton('check');
      } else {
        $("#SBEKSPEDISI").switchbutton('uncheck');
      }

      if (data.departemenkerja.value == "AUTO") {
        $("#SBDEPARTEMENKERJA").switchbutton('check');
      } else {
        $("#SBDEPARTEMENKERJA").switchbutton('uncheck');
      }

      if (data.sopir.value == "AUTO") {
        $("#SBSOPIR").switchbutton('check');
      } else {
        $("#SBSOPIR").switchbutton('uncheck');
      }

      if (data.kendaraan.value == "AUTO") {
        $("#SBKENDARAAN").switchbutton('check');
      } else {
        $("#SBKENDARAAN").switchbutton('uncheck');
      }

      if (data.customer.value == "AUTO") {
        $("#SBCUSTOMER").switchbutton('check');
      } else {
        $("#SBCUSTOMER").switchbutton('uncheck');
      }

      if (data.jenispemakaian.value == "AUTO") {
        $("#SBJENISPEMAKAIAN").switchbutton('check');
      } else {
        $("#SBJENISPEMAKAIAN").switchbutton('uncheck');
      }

      if (data.currency.value == "AUTO") {
        $("#SBCURRENCY").switchbutton('check');
      } else {
        $("#SBCURRENCY").switchbutton('uncheck');
      }
      const promises = [
        generate_kode("LOKASI"),
        generate_kode("BARANG"),
        generate_kode("SYARATBAYAR"),
        generate_kode("SUPPLIER"),
        generate_kode("EKSPEDISI"),
        generate_kode("DEPARTEMENKERJA"),
        generate_kode("SOPIR"),
        generate_kode("KENDARAAN"),
        generate_kode("CUSTOMER"),
        generate_kode("JENISPEMAKAIAN"),
        generate_kode("CURRENCY"),
      ];

      await Promise.all(promises);
    }

    async function getDataMaster() {
      try {
        const response = await parent.fetchData(link_api.loadSettingMaster, null);

        if (response.success) {
          await loadDataMaster(response.data);
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      } finally {
        tutupLoader();
      }
    }

    async function getDataConfig(modul) {
      try {
        const response = await parent.fetchData(link_api.loadConfigMaster, {
          modul: modul
        });

        if (response.success) {
          const msg = response.data;
          $("#PREFIX" + modul).textbox("setValue", msg.prefix.replace("[NUM]", ""));
          $("#DIGIT" + modul).numberbox("setValue", msg.jumlahdigit);

          generate_kode(modul);

          $("#PREFIX" + modul).textbox('enable');
          $("#DIGIT" + modul).numberbox('enable');
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function generate_kode(modul) {
      const prefix = $("#PREFIX" + modul).textbox("getValue");
      const jmldigit = $("#DIGIT" + modul).numberbox("getValue");

      try {
        const response = await parent.fetchData(link_api.generateCodeMaster, {
          modul: modul,
          prefix: prefix,
          jmldigit: jmldigit
        });

        if (response.success) {
          const msg = response.data;
          if ($("#SB" + modul).switchbutton("options").checked) {
            $("#LABEL" + modul).html(msg.kode);
          } else {
            $("#LABEL" + modul).html("MANUAL");
          }

          if (msg.sudahadadata) {
            $("#SB" + modul).switchbutton("disable")
            $("#PREFIX" + modul).textbox('disable');
            $("#DIGIT" + modul).numberbox('disable');
          }
        } else {
          throw new Error(response.message || 'Gagal memuat data');
        }
      } catch (e) {
        const error = (typeof e === 'string') ? e : e.message;
        $.messager.alert('Error', getTextError(error), 'error');
      }
    }

    async function simpanData() {
      try {
        const data = $('#form_input :input').serializeArray();
        const payload = {};
        for (const item of data) {
          payload[item.name] = item.value;
        }

        const response = await parent.fetchData(link_api.simpanSettingMaster, payload);

        if (response.success) {
          return true;
        } else {
          $.messager.alert('Error', response.message || 'Gagal memuat data', 'error');
          return false;
        }
      } catch (e) {
        throw new Error(e.message || 'An error occurred during data saving.');
      }
    }

    async function handleFormSubmit(onSuccessCallback) {
      const isValid = $('#form_input').form('validate');

      if (isValid) {
        try {
          tampilLoaderSimpan();
          const result = await simpanData();
          if (!result) {
            return;
          }
          if (typeof onSuccessCallback === 'function') {
            onSuccessCallback();
          }
        } catch (e) {
          const error = (typeof e === 'string') ? e : e.message;
          $.messager.alert('Error', getTextError(error), 'error');
        } finally {
          tutupLoaderSimpan();
        }
      }
    }

    function prev() {
      if (!parent.isTokenExpired()) {
        window.location = "{{ route('atena.master.pengaturan.frame-master-global') }}";
      } else {
        $.messager.alert('Error', "Token tidak valid, silahkan login kembali", 'error');
      }
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-pembelian') }}";
      });
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }
  </script>
@endpush
