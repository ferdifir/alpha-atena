@extends('template.form')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/extension/texteditor/texteditor.css') }}">
@endpush

@section('content')
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false ">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">

                        <input type="hidden" name="mode" id="mode">
                        <input type="hidden" name="idlokasi">
                        <div data-options="region:'center',border:false">
                            <table>
                                <tr>
                                    <td valign="top">
                                        <table style="padding:5px" id="label_form">
                                            <tr>
                                                <td align="right" id="label_form">Kode</td>
                                                <td><input id="KODELOKASI" name="kodelokasi" style="width:220px"
                                                        class="label_input">
                                                    <label id="label_form"><input type="checkbox" id="STATUS"
                                                            name="status" value="1"> Aktif</label>
                                                    <label id="label_form"><input type="checkbox" id="LOKASIDEFAULT"
                                                            name="lokasidefault" value="1"> Default</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Nama</td>
                                                <td><input name="namalokasi" style="width:350px" class="label_input"
                                                        required="true" validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Alamat</td>
                                                <td><input name="alamat" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Kota</td>
                                                <td><input name="kota" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Propinsi</td>
                                                <td><input name="propinsi" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Negara</td>
                                                <td><input name="negara" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:75px" align="right" id="label_form">Telp</td>
                                                <td><input name="telp" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">NITKU</td>
                                                <td><input name="nitku" style="width:350px" class="label_input"
                                                        validType='length[0,100]'></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">Selisih Setoran
                                                    Minimun</td>
                                                <td><input name="selisihsetoranmin" id="SELISIHSETORANMIN"
                                                        style="width:350px" class="number"></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">Selisih Setoran
                                                    Maksimum</td>
                                                <td><input name="selisihsetoranmax" id="SELISIHSETORANMAX"
                                                        style="width:350px" class="number"></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">Akun Kas Asal
                                                    Modal
                                                    Awal Kasir</td>
                                                <td><input name="idperkiraan" id="IDPERKIRAAN" style="width:350px"></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">Akun Kas Penerima
                                                    Setoran Kasir</td>
                                                <td><input name="idperkiraansetorankasir" id="IDPERKIRAANSETORANKASIR"
                                                        style="width:350px"></td>
                                            </tr>
                                            <tr>
                                                <td style="width:130px" align="right" id="label_form">Keterangan Footer
                                                    Pada Nota POS</td>
                                                <td>
                                                    <div class="easyui-texteditor" name="keteranganfooternotapos"
                                                        id="KETERANGANFOOTERNOTAPOS" style="height:140px;width:350px"
                                                        data-options="validType:'length[0, 500]'"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" id="label_form" valign="top">Catatan</td>
                                                <td>
                                                    <textarea name="catatan" style="width:350px; height:50px" class="label_input" multiline="true"
                                                        validType='length[0,300]'></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="top">
                                        <fieldset>
                                            <legend>Data Poin</legend>

                                            <table style="padding:5px" id="label_form">
                                                <tr>
                                                    <td style="width:75px" align="right" id="label_form">Minimal
                                                        Transaksi</td>
                                                    <td>
                                                        <input name="minimaltransaksipoin" style="width: 100px"
                                                            class="number" data-options="prefix: 'Rp'">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:75px" align="right" id="label_form">Nominal 1 Poin
                                                    </td>
                                                    <td>
                                                        <input name="konversi1poin" style="width: 100px" class="number"
                                                            data-options="prefix: 'Rp'">
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>

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
                onclick="javascript:tutup()"><img src="{{ asset('assets/images/cancel.png') }}">
            </a>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/datagrid-view/datagrid-detailview.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/jquery-easyui/extension/texteditor/jquery.texteditor.js') }}">
    </script>

    <script>
        var row = {};
        var config = {};
        $(document).ready(async function() {
            bukaLoader();
            let check = false;
            await getConfig("KODELOKASI", "MLOKASI", 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                        check = true;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "Token tidak valid") {
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

            browse_data_perkiraan('#IDPERKIRAAN');
            browse_data_perkiraan('#IDPERKIRAANSETORANKASIR');

            $('#KETERANGANFOOTERNOTAPOS').texteditor({
                toolbar: [],
            });

            // $('#KETERANGANFOOTERNOTAPOS').texteditor();
            tutupLoader()
            @if ($mode == 'tambah')
                tambah();
            @elseif ($mode == 'ubah')
                await ubah();
            @endif

        })

        shortcut.add('F8', function() {
            simpan();
        });

        function tambah() {
            $('#form_input').form('clear');
            $('#mode').val('tambah');

            $('#KETERANGANFOOTERNOTAPOS').texteditor('setValue', '')

            document.getElementById('btn_simpan').onclick = simpan;
            $('#btn_simpan').css('filter', '');

            $('#SELISIHSETORANMIN').numberbox('setValue', 0);
            $('#SELISIHSETORANMAX').numberbox('setValue', 0);

            $('#STATUS').prop('checked', true);
            $('#lbl_kasir, #lbl_tanggal').html('');

            if (config.value == "AUTO") {
                $('#KODELOKASI').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#KODELOKASI').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
                $('#KODELOKASI').textbox('clear').textbox('textbox').focus();
            }
        }

        async function ubah() {
            $('#mode').val('ubah');
            try {
                let url = link_api.getHeaderLokasi;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'bearer {{ session('TOKEN') }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        uuidperkiraan: '{{ $data }}',
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
                $('#KODELOKASI').textbox('readonly', true);

                $('#KETERANGANFOOTERNOTAPOS').texteditor('setValue', row.keteranganfooternotapos)

                $('#IDPERKIRAAN').combogrid('setValue', {
                    id: row.uuidperkiraan,
                    nama: row.namaperkiraan
                });

                $('#IDPERKIRAANSETORANKASIR').combogrid('setValue', {
                    id: row.uuidperkiraansetorankasir,
                    nama: row.namaperkiraansetorankasir
                });

                get_akses_user('{{ $kodemenu }}', 'bearer {{ session('TOKEN') }}', function(data) {
                    if (data.data.ubah != 1) {
                        $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
                    }
                });
            }
        }

        async function simpan() {
            //Cek Lokasi Default
            var isValid = $('#form_input').form('validate');
            var mode = $('[name=mode]').val();
            var kodelokasi = $('#KODELOKASI').val();

            var check = $('#KETERANGANFOOTERNOTAPOS').texteditor('getValue')

            var cekPanjangPerLine = getHtmlLineLengths(check)

            for (let i = 0; i < cekPanjangPerLine.length; i++) {
                if (cekPanjangPerLine[i] > 40) {
                    $.messager.alert('Warning',
                        `Keterangan Footer Pada Nota POS pada line ${i+1} dengan panjang ${cekPanjangPerLine[i]} character, tidak boleh lebih dari 40`,
                        'warning');
                    return;
                }
            }

            if (isValid) {
                let haveDefault = false;
                if ($('#LOKASIDEFAULT').is(':checked')) {
                    bukaLoader();
                    try {
                        let url = link_api.getLokasiDefault;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                "kodelokasi": kodelokasi,
                            }),
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                            }
                            return response.json();
                        })
                        if (response.success && response.data.kodelokasi != kodelokasi && response.data
                            .ada_lokasi_default == true) {
                            haveDefault = true;
                        } else {

                        tutupLoader();
                            $.messager.alert('Error', response.message, 'error');
                            return;
                        }
                    } catch (error) {
                        $.messager.alert('Error', error, 'error');
                        console.log(error);
                        tutupLoader();
                        return ;
                    }
                    tutupLoader();
                }
                if (haveDefault) {
                    $.messager.confirm('Confirm',
                        'Apakah Anda Yaking Merubah Lokasi Default?',
                        function(r) {
                            if (r) {
                                simpan_data();
                            }
                        });
                } else {
                    simpan_data();
                }

            }
        }

        async function simpan_data() {

            tampilLoaderSimpan()
            try {
                mode = $('[name=mode]').val();
                var unindexed_array = $('#form_input :input').serializeArray();
                console.log(unindexed_array);

                let headers = {
                    'Authorization': 'bearer {{ session('TOKEN') }}',
                };
                let requestBody = null;
                var body = {};
                $.map(unindexed_array, function(n, i) {
                    body[n['name']] = n['value'];
                });

                if (body instanceof FormData) {
                    requestBody = body;
                } else {
                    headers['Content-Type'] = 'application/json';
                    requestBody = body ? JSON.stringify(body) : null;
                }
                let url = link_api.simpanLokasi;
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
                    $.messager.alert('Info', 'Simpan Data Sukses', 'info');
                    if (mode == 'tambah') {
                        tambah();
                    }
                } else {
                    $.messager.alert('Error', response.message, 'error');
                }

            } catch (error) {
                $.messager.alert('Error', `Simpan Data Gagal : ${error}`, 'error');
            }
            tutupLoaderSimpan();
        }

        function browse_data_perkiraan(id) {
            $(id).combogrid({
                required: false,
                panelWidth: 330,
                mode: 'remote',
                idField: 'id',
                textField: 'nama',
                sortName: 'kode',
                sortOrder: 'asc',
                url: link_api.browsePerkiraan,
                queryParams: {
                    jenis: "kas",
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

        function getHtmlLineLengths(html) {
            // First, replace opening div tags with newlines (except the first one)
            let processedHtml = html.replace(/(<div>)/g, function(match, p1, offset) {
                // Don't add newline before the first div if it's at the beginning
                return offset === 0 ? match : '\n' + match;
            });

            // Remove HTML tags to get text content
            const textContent = processedHtml.replace(/<[^>]*>/g, '');

            // Split by lines
            const lines = textContent.split('\n');

            // Return array of lengths
            return lines.map(line => line.length);
        }
    </script>
@endpush
