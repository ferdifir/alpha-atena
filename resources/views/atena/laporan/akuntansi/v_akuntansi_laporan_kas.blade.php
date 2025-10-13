@extends('template.app')

@section('content')
  <div class="easyui-layout" style="width:350px;height:100%; font-weight:bold;" fit="true">
    <div class="panel-filter-laporan" data-options="region:'west',hideCollapsedContent:false" title="{{ $menu }}">

      <table style="border-bottom:1px #000" id="label_laporan">
        <!-- FILTER LAPORAN -->
        <tr>
          <td><label id="label_laporan">Tgl. Trans</label></td>
          <td id="label_laporan"><input id="txt_tgl_aw" style="width:105px" name="txt_tgl_aw" class="date" /> - <input
              id="txt_tgl_ak" style="width:105px" name="txt_tgl_ak" class="date" /></td>
        </tr>
        @if ($jenis == 'giro')
          <tr>
            <td id="label_laporan">Tgl. Terima</td>
            <td id="label_laporan"><input type="checkbox" name="cb_tglterima" id="cb_tglterima" value="1"
                style="padding-top:5px;"><input id="txt_tgl_awal_terima" name="txt_tgl_awal_terima" style="width:95px;"
                class="date" /> - <input id="txt_tgl_akhir_terima" name="txt_tgl_akhir_terima" style="width:95px;"
                class="date" /></td>
          </tr>
          <tr>
            <td id="label_laporan">Tgl. Cair</td>
            <td id="label_laporan"><input type="checkbox" name="cb_tglcair" id="cb_tglcair" value="1"
                style="padding-top:5px;"><input id="txt_tgl_awal_cair" name="txt_tgl_awal_cair" style="width:95px;"
                class="date" /> - <input id="txt_tgl_akhir_cair" name="txt_tgl_akhir_cair" style="width:95px;"
                class="date" /></td>
          </tr>
        @endif
        <tr>
          <td id="label_laporan">Jenis </td>
          <td id="label_laporan">
            <div id="cbJenis" class="easyui-combogrid" name="cbjenis[]" data-options="iconCls:'',">

            </div>
          </td>
        </tr>
        <tr>
          @if ($jenis == 'kas_bank')
            <td colspan="2">
              <ul class="easyui-datalist" title="Akun Kas/Bank" name="list_akun" id="list_akun">
              </ul>
            </td>
          @endif
        </tr>
        <tr valign="top">
          <td colspan="2">
            <ul class="easyui-datalist" title="Jenis Laporan" name="list_tampil_laporan" id="list_tampil_laporan">
            </ul>
          </td>
        </tr>
      </table>
    </div>
    <div data-options="region:'center'">
      <div class="easyui-layout" style="width: 100%;height: 100%">
        <div data-options="region: 'west'" class="btn-group-laporan">
          <a id="btn_print" title="Tampilkan Data." class="easyui-tooltip " valign="center"
            style="margin-top:5px; padding-top:5px;" data-options="iconCls:'', plain:false">
            <img src="{{ asset('assets/images/view.png') }}" style="width:40px;">
          </a>
          <a id="btn_export_excel" title="Ekspor Data ke Excel." class="easyui-tooltip"
            style="margin-top:5px; padding-top:5px;" data-options="iconCls:'', plain:false">
            <img src="{{ asset('assets/images/excel.png') }}" style="width:40px;">
          </a>
        </div>
        <div data-options="region: 'center'">
          <div id="tab_laporan" class="easyui-tabs" style="width:100%;height:100%;">
          </div>
        </div>
      </div>
    </div>
    <div id="title_parameter">
      <a id="btn_add" class="icon-add" data-options=" plain:true"></a>
      <a id="btn_remove" class="icon-remove" data-options=" plain:true"></a>
    </div>
  </div>
@endsection

@push('js')
  <script>
    var counter = 0;
    $(document).ready(async function() {
      $('#jenisview').val('{{ strtoupper($jenis) }}');

      $("#txt_tgl_awal_cair").datebox('disable');
      $("#txt_tgl_akhir_cair").datebox('disable');

      $("#txt_tgl_awal_terima").datebox('disable');
      $("#txt_tgl_akhir_terima").datebox('disable');

      $("#cb_tglcair").click(function() {
        if ($(this).prop('checked')) {
          $("#txt_tgl_awal_cair").datebox('enable');
          $("#txt_tgl_akhir_cair").datebox('enable');
        } else {
          $("#txt_tgl_awal_cair").datebox('disable');
          $("#txt_tgl_akhir_cair").datebox('disable');
        }
      });

      $("#cb_tglterima").click(function() {
        if ($(this).prop('checked')) {
          $("#txt_tgl_awal_terima").datebox('enable');
          $("#txt_tgl_akhir_terima").datebox('enable');
        } else {
          $("#txt_tgl_awal_terima").datebox('disable');
          $("#txt_tgl_akhir_terima").datebox('disable');
        }
      });

      $('#list_akun').datagrid({
        width: 280,
        height: 160,
        selectOnCheck: false,
        showHeader: false,
        columns: [
          [{
              field: 'value',
              hidden: true
            },
            {
              field: 'ck',
              checkbox: true
            },
            {
              field: 'text'
            },
          ]
        ],
      });

      try {
        const response = await fetch(
          link_api.browsePerkiraan, {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + token,
            },
            body: JSON.stringify({
              "jenis": "kas_bank",
              "aktif": 1
            })
          }
        );
        const res = await response.json();
        if (res.success) {
          for (var i = 0; i < res.data.length; i++) {
            $('#list_akun').datagrid('appendRow', {
              value: res.data[i].uuidperkiraan,
              text: res.data[i].kode + ' - ' + res.data[i].nama,
            });
          }
        }
      } catch (e) {
        showErrorAlert(e);
      }

      $('#cbJenis').combogrid({
        width: 220,
        idField: 'value',
        textField: 'jenis',
        multiple: true,
        selectFirstRow: true,
        columns: [
          [{
              field: 'value',
              hidden: true
            },
            {
              field: 'jenis',
              title: 'Jenis Transaksi',
              width: 200
            },
          ]
        ],

      });

      if ("{{ $jenis }}" == 'kas_bank') {
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'KAS MASUK',
          jenis: 'Kas Masuk'
        });
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'KAS KELUAR',
          jenis: 'Kas Keluar'
        });
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'BANK MASUK',
          jenis: 'Bank Masuk'
        });
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'BANK KELUAR',
          jenis: 'Bank Keluar'
        });

        $('#cbJenis').combogrid("setValues", ["KAS MASUK", "KAS KELUAR", "BANK MASUK", "BANK KELUAR"]);
      } else if ("{{ $jenis }}" == 'giro') {
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'GIRO MASUK',
          jenis: 'Giro Masuk'
        });
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'GIRO KELUAR',
          jenis: 'Giro Keluar'
        });

        $('#cbJenis').combogrid("setValues", ["GIRO MASUK", "GIRO KELUAR"]);
      } else if ("{{ $jenis }}" == 'memorial') {
        $('#cbJenis').combogrid("grid").datagrid("appendRow", {
          value: 'MEMORIAL',
          jenis: 'Memorial'
        });

        $('#cbJenis').combogrid("setValue", "MEMORIAL");
      }

      //JENIS TAMPILAN LAPORAN

      if ("{{ $jenis }}" == 'kas_bank') {
        var arrayTampilLaporan = [{
            value: 'HARIAN',
            jenis: 'Harian'
          },
          {
            value: 'DETAIL',
            jenis: 'Detail'
          },
          {
            value: 'REGISTER',
            jenis: 'Register'
          },
        ];

      } else {
        var arrayTampilLaporan = [{
          value: 'REGISTER',
          jenis: 'Register'
        }, ];
      }

      $('#list_tampil_laporan').datalist({
        width: 280,
        height: 155,
        checkbox: true,
        data: arrayTampilLaporan,
        columns: [
          [{
            field: 'jenis',
            title: 'Status',
            width: 200
          }, ]
        ],
      });
      $('#list_tampil_laporan').datalist('checkRow', 0);
      tutupLoader();
    });

    // PRINT LAPORAN
    $("#btn_export_excel").click(function() {
      var jenistrans = $('#cbJenis').combogrid("getValues").length;
      var akunperkiraan;
      var cekJenis = false;

      if ($('#jenisview').val() != 'MEMORIAL' && $('#jenisview').val() != 'GIRO') {
        akunperkiraan = $('#list_akun').datalist('getChecked').length;
        if (jenistrans == 0 || akunperkiraan == 0) {
          $.messager.alert('Warning', 'Harap Memilih Jenis Transaksi dan Akun Kas');
        } else {
          cekJenis = true;
        }
      } else {
        cekJenis = true;
      }
      if (cekJenis) {
        cetakLaporan('ya');
      }
    });

    $("#btn_print").click(function() {
      var jenistrans = $('#cbJenis').combogrid("getValues").length;
      var akunperkiraan;
      var cekJenis = false;

      if ($('#jenisview').val() != 'MEMORIAL' && $('#jenisview').val() != 'GIRO') {
        akunperkiraan = $('#list_akun').datalist('getChecked').length;
        if (jenistrans == 0 || akunperkiraan == 0) {
          $.messager.alert('Warning', 'Harap Memilih Jenis Transaksi dan Akun Kas');
        } else {
          cekJenis = true;
        }
      } else {
        cekJenis = true;
      }

      if (cekJenis == true) {
        var tab_title = '';
        if ($('#jenisview').val() == 'KAS_BANK') {
          tab_title = 'Laporan Kas/Bank';
        } else {
          tab_title = 'Laporan ' + $('#jenisview').val().substr(0, 1).toUpperCase() + $('#jenisview').val()
            .substr(1).toLowerCase();
        }
        cetakLaporan('tidak', tab_title);
      }
    });

    $("[name=rdTampil]").change(function() {
      if ($(this).val() == "Detail" || $(this).val() == "Harian") {
        $(".jtrans").each(function() {
          jtrans = $(this).val();
          $(this).prop("checked", true);
        });
        $("[name='cbperkiraan[]']").prop({
          "checked": false,
          "disabled": false
        });
      } else {
        $(".jtrans").each(function() {
          $(this).prop({
            "checked": false,
            "disabled": false
          });
        });
        $("[name='cbperkiraan[]']").prop({
          "checked": false,
          "disabled": false
        });
        $("#txt_tgl_ak").datebox('enable');
      }
    });
  </script>
@endpush
