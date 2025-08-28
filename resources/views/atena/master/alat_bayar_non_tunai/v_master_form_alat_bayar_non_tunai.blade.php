@extends('template.form')

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">
                        <input type="hidden" name="mode" id="mode">
                        <input type="hidden" name="uuidnontunai">
                        <input type="hidden" name="detail_lokasi" id="detail_lokasi">

                        <table>
                            <tr>
                                <td valign="top">
                                    <table style="padding:5px" id="label_form">
                                        <tr>
                                            <td align="right" id="label_form">Kode</td>
                                            <td><input id="KODENONTUNAI" name="kodenontunai" style="width:290px"
                                                    class="label_input">
                                                <label id="label_form"><input type="checkbox" id="STATUS" name="status"
                                                        value="1"> Aktif</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" id="label_form">Nama</td>
                                            <td><input name="namanontunai" style="width:350px" class="label_input"
                                                    required="true" validType='length[0,100]'></td>
                                        </tr>
                                        <tr>
                                            <td align="right" id="label_form">Charge Customer</td>
                                            <td>
                                                <input name="charge" id="charge" style="width: 350px" class="number"
                                                    required="true" data-options="suffix: '%', min: 0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" id="label_form">Charge Bank</td>
                                            <td>
                                                <input name="chargebank" id="chargebank" style="width: 350px" class="number"
                                                    required="true" data-options="suffix: '%',min: 0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" id="label_form">Akun Perkiraan</td>
                                            <td>
                                                <input name="uuidperkiraan" id="uuidperkiraan" style="width:350px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" id="label_form">Akun Charge Bank</td>
                                            <td>
                                                <input name="uuidperkiraancharge" id="uuidperkiraancharge"
                                                    style="width:350px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="right" id="label_form">Catatan</td>
                                            <td>
                                                <textarea name="catatan" style="width:350px; height:50px" class="label_input" multiline="true"
                                                    validType='length[0,300]'></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td valign="top">
                                    <table id="table_data_lokasi"></table>
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
        var config = {};
        $(document).ready(async function() {
            bukaLoader();
            browse_data_perkiraan();
            browse_data_perkiraan_charge();
            buat_table_lokasi();
            let check = false;
            await getConfig("KODENONTUNAI", "MNONTUNAI", 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check = true;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "token tidak valid") {
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

            $('#charge').numberbox('setValue', 0);
            $('#chargebank').numberbox('setValue', 0);

            if (config.value == "AUTO") {
                $('#KODENONTUNAI').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODENONTUNAI').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODENONTUNAI').textbox('clear').textbox('textbox').focus();
            }
        }

        async function ubah() {
            $('#mode').val('ubah');
            try {
                let url = link_api.getHeaderNonTunai;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidnontunai: '{{ $data }}',
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

                $('[name=mode]').val('ubah');

                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);
                $('#KODENONTUNAI').textbox('readonly', true);

                $('#uuidperkiraan').combogrid('clear');
                $('#uuidperkiraancharge').combogrid('clear');

                if (row.uuidperkiraan !="") {
                    $('#uuidperkiraan').combogrid('setValue', {
                        uuidperkiraan: row.uuidperkiraan,
                        nama: row.namaperkiraan
                    });
                }

                if (row.uuidperkiraancharge !="") {
                    $('#uuidperkiraancharge').combogrid('setValue', {
                        uuidperkiraan: row.uuidperkiraancharge,
                        nama: row.namaperkiraancharge
                    });
                }

                load_data_lokasi(row.uuidnontunai);

                get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                    if (data.data.ubah != 1) {
                        $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
                    }
                });
            }
        }

        async function simpan() {
            var isValid = $('#form_input').form('validate');
            var detail_lokasi = $('#table_data_lokasi').datagrid('getChecked');

            if (detail_lokasi.length == 0) {
                $.messager.alert('Peringatan', 'Data lokasi belum dipilih', 'warning');

                return false;
            }

            if ($('#charge').numberbox('getValue') > 0 && $('#uuidperkiraan').combogrid('getValue') == '') {
                $.messager.alert('Peringatan', 'Data akun perkiraan belum diisi', 'warning');

                return false;
            }

            if ($('#chargebank').numberbox('getValue') > 0 && $('#uuidperkiraancharge').combogrid('getValue') == '') {
                $.messager.alert('Peringatan', 'Data akun charge bank belum diisi', 'warning');

                return false;
            }

            $('#detail_lokasi').val(JSON.stringify(detail_lokasi));

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
                        if (n['name'] == "detail_lokasi") {
                            var dataLokasi = JSON.parse(n['value']);
                            var lokasi = [];
                            $.map(dataLokasi, function(n, i) {
                                lokasi.push({"uuidlokasi": n['uuidlokasi']});
                            });
                            body[n['name']] = lokasi;
                        } else {
                            body[n['name']] = n['value'];
                        }
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
                    let url = link_api.simpanNonTunai;
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
                        }
                    } else {
                        $.messager.alert('Error', response.message, 'error');
                    }
                } catch (error) {
                    $.messager.alert('Error', error, 'error');
                }
                tutupLoaderSimpan();
            }
        }

        function buat_table_lokasi() {
            $('#table_data_lokasi').datagrid({
                height: '190px',
                width: '280px',
                rownumbers: true,
                singleSelect: true,
                checkOnSelect: false,
                selectOnCheck: false,
                url: link_api.getLokasiAll,
                columns: [
                    [{
                            field: 'ck',
                            title: '',
                            width: 30,
                            checkbox: true
                        },
                        {
                            field: 'kodelokasi',
                            title: 'Kode',
                            width: 60
                        },
                        {
                            field: 'namalokasi',
                            title: 'Lokasi',
                            width: 150
                        },
                    ]
                ]
            });
        }

        async function load_data_lokasi(uuidnontunai) {
            try {
                let url = link_api.loadLokasiNonTunai;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidnontunai: uuidnontunai,
                    }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                    }
                    return response.json();
                })
                if (response.success) {
                    row = response.data;
                    $('#table_data_lokasi').datagrid('loadData', row);

                    for (var i = 0; i < row.length; i++) {
                        if (row[i].dipilih == 1) {
                            $('#table_data_lokasi').datagrid('checkRow', i);
                        }
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }
            } catch (error) {
                $.messager.alert('Error', error, 'error');
                console.log(error);
            }
        }

        function browse_data_perkiraan() {
            $('#uuidperkiraan').combogrid({
                required: false,
                panelWidth: 330,
                mode: 'remote',
                idField: 'uuidperkiraan',
                textField: 'nama',
                sortName: 'kode',
                sortOrder: 'asc',
                url: link_api.browsePerkiraan,
                queryParams: {
                    jenis: "bank",
                    aktif: 1
                },
                columns: [
                    [{
                            field: 'kode',
                            title: 'Kode Akun',
                            width: 80
                        },
                        {
                            field: 'nama',
                            title: 'Nama Akun',
                            width: 235
                        }
                    ]
                ]
            });
        }

        function browse_data_perkiraan_charge() {
            $('#uuidperkiraancharge').combogrid({
                required: false,
                panelWidth: 330,
                mode: 'remote',
                idField: 'uuidperkiraan',
                textField: 'nama',
                sortName: 'kode',
                sortOrder: 'asc',
                url: link_api.browsePerkiraan,
                queryParams: {
                    jenis: "detail",
                    aktif: 1
                },
                columns: [
                    [{
                            field: 'kode',
                            title: 'Kode Akun',
                            width: 80
                        },
                        {
                            field: 'nama',
                            title: 'Nama Akun',
                            width: 235
                        }
                    ]
                ]
            });
        }
    </script>
@endpush
