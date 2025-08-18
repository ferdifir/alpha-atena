@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">

                        <input type="hidden" name="mode" id="mode">
                        <input type="hidden" name="uuidcurrency" id="uuidcurrency">
                        <table style="padding:5px" id="label_form">
                            <tr>
                                <td align="right" id="label_form">Kode</td>
                                <td><input id="KODECURRENCY" name="kodecurrency" style="width:190px" class="label_input">
                                    <label id="label_form"><input type="checkbox" id="STATUS" name="status"
                                            value="1"> Aktif</label>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:70px" align="right" id="label_form">Nama</td>
                                <td><input name="namacurrency" style="width:250px" class="label_input" required
                                        validType='length[0,100]'></td>
                            </tr>
                            <tr>
                                <td align="right" id="label_form">Simbol</td>
                                <td><input name="simbol" style="width:250px" class="label_input" validType='length[0,50]' required>
                                </td>
                            </tr>
                        </table>
                        <div id="dlg-buttons" style="position: fixed;bottom:0;background-color: white;width:100%;">
                            <table cellpadding="0" cellspacing="0" style="width:100%">
                                <tr>
                                    <td align="left" id="label_form"><label style="font-weight:normal"
                                            id="label_form">User Input :</label> <label id="lbl_kasir"></label> <label
                                            style="font-weight:normal" id="label_form">| Tgl Input :</label> <label
                                            id="lbl_tanggal"></label></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-options="region:'east',border:false" style="width:50px; padding:5px; border-left:1px solid #29b6f6; ">
            <br>
            <a href="#" title="Simpan" class="easyui-tooltip " iconCls="" data-options="plain:false"
                id='btn_simpan' onclick="javascript:simpan()"><img src="{{ asset('assets/images/simpan.png') }}"></a>
            <br><br>
            <a href="#" title="Tutup" class="easyui-tooltip " iconCls="" data-options="plain:false"
                onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}"></a>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var row = {}
        $(document).ready(async function() {
            bukaLoader();
            $("#verify").dialog({
                onOpen: function() {
                    $('#verify').form('clear');
                },
                buttons: '#verify-buttons'
            }).dialog('close');

            @if ($mode == 'tambah')
                tambah();
            @elseif ($mode == 'ubah')
                await ubah();
            @endif
            tutupLoader();
        })
        shortcut.add('F8', function() {
            simpan();
        });

        function tutup() {
            parent.tutupTab();
        }

        function tambah() {
            $('#form_input').form('clear');
            $('#mode').val('tambah');


            $('#STATUS').prop('checked', true);
            $('#lbl_kasir, #lbl_tanggal').html('');
            $('#KODECURRENCY').textbox({
                prompt: "",
                readonly: false,
                required: true
            });
            $('#KODECURRENCY').textbox('clear').textbox('textbox').focus();
        }

        async function ubah() {
            $('#mode').val('ubah');
            try {
                const response = await fetch(link_api.loadHeaderCurrency, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidcurrency: '{{ $data }}',
                        mode: "ubah",
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    row = response.data;
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                $.messager.alert('Error', error, 'error');
                console.log(error);
            }
            if (row) {
                $('#form_input').form('load', row);
                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);
                $('#KODECURRENCY').textbox('readonly', true);
                $('#uuidcurrency').val('{{ $data }}');

                get_akses_user('{{ $kodemenu}}', function(data) {
                    if (data.ubah != 1) {
                        $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
                    }
                });
            }
        }

        function simpan() {
            var isValid = $('#form_input').form('validate');

            if (isValid) {
                try {
                    mode = $('[name=mode]').val();

                    $.ajax({
                        type: 'POST',
                        url: link_api.simpanCurrency,
                        data: $('#form_input :input').serialize(),
                        dataType: 'json',
                        beforeSend: function(xhr) {
                            tampilLoaderSimpan();
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(msg) {
                            if (msg.success) {
                                if (mode == 'tambah') {
                                    $.messager.show({
                                        title: 'Info',
                                        msg: 'Simpan Data Sukses',
                                        showType: 'show'
                                    });
                                    tambah();
                                } else {
                                    //tutup tab dan refresh data di function
                                    $.messager.alert('Info', 'Simpan Data Sukses', 'info');
                                }
                            } else {
                                $.messager.alert('Error', msg.message, 'error');
                            }
                        },
                        complete: function() {
                            tutupLoaderSimpan();
                        }
                    });
                } catch (error) {
                    $.messager.alert('Error', "Simpan Data Gagal", 'error');
                    console.log(error);
                }
            }
        }
    </script>
@endpush
