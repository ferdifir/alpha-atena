<div id="window_button_simpan" class="easyui-window" title="Konfirmasi" data-options="modal:true,closed:true" style="top: 20px">
    <center>
        <div id="button_simpan">
            <a title="Simpan" class="easyui-linkbutton button_add" id="simpan_saja" onclick="simpan(this.id)" style="height:40px;">
                <span class="text">Simpan</span>
            </a>
            <br><br>
            <a title="Simpan & Cetak" class="easyui-linkbutton button_add_print" id="simpan_cetak" onclick="simpan(this.id)" style="height:40px;">
                <span class="text">Simpan & Cetak</span>
            </a>
        <div>
    </center>
</div>

<div id="window_button_cetak" class="easyui-window" title="Cetak" data-options="modal:true,closed:true" style="top: 20px">
    <center>
        <div id="button_simpan">
            <a href="#" title="Cetak" class="easyui-linkbutton button_add_print" id="cetak" onclick="cetak()" style="height: 40px">
                <span class="text">Cetak</span>
            </a>
            <br><br>
            <a href="#" title="Whatsapp" class="easyui-linkbutton button_wa" id="wa" onclick="kirimNotaWA()" style="height: 40px">
                <span class="text">Whatsapp</span>
            </a>
        <div>
    </center>
</div>

<div id="form_cetak2" class="easyui-window" title="Cetak" data-options="modal:true,closed:true" style="width: 600px; height:400px">
    <div id="area_cetak2" style="height:100%"></div>
<div>
