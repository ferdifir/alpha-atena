@extends('template.form')

@section('content')
    <!--FORM INPUT -->
    <div id="form_input" class="easyui-layout" fit="true">
        <div data-options="region:'center',border:false">
            <div class="easyui-layout" fit="true">
                <div data-options="region:'center',border:false">
                    <div class="easyui-layout" style="height:100%" id="trans_layout">

                        @csrf
                        <input type="hidden" name="mode" id="mode">
                        <input type="hidden" name="uuidperkiraan">
                        <input type="hidden" name="kodecurrency" id="kodecurrency">
                        <input type="hidden" id="data_user" name="data_user">
                        <input type="hidden" id="data_lokasi" name="data_lokasi">

                        <div data-options="region:'center',border:false">
                            <table style="padding:5px" id="label_form">
                                <tr>
                                    <td align="right" id="label_form">Kode</td>
                                    <td>
                                        <input id="kodeperkiraan" name="kodeperkiraan" style="width:100px"
                                            class="label_input" required="true" validType='length[0,20]'>
                                        <label id="label_form"><input type="checkbox" id="status" name="status"
                                                value="1"> Aktif</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Nama</td>
                                    <td><input name="namaperkiraan" style="width:400px" class="label_input" required="true"
                                            validType='length[0,100]'></td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Kelompok</td>
                                    <td>
                                        <select name="kelompok" id="kelompok" style="width:200px" class="easyui-combobox"
                                            panelHeight="auto" required="true">
                                            <option value="NERACA-AKTIVA">Neraca-Aktiva</option>
                                            <option value="NERACA-PASIVA">Neraca-Pasiva</option>
                                            <option value="LABA/RUGI-PENAMBAH">Laba/Rugi-Penambah</option>
                                            <option value="LABA/RUGI-PENGURANG">Laba/Rugi-Pengurang</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Tipe</td>
                                    <td>
                                        <select id="tipe" name="tipe" style="width:80px" class="easyui-combobox"
                                            panelHeight="auto">
                                            <option value="HEADER">Header</option>
                                            <option value="DETAIL">Detail</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Induk</td>
                                    <td><input id="induk" name="induk" style="width:80px"> <input name="namainduk"
                                            id="namainduk" style="width:250px" class="label_input" readonly></td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Saldo</td>
                                    <td>
                                        <select id="saldo" name="saldo" style="width:80px" class="easyui-combobox"
                                            panelHeight="auto">
                                            <option value=""> - </option>
                                            <option value="DEBET">Debet</option>
                                            <option value="KREDIT">Kredit</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Jenis Kas-Bank</td>
                                    <td id="label_form">
                                        <select name="kasbank" style="width:80px" class="easyui-combobox"
                                            data-options="editable: false" panelHeight="auto" required="true">
                                            <option value="0"> - </option>
                                            <option value="1">Kas</option>
                                            <option value="2">Bank</option>
                                        </select>

                                        &nbsp;
                                        Kode Kas-Bank
                                        <input name="kodekasbank" style="width:50px" class="label_input"
                                            validType='length[0,10]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="label_form">Currency</td>
                                    <td><input id="uuidcurrency" name="uuidcurrency" style="width:80px"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <label> <input id="akunpiutang" name="akunpiutang" type="checkbox"
                                                value="1"> Akun Piutang</label>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <label> <input id="akunhutang" name="akunhutang" type="checkbox" value="1">
                                            Akun Hutang </label>
                                    </td>
                                </tr>
                            </table>

                            <div class="easyui-tabs" style="width: 300px;height: 250px">
                                <div title="Daftar User">
                                    <table id="table_data_user"></table>
                                </div>
                                {{-- <div title="Daftar Lokasi">
                                    <table id="table_data_lokasi"></table>
                                </div> --}}
                            </div>

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
    <script>
        var row = {}
        var config = {};
        var csrf_token = '{{ csrf_token() }}';
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
    <script>
        $(document).ready(async function() {
            bukaLoader();
            await getConfig("KODEPERKIRAAN", "MPERKIRAAN", 'bearer {{ session('TOKEN') }}',
                function(response) {
                    if (response.success) {
                        config = response.data;
                    } else {
                        if ((response.message ?? "").toLowerCase() == "token tidak valid") {
                            window.alert("Login session sudah habis. Silahkan Login Kembali");
                        } else {
                            $.messager.alert('Error', error, 'error');
                        }
                    }
                });

            @if ($mode == 'tambah')
                tambah();
            @elseif ($mode == 'ubah')
                await ubah();
            @endif

            tutupLoader()

            $('#induk').combogrid({
                panelWidth: 335,
                mode: 'remote',
                idField: 'kode',
                // textField: 'kode',
                sortName: 'kode',
                sortOrder: 'asc',
                url: link_api.browseHeaderPerkiraan,
                onBeforeLoad: function(param) {
                    var dg = $('#induk');

                    // Tampilkan loading manual
                    dg.combogrid('grid').datagrid('loading');
                    $.ajax({
                        type: "POST",
                        url: link_api.browseHeaderPerkiraan,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            if (data.success) {
                                $('#induk').combogrid('grid').datagrid('loadData', data
                                    .data);
                            } else {
                                $.messager.alert('Error', data.message, 'error');
                            }
                        },
                        complete: function() {

                            dg.combogrid('grid').datagrid('loaded');
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda

                },
                columns: [
                    [{
                            field: 'uuidperkiraan',
                            title: 'Kode Akun',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode Akun',
                            width: 80
                        },
                        {
                            field: 'nama',
                            title: 'Nama Akun',
                            width: 250
                        }
                    ]
                ],
                onChange: function() {
                    var data = $('#induk').combogrid('grid').datagrid('getSelected');

                    $('#namainduk').textbox('setValue', data ? data.nama : '');
                }
            });

            $('#tipe').combobox({
                onChange: function(newValue, oldValue) {
                    if (newValue == "HEADER") {
                        $('#saldo').combobox('readonly', true);
                        $('#saldo').combobox('setValues', '');
                    } else if (newValue == "DETAIL") {
                        $('#saldo').combobox('readonly', false);
                        $('#induk').combogrid('readonly', false);
                        $('#saldo').combobox('options').required = true;
                        $('#induk').combogrid('options').required = true;
                    }
                }
            });

            $('#uuidcurrency').combogrid({
                required: true,
                required: true,
                panelWidth: 220,
                mode: 'local',
                idField: 'uuidcurrency',
                textField: 'nama',
                sortName: 'kode',
                sortOrder: 'asc',
                url: link_api.browseCurrency,
                onBeforeLoad: function(param) {
                    var dg = $('#uuidcurrency');

                    // Tampilkan loading manual
                    dg.combogrid('grid').datagrid('loading');

                    $.ajax({
                        type: "POST",
                        url: link_api.browseCurrency,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            if (data.success) {
                                $('#uuidcurrency').combogrid('grid').datagrid(
                                    'loadData',
                                    data.data);
                            } else {
                                $.messager.alert('Error', data.message, 'error');
                            }
                        },
                        complete: function() {
                            // Sembunyikan loading
                            dg.combogrid('grid').datagrid('loaded')
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda

                },
                columns: [
                    [{
                            field: 'uuidcurrency',
                            hidden: true
                        },
                        {
                            field: 'kode',
                            title: 'Kode',
                            width: 100
                        },
                        {
                            field: 'nama',
                            title: 'Keterangan',
                            width: 120
                        }
                    ]
                ],
                onSelect: function(index, row) {
                    $('#kodecurrency').val(row.kode);
                }
            });

            buat_table_user();
            // buat_table_lokasi();

            // Menghapus loading ketika halaman sudah dimuat
            setTimeout(function() {
                $('#mask-loader').fadeOut(500, function() {
                    $(this).hide()
                })
            }, 250)
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
            $('input[name=_token]').val(csrf_token);

            document.getElementById('btn_simpan').onclick = simpan;
            $('#btn_simpan').css('filter', '');

            $('#status').prop('checked', true);
            $('#lbl_kasir, #lbl_tanggal').html('');

            if (config.value == "AUTO") {
                $('#kodeperkiraan').textbox({
                    prompt: "Auto Generate",
                    readonly: true,
                    required: false
                });
            } else {
                $('#kodeperkiraan').textbox({
                    prompt: "",
                    readonly: false,
                    required: true
                });
            }
        }

        async function ubah() {
            $('#mode').val('ubah');
            try {
                const response = await fetch(link_api.headerFormPerkiraan, {
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

                // setTimeout digunakan untuk mengakali combobox yang tidak ke set value-nya
                setTimeout(function() {
                    $('#tipe').combobox('setValue', 'DETAIL');
                    get_akses_user('{{ $kodemenu }}', function(data) {
                        console.log(data);
                        if (data.success && data.data.ubah != 1) {
                            $('#btn_simpan').css('filter', 'grayscale(100%)').removeAttr('onclick');
                        }
                    });
                }, 250)

                $('#lbl_kasir').html(row.userbuat);
                $('#lbl_tanggal').html(row.tglentry);
                $('#kodeperkiraan').textbox('readonly', true);


            }
        }

        function simpan() {
            //Cek perkiraan Default
            var isValid = $('#form_input').form('validate');
            var mode = $('[name=mode]').val();

            if (isValid) {
                simpan_data(mode);
            } else {
                $.messager.alert('Error', "Ada data yang belum terisi", 'error');
            }
        }

        function simpan_data(mode) {
            bukaLoader()
            var datauser=$('#table_data_user').datagrid('getChecked');
            $('#data_user').val(JSON.stringify(datauser));
            // $('#data_lokasi').val(JSON.stringify($('#table_data_lokasi').datagrid('getChecked')));

            $.ajax({
                type: 'POST',
                url: link_api.simpanPerkiraan,
                data:  $('#form_input :input').serialize(),
                dataType: 'json',
                beforeSend: function(xhr) {
                    tampilLoaderSimpan();
                    xhr.setRequestHeader('Authorization',
                        'bearer {{ session('TOKEN') }}'
                    );
                },
                success: function(msg) {
                    tutupLoaderSimpan();

                    if (msg.success) {
                        if (mode == 'tambah') {
                            $.messager.show({
                                title: 'Info',
                                msg: 'Transaksi Sukses',
                                showType: 'show'
                            });

                            tambah();
                        } else {
                            //tutup tab dan refresh data di function
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                        }
                        parent.reload();
                        $('#INDUK').combogrid('grid').datagrid('reload');
                    } else {
                        $.messager.alert('Error', msg.errorMsg, 'error');
                    }
                }
            });
            tutupLoader()
        }

        function buat_table_user() {
            $("#table_data_user").datagrid({
                height: 200,
                panelwidth: 260,
                rownumbers: true,
                singleSelect: true,
                checkOnSelect: false,
                selectOnCheck: false,
                url: link_api.userGetAll,
                onBeforeLoad: function(param) {
                    var dg = $(this);

                    // Tampilkan loading manual
                    dg.datagrid('loading');
                    var opts = $(this).datagrid('options');
                    $.ajax({
                        type: "POST",
                        url: link_api.userGetAll,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            $('#table_data_user').datagrid('loadData', data.data);
                        },
                        complete: function() {
                            // Sembunyikan loading
                            dg.datagrid('loaded');
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda
                },
                columns: [
                    [{
                            field: 'ck',
                            title: '',
                            width: 30,
                            checkbox: true
                        },
                        {
                            field: 'uuiduser',
                            title: 'Id User',
                            hidden: true
                        },
                        {
                            field: 'username',
                            title: 'User Name',
                            width: 200
                        },
                    ]
                ],
                onLoadSuccess: async function(data) {
                    if ($('#mode').val() == 'tambah') {
                        return;
                    }

                    try {
                        const response = await fetch(link_api.getPerkiraanUser, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                uuidperkiraan: row.uuidperkiraan
                            }),
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error(
                                    `HTTP error! status: ${response.status} from ${url}`);
                            }
                            return response.json();
                        })

                        if (response.success) {
                            var rows = $('#table_data_user').datagrid('getRows');
                            var ln = rows.length;

                            for (var i = 0; i < ln; i++) {
                                var data = response.data;
                                var ln1 = data.length;

                                for (var j = 0; j < ln1; j++) {
                                    if (rows[i].iduser == data[j].iduser) {
                                        $('#table_data_user').datagrid('checkRow', i);

                                        break;
                                    }
                                }
                            }
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        $.messager.alert('Error', error, 'error');
                    }

                    // $.post(link_api.getPerkiraanUser, {
                    //     idperkiraan: row.idperkiraan
                    // }, function(msg) {
                    //     var rows = $('#table_data_user').datagrid('getRows');
                    //     var ln = rows.length;

                    //     for (var i = 0; i < ln; i++) {
                    //         var data = msg.data;
                    //         var ln1 = data.length;

                    //         for (var j = 0; j < ln1; j++) {
                    //             if (rows[i].iduser == data[j].iduser) {
                    //                 $('#table_data_user').datagrid('checkRow', i);

                    //                 break;
                    //             }
                    //         }
                    //     }
                    // }, 'json');
                },
            });
        }

        function buat_table_lokasi() {
            $("#table_data_lokasi").datagrid({
                height: 200,
                panelwidth: 260,
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
                            title: 'Kd. Lokasi',
                            width: 60
                        },
                        {
                            field: 'namalokasi',
                            title: 'Nama Lokasi',
                            width: 150
                        },
                    ]
                ],
                onBeforeLoad: function(param) {
                    var dg = $(this);

                    // Tampilkan loading manual
                    dg.datagrid('loading');
                    var opts = $(this).datagrid('options');
                    $.ajax({
                        type: "POST",
                        url: link_api.getLokasiAll,
                        data: param,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'bearer {{ session('TOKEN') }}'
                            );
                        },
                        success: function(data) {
                            $('#table_data_lokasi').datagrid('loadData', data.data);
                        },
                        complete: function() {
                            // Sembunyikan loading
                            dg.datagrid('loaded');
                        }
                    });
                    return false; // Supaya EasyUI tidak melakukan AJAX ganda
                },
                onLoadSuccess: function(data) {
                    if ($('#mode').val() == 'tambah') {
                        return;
                    }
                    // LINK API BELUM DIBUAT
                    // $.post(link_api.getPerkiraanLokasi', {
                    //     idperkiraan: row.idperkiraan
                    // }, function(msg) {
                    //     var rows = $('#table_data_lokasi').datagrid('getRows');
                    //     var ln = rows.length;

                    //     for (var i = 0; i < ln; i++) {
                    //         var data = msg.data;
                    //         var ln1 = data.length;

                    //         for (var j = 0; j < ln1; j++) {
                    //             if (rows[i].idlokasi == data[j].idlokasi) {
                    //                 $('#table_data_lokasi').datagrid('checkRow', i);
                    //                 break;
                    //             }
                    //         }
                    //     }
                    // }, 'json');
                },
            });
        }
    </script>
@endpush
