@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <input type="hidden" name="mode" id="mode">
                        <input type="hidden" name="uuidmerk">
            <input type="hidden" id="TGLENTRY" name="tglentry">
                        <table style="padding:5px" id="label_form">
                            <tr>
                                <td align="right" id="label_form">Kode</td>
                                <td><input id="KODEMERK" name="kodemerk" style="width:290px" class="label_input">
                                    <label id="label_form"><input type="checkbox" id="STATUS" name="status"
                                            value="1"> Aktif</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" id="label_form">Nama</td>
                                <td><input name="namamerk" style="width:350px" class="label_input" required="true"
                                        validType='length[0,100]'></td>
                            </tr>
                            <td valign="top" align="right" id="label_form">Disc Min</td>
                            <td><input id="DISCOUNTMIN" name="discountmin" style="width:142px;" class="label_input"
                                    validType='length[0,14]'
                                    data-options="required:true,precision:2,decimalSeparator:'.',suffix:'%'">
                                &nbsp;&nbsp;<span id="label_form">Disc Max</span>
                                <input id="DISCOUNTMAX" name="discountmax" style="width:142px;" class="label_input"
                                    validType='length[0,14]'
                                    data-options="required:true,precision:2,decimalSeparator:'.',suffix:'%'">
                            </td>
                            <tr>
                                <td valign="top" align="right" id="label_form">Catatan</td>
                                <td>
                                    <textarea name="catatan" style="width:350px; height:50px" class="label_input" multiline="true"
                                        validType='length[0,300]'></textarea>
                                </td>
                            </tr>
                        </table>
                        <div style="position: fixed;bottom:0;background-color: white;width:100%;">
                            <table cellpadding="0" cellspacing="0" style="width:100%">
                                <tr>
                                    <td align="left" id="label_form">
                                        <label style="font-weight:normal" id="label_form">User Input :</label>
                                        <label id="lbl_kasir"></label>
                                        <label style="font-weight:normal" id="label_form">| Tgl Input :</label>
                                        <label id="lbl_tanggal"></label>
                                    </td>
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
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-filter/datagrid-filter.js') }}">
    </script>
    <script>
        var row = {};
        let config = {};
        $(document).ready(async function() {
            bukaLoader();
            let check = false;
            await getConfig("KODEPERKIRAAN", "MPERKIRAAN", 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check = true;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "token tidak valid.") {
                            window.alert("Login session sudah habis. Silahkan Login Kembali");
                        } else {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                },
                function(error) {
                    $.messager.alert('Error', "Request Config Error", 'error');
                });
            if (!check) return;
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
            if (config.value == "AUTO") {
                $('#KODEMERK').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODEMERK').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODEMERK').textbox('clear').textbox('textbox').focus();
            }
        }

        async function ubah() {
            $('#mode').val('ubah');
            $('#uuidmerk').val('{{ $data }}');
            try {
                let url = link_api.getHeaderMerk;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidmerk: '{{ $data }}',
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
        $.messager.alert("error", getTextError(error), "error");
                console.log(error);
            }
            if (row) {
                $('#form_input').form('load', row);

                $('[name=mode]').val('ubah');

                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);
                $('#KODEMERK').textbox('readonly', true);

                await get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                    if (data.data.ubah != 1) {
                        $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
                    }
                });
            }
        }

        async function simpan() {
            var isValid = $('#form_input').form('validate');

            var cekDiskon = cek_format($('#DISCOUNTMIN').textbox('getValue'));

            if (cekDiskon == "error") {
                $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');

                return false;
            }

            var cekDiskon = cek_format($('#DISCOUNTMAX').textbox('getValue'));

            if (cekDiskon == "error") {
                $.messager.alert('Peringatan', 'Discount Hanya Boleh Berisi + . Dan Angka Saja', 'error');

                return false;
            }

            var diskonmin = hitungAkumulasiDiskonPersen($('#DISCOUNTMIN').textbox('getValue'));
            var diskonmax = hitungAkumulasiDiskonPersen($('#DISCOUNTMAX').textbox('getValue'));

            if (diskonmin > diskonmax) {
                $.messager.alert('Peringatan', 'Disc Min harus lebih kecil dari Disc Max', 'error');

                return false;
            }

            if (isValid) {
                tampilLoaderSimpan();
                var mode = '{{ $mode }}';
                try {
                    let headers = {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                    };
                    let requestBody = null;
                    var unindexed_array = $('#form_input :input').serializeArray();

                    var body = {};
                    $.map(unindexed_array, function(n, i) {
                        body[n['name']] = n['value'];
                    });
                    // Cek apakah body adalah instance dari FormData
                    if (body instanceof FormData) {
                        // Jika FormData, jangan set 'Content-Type'. Browser akan melakukannya secara otomatis.
                        requestBody = body;
                    } else {
                        // Default: Jika bukan FormData, asumsikan itu JSON.
                        headers['Content-Type'] = 'application/json';
                        requestBody = body ? JSON.stringify(body) : null;
                    }
                    let url = link_api.simpanMerk;
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: headers,
                        body: requestBody,
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(
                                `HTTP error! status: ${response.status} from ${url}`);
                        }
                        return response.json();
                    })
                    if (response.success) {
                        if (mode == 'tambah') {
                            $.messager.alert('Info', 'Simpan Data Sukses', 'info');

                            tambah();
                        } else {
                            //tutup tab dan refresh data di function
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                            await ubah();
                        }
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (error) {
        $.messager.alert("error", getTextError(error), "error");
                }
                tutupLoaderSimpan();
            }
        }
    </script>
@endpush
