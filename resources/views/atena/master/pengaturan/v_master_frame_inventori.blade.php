@extends('template.form')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/all.min.css') }}" />
@endpush

@section('content')
  <div style="height: 100%;overflow:hidden;margin-left:25px;margin-right:25px">
    <div style="height:30px;background-color:white;">
      <label class="font-header-menu">Pengaturan Modul Persediaan</label>
      <div align="right" valign="top">
        <p>Proses 6 dari 10</p>
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
          <td align="right">1 <b>Bukti Penerimaan Barang</b> untuk 1 <b>Transaksi Referensi</b></td>
          <td align="center" id="label_form"><input id="TRANSREFBBM" name="transrefbbm" class="easyui-switchbutton"
              checked style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Bukti Pengeluaran Barang</b> untuk 1 <b>Transaksi Referensi</b></td>
          <td align="center" id="label_form"><input id="TRANSREFBBK" name="transrefbbk" class="easyui-switchbutton"
              checked style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">1 <b>Kirim Ekpedisi</b> untuk 1 <b>Pengeluaran Barang</b></td>
          <td align="center" id="label_form"><input id="TRANSREFKIRIM" name="transrefkirim" class="easyui-switchbutton"
              checked style="width:90px" data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
        <tr>
          <td align="right">Harga Barang <b>Penyesuaian Stok</b> Diambil dari Harga Beli Terakhir<b></b></td>
          <td align="center" id="label_form"><input id="HARGAPENYESUAIANSTOK" name="hargapenyesuaianstok"
              class="easyui-switchbutton" checked style="width:90px"
              data-options="onText:'Ya',offText:'Tidak',value:'HEADER'"></td>
        </tr>
      </table>
      <hr>
      <table style="padding:5px">
        <tr>
          <td align="center" id="label_form"></td>
          <td align="center" id="label_form">Auto</td>
          <td align="center" id="label_form">Prefix</td>
          <td align="center" id="label_form" style="width:25px">LOKASI</td>
          <td align="center" id="label_form" style="width:25px">YY</td>
          <td align="center" id="label_form" style="width:25px">MM</td>
          <td align="center" id="label_form" style="width:25px">DD</td>
          <td align="center" id="label_form">Jumlah Digit</td>
          <td align="center" id="label_form">Separator</td>
          <td align="center" id="label_form" style="width:300px">Contoh</td>
        </tr>
        <tr>
          <td align="right" id="label_form">Transfer Persediaan</td>
          <td align="center" id="label_form"><input id="SBTRANSFER" name="sbtransfer" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXTRANSFER" name="prefixtransfer" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASITRANSFER" name="lokasitransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYTRANSFER" name="yytransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMTRANSFER" name="mmtransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDTRANSFER" name="ddtransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITTRANSFER" name="digittransfer" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBTRANSFER" name="cbtransfer" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELTRANSFER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Terima Transfer Persediaan</td>
          <td align="center" id="label_form"><input id="SBTERIMATRANSFER" name="sbterimatransfer"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXTERIMATRANSFER" name="prefixterimatransfer"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASITERIMATRANSFER" name="lokasiterimatransfer"
              type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="YYTERIMATRANSFER" name="yyterimatransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMTERIMATRANSFER" name="mmterimatransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDTERIMATRANSFER" name="ddterimatransfer" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITTERIMATRANSFER" name="digitterimatransfer"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBTERIMATRANSFER" name="cbterimatransfer" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELTERIMATRANSFER"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Bukti Penerimaan Persediaan</td>
          <td align="center" id="label_form"><input id="SBBBM" name="sbbbm" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXBBM" name="prefixbbm" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIBBM" name="lokasibbm" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYBBM" name="yybbm" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMBBM" name="mmbbm" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDBBM" name="ddbbm" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITBBM" name="digitbbm" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBBBM" name="cbbbm" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELBBM"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Bukti Pengeluaran Persediaan</td>
          <td align="center" id="label_form"><input id="SBBBK" name="sbbbk" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXBBK" name="prefixbbk" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIBBK" name="lokasibbk" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="YYBBK" name="yybbk" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMBBK" name="mmbbk" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDBBK" name="ddbbk" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITBBK" name="digitbbk" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBBBK" name="cbbbk" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELBBK"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Kirim Ekspedisi</td>
          <td align="center" id="label_form"><input id="SBKIRIM" name="sbkirim" class="easyui-switchbutton" checked
              style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXKIRIM" name="prefixkirim" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIKIRIM" name="lokasikirim" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYKIRIM" name="yykirim" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="MMKIRIM" name="mmkirim" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DDKIRIM" name="ddkirim" type="checkbox" value="1">
          </td>
          <td align="center" id="label_form"><input id="DIGITKIRIM" name="digitkirim" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBKIRIM" name="cbkirim" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELKIRIM"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Repacking</td>
          <td align="center" id="label_form"><input id="SBREPACKING" name="sbrepacking" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXREPACKING" name="prefixrepacking" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIREPACKING" name="lokasirepacking" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYREPACKING" name="yyrepacking" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMREPACKING" name="mmrepacking" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDREPACKING" name="ddrepacking" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITREPACKING" name="digitrepacking" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBREPACKING" name="cbrepacking" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELREPACKING"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Pemakaian Bahan</td>
          <td align="center" id="label_form"><input id="SBPEMAKAIANBAHAN" name="sbpemakaianbahan"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPEMAKAIANBAHAN" name="prefixpemakaianbahan"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIPEMAKAIANBAHAN" name="lokasipemakaianbahan"
              type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="YYPEMAKAIANBAHAN" name="yypemakaianbahan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMPEMAKAIANBAHAN" name="mmpemakaianbahan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDPEMAKAIANBAHAN" name="ddpemakaianbahan" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITPEMAKAIANBAHAN" name="digitpemakaianbahan"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPEMAKAIANBAHAN" name="cbpemakaianbahan" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPEMAKAIANBAHAN"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Saldo Awal Stok Persediaan</td>
          <td align="center" id="label_form"><input id="SBSALDOSTOK" name="sbsaldostok" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXSALDOSTOK" name="prefixsaldostok" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASISALDOSTOK" name="lokasisaldostok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYSALDOSTOK" name="yysaldostok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMSALDOSTOK" name="mmsaldostok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDSALDOSTOK" name="ddsaldostok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITSALDOSTOK" name="digitsaldostok" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBSALDOSTOK" name="cbsaldostok" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELSALDOSTOK"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Opname Stok Persediaan</td>
          <td align="center" id="label_form"><input id="SBOPNAMESTOK" name="sbopnamestok" class="easyui-switchbutton"
              checked style="width:75px" data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXOPNAMESTOK" name="prefixopnamestok" style="width:150px"
              class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIOPNAMESTOK" name="lokasiopnamestok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="YYOPNAMESTOK" name="yyopnamestok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMOPNAMESTOK" name="mmopnamestok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDOPNAMESTOK" name="ddopnamestok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITOPNAMESTOK" name="digitopnamestok" style="width:80px"
              class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBOPNAMESTOK" name="cbopnamestok" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELOPNAMESTOK"></label></td>
        </tr>
        <tr>
          <td align="right" id="label_form">Penyesuaian Stok Persediaan</td>
          <td align="center" id="label_form"><input id="SBPENYESUAIANSTOK" name="sbpenyesuaianstok"
              class="easyui-switchbutton" checked style="width:75px"
              data-options="onText:'Auto',offText:'Manual',value:'AUTO'"></td>
          <td align="center" id="label_form"><input id="PREFIXPENYESUAIANSTOK" name="prefixpenyesuaianstok"
              style="width:150px" class="easyui-textbox"></td>
          <td align="center" id="label_form"><input id="LOKASIPENYESUAIANSTOK" name="lokasipenyesuaianstok"
              type="checkbox" value="1"></td>
          <td align="center" id="label_form"><input id="YYPENYESUAIANSTOK" name="yypenyesuaianstok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="MMPENYESUAIANSTOK" name="mmpenyesuaianstok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DDPENYESUAIANSTOK" name="ddpenyesuaianstok" type="checkbox"
              value="1"></td>
          <td align="center" id="label_form"><input id="DIGITPENYESUAIANSTOK" name="digitpenyesuaianstok"
              style="width:80px" class="easyui-numberbox" data-options="precision:0"></td>
          <td align="center" id="label_form">
            <select id="CBPENYESUAIANSTOK" name="cbpenyesuaianstok" class="easyui-combobox" style="width:100px;"
              data-options="panelHeight:'auto'">
              <option value="">No Separator</option>
              <option value="/">/</option>
              <option value="-">-</option>
              <option value=".">.</option>
            </select>
          </td>
          <td align="left" id="label_form"><label id="LABELPENYESUAIANSTOK"></label></td>
        </tr>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $("#SBTRANSFER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXTRANSFER").textbox("disable").textbox("clear");
            $("#DIGITTRANSFER").numberbox("disable").numberbox("clear");
            $("#LOKASITRANSFER").prop("checked", false).attr("disabled", true);
            $("#YYTRANSFER").prop("checked", false).attr("disabled", true);
            $("#MMTRANSFER").prop("checked", false).attr("disabled", true);
            $("#DDTRANSFER").prop("checked", false).attr("disabled", true);
            $("#CBTRANSFER").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXTRANSFER").textbox("enable");
            $("#DIGITTRANSFER").numberbox("enable");
            $("#LOKASITRANSFER").attr("disabled", false);
            $("#YYTRANSFER").attr("disabled", false);
            $("#MMTRANSFER").attr("disabled", true);
            $("#DDTRANSFER").attr("disabled", true);
            $("#CBTRANSFER").combobox("setValue", "").combobox("enable");
            getDataConfig("TRANSFER");
          }
        }
      });

      $("#SBTERIMATRANSFER").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXTERIMATRANSFER").textbox("disable").textbox("clear");
            $("#DIGITTERIMATRANSFER").numberbox("disable").numberbox("clear");
            $("#LOKASITERIMATRANSFER").prop("checked", false).attr("disabled", true);
            $("#YYTERIMATRANSFER").prop("checked", false).attr("disabled", true);
            $("#MMTERIMATRANSFER").prop("checked", false).attr("disabled", true);
            $("#DDTERIMATRANSFER").prop("checked", false).attr("disabled", true);
            $("#CBTERIMATRANSFER").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXTERIMATRANSFER").textbox("enable");
            $("#DIGITTERIMATRANSFER").numberbox("enable");
            $("#LOKASITERIMATRANSFER").attr("disabled", false);
            $("#YYTERIMATRANSFER").attr("disabled", false);
            $("#MMTERIMATRANSFER").attr("disabled", true);
            $("#DDTERIMATRANSFER").attr("disabled", true);
            $("#CBTERIMATRANSFER").combobox("setValue", "").combobox("enable");
            getDataConfig("TERIMATRANSFER");
          }
        }
      });

      $("#SBBBM").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXBBM").textbox("disable").textbox("clear");
            $("#DIGITBBM").numberbox("disable").numberbox("clear");
            $("#LOKASIBBM").prop("checked", false).attr("disabled", true);
            $("#YYBBM").prop("checked", false).attr("disabled", true);
            $("#MMBBM").prop("checked", false).attr("disabled", true);
            $("#DDBBM").prop("checked", false).attr("disabled", true);
            $("#CBBBM").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXBBM").textbox("enable");
            $("#DIGITBBM").numberbox("enable");
            $("#LOKASIBBM").attr("disabled", false);
            $("#YYBBM").attr("disabled", false);
            $("#MMBBM").attr("disabled", true);
            $("#DDBBM").attr("disabled", true);
            $("#CBBBM").combobox("setValue", "").combobox("enable");
            getDataConfig("BBM");
          }
        }
      });

      $("#SBBBK").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXBBK").textbox("disable").textbox("clear");
            $("#DIGITBBK").numberbox("disable").numberbox("clear");
            $("#LOKASIBBK").prop("checked", false).attr("disabled", true);
            $("#YYBBK").prop("checked", false).attr("disabled", true);
            $("#MMBBK").prop("checked", false).attr("disabled", true);
            $("#DDBBK").prop("checked", false).attr("disabled", true);
            $("#CBBBK").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXBBK").textbox("enable");
            $("#DIGITBBK").numberbox("enable");
            $("#LOKASIBBK").attr("disabled", false);
            $("#YYBBK").attr("disabled", false);
            $("#MMBBK").attr("disabled", true);
            $("#DDBBK").attr("disabled", true);
            $("#CBBBK").combobox("setValue", "").combobox("enable");
            getDataConfig("BBK");
          }
        }
      });

      $("#SBKIRIM").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXKIRIM").textbox("disable").textbox("clear");
            $("#DIGITKIRIM").numberbox("disable").numberbox("clear");
            $("#LOKASIKIRIM").prop("checked", false).attr("disabled", true);
            $("#YYKIRIM").prop("checked", false).attr("disabled", true);
            $("#MMKIRIM").prop("checked", false).attr("disabled", true);
            $("#DDKIRIM").prop("checked", false).attr("disabled", true);
            $("#CBKIRIM").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXKIRIM").textbox("enable");
            $("#DIGITKIRIM").numberbox("enable");
            $("#LOKASIKIRIM").attr("disabled", false);
            $("#YYKIRIM").attr("disabled", false);
            $("#MMKIRIM").attr("disabled", true);
            $("#DDKIRIM").attr("disabled", true);
            $("#CBKIRIM").combobox("setValue", "").combobox("enable");
            getDataConfig("KIRIM");
          }
        }
      });

      $("#SBREPACKING").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXREPACKING").textbox("disable").textbox("clear");
            $("#DIGITREPACKING").numberbox("disable").numberbox("clear");
            $("#LOKASIREPACKING").prop("checked", false).attr("disabled", true);
            $("#YYREPACKING").prop("checked", false).attr("disabled", true);
            $("#MMREPACKING").prop("checked", false).attr("disabled", true);
            $("#DDREPACKING").prop("checked", false).attr("disabled", true);
            $("#CBREPACKING").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXREPACKING").textbox("enable");
            $("#DIGITREPACKING").numberbox("enable");
            $("#LOKASIREPACKING").attr("disabled", false);
            $("#YYREPACKING").attr("disabled", false);
            $("#MMREPACKING").attr("disabled", true);
            $("#DDREPACKING").attr("disabled", true);
            $("#CBREPACKING").combobox("setValue", "").combobox("enable");
            getDataConfig("REPACKING");
          }
        }
      });

      $("#SBPEMAKAIANBAHAN").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPEMAKAIANBAHAN").textbox("disable").textbox("clear");
            $("#DIGITPEMAKAIANBAHAN").numberbox("disable").numberbox("clear");
            $("#LOKASIPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
            $("#YYPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
            $("#MMPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
            $("#DDPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
            $("#CBPEMAKAIANBAHAN").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPEMAKAIANBAHAN").textbox("enable");
            $("#DIGITPEMAKAIANBAHAN").numberbox("enable");
            $("#LOKASIPEMAKAIANBAHAN").attr("disabled", false);
            $("#YYPEMAKAIANBAHAN").attr("disabled", false);
            $("#MMPEMAKAIANBAHAN").attr("disabled", true);
            $("#DDPEMAKAIANBAHAN").attr("disabled", true);
            $("#CBPEMAKAIANBAHAN").combobox("setValue", "").combobox("enable");
            getDataConfig("PEMAKAIANBAHAN");
          }
        }
      });

      $("#SBSALDOSTOK").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXSALDOSTOK").textbox("disable").textbox("clear");
            $("#DIGITSALDOSTOK").numberbox("disable").numberbox("clear");
            $("#LOKASISALDOSTOK").prop("checked", false).attr("disabled", true);
            $("#YYSALDOSTOK").prop("checked", false).attr("disabled", true);
            $("#MMSALDOSTOK").prop("checked", false).attr("disabled", true);
            $("#DDSALDOSTOK").prop("checked", false).attr("disabled", true);
            $("#CBSALDOSTOK").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXSALDOSTOK").textbox("enable");
            $("#DIGITSALDOSTOK").numberbox("enable");
            $("#LOKASISALDOSTOK").attr("disabled", false);
            $("#YYSALDOSTOK").attr("disabled", false);
            $("#MMSALDOSTOK").attr("disabled", true);
            $("#DDSALDOSTOK").attr("disabled", true);
            $("#CBSALDOSTOK").combobox("setValue", "").combobox("enable");
            getDataConfig("SALDOSTOK");
          }
        }
      });

      $("#SBOPNAMESTOK").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXOPNAMESTOK").textbox("disable").textbox("clear");
            $("#DIGITOPNAMESTOK").numberbox("disable").numberbox("clear");
            $("#LOKASIOPNAMESTOK").prop("checked", false).attr("disabled", true);
            $("#YYOPNAMESTOK").prop("checked", false).attr("disabled", true);
            $("#MMOPNAMESTOK").prop("checked", false).attr("disabled", true);
            $("#DDOPNAMESTOK").prop("checked", false).attr("disabled", true);
            $("#CBOPNAMESTOK").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXOPNAMESTOK").textbox("enable");
            $("#DIGITOPNAMESTOK").numberbox("enable");
            $("#LOKASIOPNAMESTOK").attr("disabled", false);
            $("#YYOPNAMESTOK").attr("disabled", false);
            $("#MMOPNAMESTOK").attr("disabled", true);
            $("#DDOPNAMESTOK").attr("disabled", true);
            $("#CBOPNAMESTOK").combobox("setValue", "").combobox("enable");
            getDataConfig("OPNAMESTOK");
          }
        }
      });

      $("#SBPENYESUAIANSTOK").switchbutton({
        checked: true,
        onChange: function(checked) {
          if (!checked) {
            $("#PREFIXPENYESUAIANSTOK").textbox("disable").textbox("clear");
            $("#DIGITPENYESUAIANSTOK").numberbox("disable").numberbox("clear");
            $("#LOKASIPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
            $("#YYPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
            $("#MMPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
            $("#DDPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
            $("#CBPENYESUAIANSTOK").combobox("setValue", "").combobox("disable");
          } else {
            $("#PREFIXPENYESUAIANSTOK").textbox("enable");
            $("#DIGITPENYESUAIANSTOK").numberbox("enable");
            $("#LOKASIPENYESUAIANSTOK").attr("disabled", false);
            $("#YYPENYESUAIANSTOK").attr("disabled", false);
            $("#MMPENYESUAIANSTOK").attr("disabled", true);
            $("#DDPENYESUAIANSTOK").attr("disabled", true);
            $("#CBPENYESUAIANSTOK").combobox("setValue", "").combobox("enable");
            getDataConfig("PENYESUAIANSTOK");
          }
        }
      });

      //SCRIPT UNTUK LOKASI, YEAR, MONTH, DATE
      $("#LOKASITRANSFER").change(function() {
        generate_kode("TRANSFER");
      });

      $("#YYTRANSFER").change(function() {
        if (this.checked) {
          $("#MMTRANSFER").prop("checked", false).attr("disabled", false);
          $("#DDTRANSFER").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMTRANSFER").prop("checked", false).attr("disabled", true);
          $("#DDTRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TRANSFER");
      });

      $("#MMTRANSFER").change(function() {
        if (this.checked) {
          $("#DDTRANSFER").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDTRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TRANSFER");
      });

      $("#DDTRANSFER").change(function() {
        generate_kode("TRANSFER");
      });

      $("#LOKASITERIMATRANSFER").change(function() {
        generate_kode("TERIMATRANSFER");
      });

      $("#YYTERIMATRANSFER").change(function() {
        if (this.checked) {
          $("#MMTERIMATRANSFER").prop("checked", false).attr("disabled", false);
          $("#DDTERIMATRANSFER").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMTERIMATRANSFER").prop("checked", false).attr("disabled", true);
          $("#DDTERIMATRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TERIMATRANSFER");
      });

      $("#MMTERIMATRANSFER").change(function() {
        if (this.checked) {
          $("#DDTERIMATRANSFER").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDTERIMATRANSFER").prop("checked", false).attr("disabled", true);
        }
        generate_kode("TERIMATRANSFER");
      });

      $("#DDTERIMATRANSFER").change(function() {
        generate_kode("TERIMATRANSFER");
      });

      $("#LOKASIBBM").change(function() {
        generate_kode("BBM");
      });

      $("#YYBBM").change(function() {
        if (this.checked) {
          $("#MMBBM").prop("checked", false).attr("disabled", false);
          $("#DDBBM").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMBBM").prop("checked", false).attr("disabled", true);
          $("#DDBBM").prop("checked", false).attr("disabled", true);
        }
        generate_kode("BBM");
      });

      $("#MMBBM").change(function() {
        if (this.checked) {
          $("#DDBBM").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDBBM").prop("checked", false).attr("disabled", true);
        }
        generate_kode("BBM");
      });

      $("#DDBBM").change(function() {
        generate_kode("BBM");
      });

      $("#LOKASIBBK").change(function() {
        generate_kode("BBK");
      });

      $("#YYBBK").change(function() {
        if (this.checked) {
          $("#MMBBK").prop("checked", false).attr("disabled", false);
          $("#DDBBK").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMBBK").prop("checked", false).attr("disabled", true);
          $("#DDBBK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("BBK");
      });

      $("#MMBBK").change(function() {
        if (this.checked) {
          $("#DDBBK").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDBBK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("BBK");
      });

      $("#DDBBK").change(function() {
        generate_kode("BBK");
      });

      $("#LOKASIKIRIM").change(function() {
        generate_kode("KIRIM");
      });

      $("#YYKIRIM").change(function() {
        if (this.checked) {
          $("#MMKIRIM").prop("checked", false).attr("disabled", false);
          $("#DDKIRIM").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMKIRIM").prop("checked", false).attr("disabled", true);
          $("#DDKIRIM").prop("checked", false).attr("disabled", true);
        }
        generate_kode("KIRIM");
      });

      $("#MMKIRIM").change(function() {
        if (this.checked) {
          $("#DDKIRIM").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDKIRIM").prop("checked", false).attr("disabled", true);
        }
        generate_kode("KIRIM");
      });

      $("#DDKIRIM").change(function() {
        generate_kode("KIRIM");
      });

      $("#LOKASIREPACKING").change(function() {
        generate_kode("REPACKING");
      });

      $("#YYREPACKING").change(function() {
        if (this.checked) {
          $("#MMREPACKING").prop("checked", false).attr("disabled", false);
          $("#DDREPACKING").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMREPACKING").prop("checked", false).attr("disabled", true);
          $("#DDREPACKING").prop("checked", false).attr("disabled", true);
        }
        generate_kode("REPACKING");
      });

      $("#MMREPACKING").change(function() {
        if (this.checked) {
          $("#DDREPACKING").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDREPACKING").prop("checked", false).attr("disabled", true);
        }
        generate_kode("REPACKING");
      });

      $("#DDREPACKING").change(function() {
        generate_kode("REPACKING");
      });

      $("#LOKASIPEMAKAIANBAHAN").change(function() {
        generate_kode("PEMAKAIANBAHAN");
      });

      $("#YYPEMAKAIANBAHAN").change(function() {
        if (this.checked) {
          $("#MMPEMAKAIANBAHAN").prop("checked", false).attr("disabled", false);
          $("#DDPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
          $("#DDPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PEMAKAIANBAHAN");
      });

      $("#MMPEMAKAIANBAHAN").change(function() {
        if (this.checked) {
          $("#DDPEMAKAIANBAHAN").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPEMAKAIANBAHAN").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PEMAKAIANBAHAN");
      });

      $("#DDPEMAKAIANBAHAN").change(function() {
        generate_kode("PEMAKAIANBAHAN");
      });

      $("#LOKASISALDOSTOK").change(function() {
        generate_kode("SALDOSTOK");
      });

      $("#YYSALDOSTOK").change(function() {
        if (this.checked) {
          $("#MMSALDOSTOK").prop("checked", false).attr("disabled", false);
          $("#DDSALDOSTOK").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMSALDOSTOK").prop("checked", false).attr("disabled", true);
          $("#DDSALDOSTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOSTOK");
      });

      $("#MMSALDOSTOK").change(function() {
        if (this.checked) {
          $("#DDSALDOSTOK").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDSALDOSTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("SALDOSTOK");
      });

      $("#DDSALDOSTOK").change(function() {
        generate_kode("SALDOSTOK");
      });

      $("#LOKASIOPNAMESTOK").change(function() {
        generate_kode("OPNAMESTOK");
      });

      $("#YYOPNAMESTOK").change(function() {
        if (this.checked) {
          $("#MMOPNAMESTOK").prop("checked", false).attr("disabled", false);
          $("#DDOPNAMESTOK").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMOPNAMESTOK").prop("checked", false).attr("disabled", true);
          $("#DDOPNAMESTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("OPNAMESTOK");
      });

      $("#MMOPNAMESTOK").change(function() {
        if (this.checked) {
          $("#DDOPNAMESTOK").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDOPNAMESTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("OPNAMESTOK");
      });

      $("#DDOPNAMESTOK").change(function() {
        generate_kode("OPNAMESTOK");
      });

      $("#LOKASIPENYESUAIANSTOK").change(function() {
        generate_kode("PENYESUAIANSTOK");
      });

      $("#YYPENYESUAIANSTOK").change(function() {
        if (this.checked) {
          $("#MMPENYESUAIANSTOK").prop("checked", false).attr("disabled", false);
          $("#DDPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
        } else {
          $("#MMPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
          $("#DDPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PENYESUAIANSTOK");
      });

      $("#MMPENYESUAIANSTOK").change(function() {
        if (this.checked) {
          $("#DDPENYESUAIANSTOK").prop("checked", false).attr("disabled", false);
        } else {
          $("#DDPENYESUAIANSTOK").prop("checked", false).attr("disabled", true);
        }
        generate_kode("PENYESUAIANSTOK");
      });

      $("#DDPENYESUAIANSTOK").change(function() {
        generate_kode("PENYESUAIANSTOK");
      });

      $("#CBTRANSFER").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("TRANSFER");
        }
      });

      $("#CBTERIMATRANSFER").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("TERIMATRANSFER");
        }
      });

      $("#CBBBM").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBM");
        }
      });

      $("#CBBBK").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBK");
        }
      });

      $("#CBKIRIM").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("KIRIM");
        }
      });

      $("#CBREPACKING").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("REPACKING");
        }
      });

      $("#CBPEMAKAIANBAHAN").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMAKAIANBAHAN");
        }
      });

      $("#CBSALDOSTOK").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOSTOK");
        }
      });

      $("#CBOPNAMESTOK").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("OPNAMESTOK");
        }
      });

      $("#CBPENYESUAIANSTOK").combobox({
        onChange: function(newValue, oldValue) {
          generate_kode("PENYESUAIANSTOK");
        }
      });

      //SCRIPT PREFIX
      $("#PREFIXTRANSFER").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TRANSFER");
        },
      });
      $("#PREFIXTERIMATRANSFER").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TERIMATRANSFER");
        },
      });
      $("#PREFIXBBM").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBM");
        },
      });
      $("#PREFIXBBK").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBK");
        },
      });
      $("#PREFIXKIRIM").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("KIRIM");
        },
      });
      $("#PREFIXREPACKING").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("REPACKING");
        },
      });
      $("#PREFIXPEMAKAIANBAHAN").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMAKAIANBAHAN");
        },
      });
      $("#PREFIXSALDOSTOK").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOSTOK");
        },
      });
      $("#PREFIXOPNAMESTOK").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("OPNAMESTOK");
        },
      });
      $("#PREFIXPENYESUAIANSTOK").textbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PENYESUAIANSTOK");
        },
      });

      $("#DIGITTRANSFER").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TRANSFER");
        },
      });
      $("#DIGITTERIMATRANSFER").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("TERIMATRANSFER");
        },
      });
      $("#DIGITBBM").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBM");
        },
      });
      $("#DIGITBBK").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("BBK");
        },
      });
      $("#DIGITKIRIM").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("KIRIM");
        },
      });
      $("#DIGITREPACKING").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("REPACKING");
        },
      });
      $("#DIGITPEMAKAIANBAHAN").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PEMAKAIANBAHAN");
        },
      });
      $("#DIGITSALDOSTOK").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("SALDOSTOK");
        },
      });
      $("#DIGITOPNAMESTOK").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("OPNAMESTOK");
        },
      });
      $("#DIGITPENYESUAIANSTOK").numberbox({
        onChange: function(newValue, oldValue) {
          generate_kode("PENYESUAIANSTOK");
        },
      });

      $("#LOKASITRANSFER").prop("checked", false);
      $("#YYTRANSFER").prop("checked", false);
      $("#MMTRANSFER").prop("checked", false);
      $("#DDTRANSFER").prop("checked", false);
      $("#LOKASITERIMATRANSFER").prop("checked", false);
      $("#YYTERIMATRANSFER").prop("checked", false);
      $("#MMTERIMATRANSFER").prop("checked", false);
      $("#DDTERIMATRANSFER").prop("checked", false);
      $("#LOKASIBBM").prop("checked", false);
      $("#YYBBM").prop("checked", false);
      $("#MMBBM").prop("checked", false);
      $("#DDBBM").prop("checked", false);
      $("#LOKASIBBK").prop("checked", false);
      $("#YYBBK").prop("checked", false);
      $("#MMBBK").prop("checked", false);
      $("#DDBBK").prop("checked", false);
      $("#LOKASIKIRIM").prop("checked", false);
      $("#YYKIRIM").prop("checked", false);
      $("#MMKIRIM").prop("checked", false);
      $("#DDKIRIM").prop("checked", false);
      $("#LOKASIREPACKING").prop("checked", false);
      $("#YYREPACKING").prop("checked", false);
      $("#MMREPACKING").prop("checked", false);
      $("#DDREPACKING").prop("checked", false);
      $("#LOKASIPEMAKAIANBAHAN").prop("checked", false);
      $("#YYPEMAKAIANBAHAN").prop("checked", false);
      $("#MMPEMAKAIANBAHAN").prop("checked", false);
      $("#DDPEMAKAIANBAHAN").prop("checked", false);
      $("#LOKASISALDOSTOK").prop("checked", false);
      $("#YYSALDOSTOK").prop("checked", false);
      $("#MMSALDOSTOK").prop("checked", false);
      $("#DDSALDOSTOK").prop("checked", false);
      $("#LOKASIOPNAMESTOK").prop("checked", false);
      $("#YYOPNAMESTOK").prop("checked", false);
      $("#MMOPNAMESTOK").prop("checked", false);
      $("#DDOPNAMESTOK").prop("checked", false);
      $("#LOKASIPENYESUAIANSTOK").prop("checked", false);
      $("#YYPENYESUAIANSTOK").prop("checked", false);
      $("#MMPENYESUAIANSTOK").prop("checked", false);
      $("#DDPENYESUAIANSTOK").prop("checked", false);

      getDataInventori();
    });

    async function loadDataInventori(data) {
      const transfer = data.transfer.prefix;
      const terimatransfer = data.terimatransfer.prefix;
      const bbm = data.bbm.prefix;
      const bbk = data.bbk.prefix;
      const kirim = data.kirim.prefix;
      const repacking = data.repacking.prefix;
      const pemakaianbahan = data.pemakaianbahan.prefix;
      const saldostok = data.saldostok.prefix;
      const orderreturbeli = data.opnamestok.prefix;
      const returbeli = data.penyesuaianstok.prefix;

      $("#PREFIXTRANSFER").textbox("setValue", transfer.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXTERIMATRANSFER").textbox("setValue", terimatransfer.replace(/\//g, "").replace(/\-/g, "").replace(/\./g,
        "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]",
        ""));
      $("#PREFIXBBM").textbox("setValue", bbm.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXBBK").textbox("setValue", bbk.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXKIRIM").textbox("setValue", kirim.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "").replace(
        "[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXREPACKING").textbox("setValue", repacking.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPEMAKAIANBAHAN").textbox("setValue", pemakaianbahan.replace(/\//g, "").replace(/\-/g, "").replace(/\./g,
        "").replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]",
        ""));
      $("#PREFIXSALDOSTOK").textbox("setValue", saldostok.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXOPNAMESTOK").textbox("setValue", orderreturbeli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
      $("#PREFIXPENYESUAIANSTOK").textbox("setValue", returbeli.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
        .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));

      if (transfer.includes('[LOKASI]')) {
        $("#LOKASITRANSFER").prop("checked", true);
      }
      if (transfer.includes('[YY]')) {
        $("#YYTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (transfer.includes('[MM]')) {
        $("#MMTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (transfer.includes('[DD]')) {
        $("#DDTRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (transfer.includes('/')) {
        $("#CBTRANSFER").combobox("setValue", "/")
      } else if (transfer.includes('-')) {
        $("#CBTRANSFER").combobox("setValue", "-")
      } else if (transfer.includes('.')) {
        $("#CBTRANSFER").combobox("setValue", ".")
      } else {
        $("#CBTRANSFER").combobox("setValue", "")
      }

      if (terimatransfer.includes('[LOKASI]')) {
        $("#LOKASITERIMATRANSFER").prop("checked", true);
      }
      if (terimatransfer.includes('[YY]')) {
        $("#YYTERIMATRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (terimatransfer.includes('[MM]')) {
        $("#MMTERIMATRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (terimatransfer.includes('[DD]')) {
        $("#DDTERIMATRANSFER").prop("checked", true).attr("disabled", false);
      }
      if (terimatransfer.includes('/')) {
        $("#CBTERIMATRANSFER").combobox("setValue", "/")
      } else if (terimatransfer.includes('-')) {
        $("#CBTERIMATRANSFER").combobox("setValue", "-")
      } else if (terimatransfer.includes('.')) {
        $("#CBTERIMATRANSFER").combobox("setValue", ".")
      } else {
        $("#CBTERIMATRANSFER").combobox("setValue", "")
      }

      if (bbm.includes('[LOKASI]')) {
        $("#LOKASIBBM").prop("checked", true);
      }
      if (bbm.includes('[YY]')) {
        $("#YYBBM").prop("checked", true).attr("disabled", false);
      }
      if (bbm.includes('[MM]')) {
        $("#MMBBM").prop("checked", true).attr("disabled", false);
      }
      if (bbm.includes('[DD]')) {
        $("#DDBBM").prop("checked", true).attr("disabled", false);
      }
      if (bbm.includes('/')) {
        $("#CBBBM").combobox("setValue", "/")
      } else if (bbm.includes('-')) {
        $("#CBBBM").combobox("setValue", "-")
      } else if (bbm.includes('.')) {
        $("#CBBBM").combobox("setValue", ".")
      } else {
        $("#CBBBM").combobox("setValue", "")
      }

      if (bbk.includes('[LOKASI]')) {
        $("#LOKASIBBK").prop("checked", true);
      }
      if (bbk.includes('[YY]')) {
        $("#YYBBK").prop("checked", true).attr("disabled", false);
      }
      if (bbk.includes('[MM]')) {
        $("#MMBBK").prop("checked", true).attr("disabled", false);
      }
      if (bbk.includes('[DD]')) {
        $("#DDBBK").prop("checked", true).attr("disabled", false);
      }
      if (bbk.includes('/')) {
        $("#CBBBK").combobox("setValue", "/")
      } else if (bbk.includes('-')) {
        $("#CBBBK").combobox("setValue", "-")
      } else if (bbk.includes('.')) {
        $("#CBBBK").combobox("setValue", ".")
      } else {
        $("#CBBBK").combobox("setValue", "")
      }

      if (kirim.includes('[LOKASI]')) {
        $("#LOKASIKIRIM").prop("checked", true);
      }
      if (kirim.includes('[YY]')) {
        $("#YYKIRIM").prop("checked", true).attr("disabled", false);
      }
      if (kirim.includes('[MM]')) {
        $("#MMKIRIM").prop("checked", true).attr("disabled", false);
      }
      if (kirim.includes('[DD]')) {
        $("#DDKIRIM").prop("checked", true).attr("disabled", false);
      }
      if (kirim.includes('/')) {
        $("#CBKIRIM").combobox("setValue", "/")
      } else if (kirim.includes('-')) {
        $("#CBKIRIM").combobox("setValue", "-")
      } else if (kirim.includes('.')) {
        $("#CBKIRIM").combobox("setValue", ".")
      } else {
        $("#CBKIRIM").combobox("setValue", "")
      }

      if (repacking.includes('[LOKASI]')) {
        $("#LOKASIREPACKING").prop("checked", true);
      }
      if (repacking.includes('[YY]')) {
        $("#YYREPACKING").prop("checked", true).attr("disabled", false);
      }
      if (repacking.includes('[MM]')) {
        $("#MMREPACKING").prop("checked", true).attr("disabled", false);
      }
      if (repacking.includes('[DD]')) {
        $("#DDREPACKING").prop("checked", true).attr("disabled", false);
      }
      if (repacking.includes('/')) {
        $("#CBREPACKING").combobox("setValue", "/")
      } else if (repacking.includes('-')) {
        $("#CBREPACKING").combobox("setValue", "-")
      } else if (repacking.includes('.')) {
        $("#CBREPACKING").combobox("setValue", ".")
      } else {
        $("#CBREPACKING").combobox("setValue", "")
      }

      if (pemakaianbahan.includes('[LOKASI]')) {
        $("#LOKASIPEMAKAIANBAHAN").prop("checked", true);
      }
      if (pemakaianbahan.includes('[YY]')) {
        $("#YYPEMAKAIANBAHAN").prop("checked", true).attr("disabled", false);
      }
      if (pemakaianbahan.includes('[MM]')) {
        $("#MMPEMAKAIANBAHAN").prop("checked", true).attr("disabled", false);
      }
      if (pemakaianbahan.includes('[DD]')) {
        $("#DDPEMAKAIANBAHAN").prop("checked", true).attr("disabled", false);
      }
      if (pemakaianbahan.includes('/')) {
        $("#CBPEMAKAIANBAHAN").combobox("setValue", "/")
      } else if (pemakaianbahan.includes('-')) {
        $("#CBPEMAKAIANBAHAN").combobox("setValue", "-")
      } else if (pemakaianbahan.includes('.')) {
        $("#CBPEMAKAIANBAHAN").combobox("setValue", ".")
      } else {
        $("#CBPEMAKAIANBAHAN").combobox("setValue", "")
      }

      if (saldostok.includes('[LOKASI]')) {
        $("#LOKASISALDOSTOK").prop("checked", true);
      }
      if (saldostok.includes('[YY]')) {
        $("#YYSALDOSTOK").prop("checked", true).attr("disabled", false);
      }
      if (saldostok.includes('[MM]')) {
        $("#MMSALDOSTOK").prop("checked", true).attr("disabled", false);
      }
      if (saldostok.includes('[DD]')) {
        $("#DDSALDOSTOK").prop("checked", true).attr("disabled", false);
      }
      if (saldostok.includes('/')) {
        $("#CBSALDOSTOK").combobox("setValue", "/")
      } else if (saldostok.includes('-')) {
        $("#CBSALDOSTOK").combobox("setValue", "-")
      } else if (saldostok.includes('.')) {
        $("#CBSALDOSTOK").combobox("setValue", ".")
      } else {
        $("#CBSALDOSTOK").combobox("setValue", "")
      }

      if (orderreturbeli.includes('[LOKASI]')) {
        $("#LOKASIOPNAMESTOK").prop("checked", true);
      }
      if (orderreturbeli.includes('[YY]')) {
        $("#YYOPNAMESTOK").prop("checked", true).attr("disabled", false);
      }
      if (orderreturbeli.includes('[MM]')) {
        $("#MMOPNAMESTOK").prop("checked", true).attr("disabled", false);
      }
      if (orderreturbeli.includes('[DD]')) {
        $("#DDOPNAMESTOK").prop("checked", true).attr("disabled", false);
      }
      if (orderreturbeli.includes('/')) {
        $("#CBOPNAMESTOK").combobox("setValue", "/")
      } else if (orderreturbeli.includes('-')) {
        $("#CBOPNAMESTOK").combobox("setValue", "-")
      } else if (orderreturbeli.includes('.')) {
        $("#CBOPNAMESTOK").combobox("setValue", ".")
      } else {
        $("#CBOPNAMESTOK").combobox("setValue", "")
      }

      if (returbeli.includes('[LOKASI]')) {
        $("#LOKASIPENYESUAIANSTOK").prop("checked", true);
      }
      if (returbeli.includes('[YY]')) {
        $("#YYPENYESUAIANSTOK").prop("checked", true).attr("disabled", false);
      }
      if (returbeli.includes('[MM]')) {
        $("#MMPENYESUAIANSTOK").prop("checked", true).attr("disabled", false);
      }
      if (returbeli.includes('[DD]')) {
        $("#DDPENYESUAIANSTOK").prop("checked", true).attr("disabled", false);
      }
      if (returbeli.includes('/')) {
        $("#CBPENYESUAIANSTOK").combobox("setValue", "/")
      } else if (returbeli.includes('-')) {
        $("#CBPENYESUAIANSTOK").combobox("setValue", "-")
      } else if (returbeli.includes('.')) {
        $("#CBPENYESUAIANSTOK").combobox("setValue", ".")
      } else {
        $("#CBPENYESUAIANSTOK").combobox("setValue", "")
      }

      $("#DIGITTRANSFER").numberbox("setValue", data.transfer.jumlahdigit);
      $("#DIGITTERIMATRANSFER").numberbox("setValue", data.terimatransfer.jumlahdigit);
      $("#DIGITBBM").numberbox("setValue", data.bbm.jumlahdigit);
      $("#DIGITBBK").numberbox("setValue", data.bbk.jumlahdigit);
      $("#DIGITKIRIM").numberbox("setValue", data.kirim.jumlahdigit);
      $("#DIGITREPACKING").numberbox("setValue", data.repacking.jumlahdigit);
      $("#DIGITPEMAKAIANBAHAN").numberbox("setValue", data.pemakaianbahan.jumlahdigit);
      $("#DIGITSALDOSTOK").numberbox("setValue", data.saldostok.jumlahdigit);
      $("#DIGITOPNAMESTOK").numberbox("setValue", data.opnamestok.jumlahdigit);
      $("#DIGITPENYESUAIANSTOK").numberbox("setValue", data.penyesuaianstok.jumlahdigit);

      if (data.transfer.value == "AUTO") {
        $("#SBTRANSFER").switchbutton('check');
      } else {
        $("#SBTRANSFER").switchbutton('uncheck');
      }
      if (data.terimatransfer.value == "AUTO") {
        $("#SBTERIMATRANSFER").switchbutton('check');
      } else {
        $("#SBTERIMATRANSFER").switchbutton('uncheck');
      }
      if (data.bbm.value == "AUTO") {
        $("#SBBBM").switchbutton('check');
      } else {
        $("#SBBBM").switchbutton('uncheck');
      }
      if (data.bbk.value == "AUTO") {
        $("#SBBBK").switchbutton('check');
      } else {
        $("#SBBBK").switchbutton('uncheck');
      }
      if (data.kirim.value == "AUTO") {
        $("#SBKIRIM").switchbutton('check');
      } else {
        $("#SBKIRIM").switchbutton('uncheck');
      }
      if (data.repacking.value == "AUTO") {
        $("#SBREPACKING").switchbutton('check');
      } else {
        $("#SBREPACKING").switchbutton('uncheck');
      }
      if (data.pemakaianbahan.value == "AUTO") {
        $("#SBPEMAKAIANBAHAN").switchbutton('check');
      } else {
        $("#SBPEMAKAIANBAHAN").switchbutton('uncheck');
      }
      if (data.saldostok.value == "AUTO") {
        $("#SBSALDOSTOK").switchbutton('check');
      } else {
        $("#SBSALDOSTOK").switchbutton('uncheck');
      }
      if (data.opnamestok.value == "AUTO") {
        $("#SBOPNAMESTOK").switchbutton('check');
      } else {
        $("#SBOPNAMESTOK").switchbutton('uncheck');
      }
      if (data.penyesuaianstok.value == "AUTO") {
        $("#SBPENYESUAIANSTOK").switchbutton('check');
      } else {
        $("#SBPENYESUAIANSTOK").switchbutton('uncheck');
      }

      const promises = [
        generate_kode("TRANSFER"),
        generate_kode("TERIMATRANSFER"),
        generate_kode("BBM"),
        generate_kode("BBK"),
        generate_kode("KIRIM"),
        generate_kode("REPACKING"),
        generate_kode("PEMAKAIANBAHAN"),
        generate_kode("SALDOSTOK"),
        generate_kode("OPNAMESTOK"),
        generate_kode("PENYESUAIANSTOK"),
      ];

      await Promise.all(promises);

      if (data.transrefbbm.value == "HEADER") {
        $("#TRANSREFBBM").switchbutton('check');
      } else {
        $("#TRANSREFBBM").switchbutton('uncheck');
      }
      if (data.transrefbbk.value == "HEADER") {
        $("#TRANSREFBBK").switchbutton('check');
      } else {
        $("#TRANSREFBBK").switchbutton('uncheck');
      }
      if (data.transrefkirim.value == "HEADER") {
        $("#TRANSREFKIRIM").switchbutton('check');
      } else {
        $("#TRANSREFKIRIM").switchbutton('uncheck');
      }
      if (data.hargapenyesuaianstok.value == "YA") {
        $("#HARGAPENYESUAIANSTOK").switchbutton('check');
      } else {
        $("#HARGAPENYESUAIANSTOK").switchbutton('uncheck');
      }
    }

    async function getDataInventori() {
      try {
        const response = await parent.fetchData(link_api.loadSettingInventori, null);

        if (response.success) {
          await loadDataInventori(response.data);
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
        const response = await parent.fetchData(link_api.loadConfigInventori, {
          modul: modul
        });

        if (response.success) {
          const msg = response.data;
          if (msg.prefix.includes('[LOKASI]')) {
            $("#LOKASI" + modul).prop("checked", true);
          } else {
            $("#LOKASI" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[YY]')) {
            $("#YY" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#YY" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[MM]')) {
            $("#MM" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#MM" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('[DD]')) {
            $("#DD" + modul).prop("checked", true).attr("disabled", false);
          } else {
            $("#DD" + modul).prop("checked", false).attr("disabled", false);
          }
          if (msg.prefix.includes('/')) {
            $("#CB" + modul).combobox("setValue", "/")
          } else if (msg.prefix.includes('-')) {
            $("#CB" + modul).combobox("setValue", "-")
          } else if (msg.prefix.includes('.')) {
            $("#CB" + modul).combobox("setValue", ".")
          } else {
            $("#CB" + modul).combobox("setValue", "")
          }

          $("#PREFIX" + modul).textbox("setValue", msg.prefix.replace(/\//g, "").replace(/\-/g, "").replace(/\./g, "")
            .replace("[LOKASI]", "").replace("[YY]", "").replace("[MM]", "").replace("[DD]", "").replace("[NUM]", ""));
          $("#DIGIT" + modul).numberbox("setValue", msg.jumlahdigit);
          generate_kode(modul);
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
      const lokasi = $("#LOKASI" + modul).is(":checked");
      const thn = $("#YY" + modul).is(":checked");
      const bln = $("#MM" + modul).is(":checked");
      const tgl = $("#DD" + modul).is(":checked");
      const separator = $("#CB" + modul).combobox("getValue");

      try {
        const response = await parent.fetchData(link_api.generateCodeInventori, {
          modul: modul,
          prefix: prefix,
          jmldigit: jmldigit,
          separator: separator,
          lokasi: lokasi.toString(),
          thn: thn.toString(),
          bln: bln.toString(),
          tgl: tgl.toString(),
        });

        if (response.success) {
          const msg = response.data;
          if ($("#SB" + modul).switchbutton("options").checked) {
            $("#LABEL" + modul).html(msg.kode);
          } else {
            $("#LABEL" + modul).html("MANUAL");
          }

          if (msg.sudahadadata) {
            $("#SB" + modul).switchbutton("disable");
            $("#PREFIX" + modul).textbox("disable");
            $("#DIGIT" + modul).numberbox("disable");
            $("#CB" + modul).combobox("disable");
            $("#LOKASI" + modul).prop("disabled", true);
            $("#YY" + modul).prop("disabled", true);
            $("#MM" + modul).prop("disabled", true);
            $("#DD" + modul).prop("disabled", true);
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

        const response = await parent.fetchData(link_api.simpanSettingInventori, payload);

        if (response.success) {
          return true;
        } else {
          throw new Error(response.message || 'Gagal menyimpan data.');
        }
      } catch (e) {
        throw new Error(e.message || 'Terjadi kesalahan saat menyimpan data.');
      }
    }

    async function handleFormSubmit(onSuccessCallback) {
      const isValid = $('#form_input').form('validate');

      if (isValid) {
        try {
          tampilLoaderSimpan();
          await simpanData();
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
        window.location = "{{ route('atena.master.pengaturan.frame-master-penjualan') }}";
      } else {
        $.messager.alert('Error', 'Token tidak valid, silahkan login kembali', 'error');
      }
    }

    async function simpan() {
      await handleFormSubmit(() => {
        $.messager.alert('Info', 'Data berhasil diubah', 'info');
      });
    }

    async function next() {
      await handleFormSubmit(() => {
        window.location.href = "{{ route('atena.master.pengaturan.frame-master-aset') }}";
      });
    }
  </script>
@endpush
