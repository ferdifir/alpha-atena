@extends('template.app')

@section('content')
<div style="width:400px" class="easyui-tabs" id="menu">
    <div title="Hitung HPP" style="padding:5px">
        <table id="menu-1">
            <tr>
                <td id="label_form">Bulan</td>
                <td>
                    <select id="sb_bulan" class="easyui-combobox" required="true" name="sb_bulan" style="width:150px">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">Nopember</option>
                        <option value="12">Desember</option>
                    </select>
                    <input name="txt_tahun" type="text" class="easyui-numberspinner" required="true" id="txt_tahun"
                    style="width:60px" maxlength="4" data-options="min:1990" value="<?= date('Y') ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td id="label_form"><input type="checkbox" id="PAKAIADJUSTMENT" name="pakaiadjustment" value="1">
                    Adjustment Diperhitungkan Sebagai HPP</td>
                </tr>
                <tr hidden>
                    <td><input type="checkbox" id="PAKAIPPN" name="pakaippn" value="1"></td>
                    <td id="label_form">PPN Diperhitungkan Sebagai HPP</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><a id="btn_simpan" class="easyui-linkbutton"
                        data-options="iconCls:'icon-ok'">Hitung HPP</a></td>
                    </tr>
                </table>
            </div>
            <div title="Batal Hitung HPP" style="padding:5px">
                <table>
                    <tr>
                        <td id="label_form">Kodetrans</td>
                        <td><input id="IDCLOSING" name="idclosing" style="width:130px" /></td>
                    </tr>
                </tr>
                <td colspan="2" align="right"><a id="btn_batal" class="easyui-linkbutton"
                    data-options="iconCls:'icon-cancel'">Batal Hitung HPP</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="dialog">
        <div id="dialog-content"></div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('assets/js/utils.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#sb_bulan').combobox('setValue', '<?= date('m') ?>');

        $('#dialog').dialog({
            title: 'Perhatian',
            width: 600,
            height: 400,
            closed: true,
            modal: true,
            buttons: [{
                text: 'Lanjutkan',
                handler: async function() {
                    try {
                        let url = link_api.simpanHitungHPP;

                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                sb_bulan: $('#sb_bulan').combobox('getValue'),
                                txt_tahun: $('#txt_tahun').numberspinner('getValue'),
                                pakaiadjustment: $("#PAKAIADJUSTMENT").prop('checked') ? '1' : '0',
                                pakaippn: $("#PAKAIPPN").prop('checked') ? '1' : '0',
                            }),
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                        }

                        const result = await response.json();

                        if (result.success) {
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                            $("#IDCLOSING").combogrid('grid').datagrid('load', {q: ''});
                            $('#dialog-content').html('');
                            $('#dialog').dialog({
                                closed: true
                            });
                        } else {
                            $.messager.alert('Error', result.message, 'error');
                        }

                    } catch (error) {
                        console.error('Error details:', error);
                        var textError = typeof getTextError === 'function' ? getTextError(error) : error.message;
                        $.messager.alert('Error', textError, 'error');
                    }
                }
            },
            {
                text: 'Batal',
                handler: function() {
                    $('#dialog-content').html('');
                    $('#dialog').dialog({
                        closed: true
                    });
                }
            }
            ]
        });

        browse_kodetrans();

        tutupLoader();
    });

    $("#btn_simpan").click(function() {
        simpan($('#sb_bulan').combobox('getText'), $('#txt_tahun').textbox('getValue'));
    });

    $("#btn_batal").click(function() {
        batal_trans();
    });

    async function simpan(bulan, tahun) {
        $.messager.confirm('Perhatian', 'Anda Yakin Akan Melakukan Hitung HPP Periode ' + bulan + ' ' + tahun + ' ?',

        async function(r) {
            if (r) {
                bukaLoader();

                if ($("#PAKAIADJUSTMENT").prop('checked') == true) {
                    try {
                        let url = link_api.cekAdjustmentHitungHPP;

                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                bulan: $('#sb_bulan').combobox('getValue'),
                                tahun: $('#txt_tahun').numberspinner('getValue'),
                                pakaiadjustment: $("#PAKAIADJUSTMENT").prop('checked') ? '1' : '0',
                                pakaippn: $("#PAKAIPPN").prop('checked') ? '1' : '0',
                            }),
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                        }

                        const result = await response.json();

                        if (result.success) {
                            let urlSimpan = link_api.simpanHitungHPP;

                            const responseSimpan = await fetch(urlSimpan, {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'bearer {{ session('TOKEN') }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    bulan: $('#sb_bulan').combobox('getValue'),
                                    tahun: $('#txt_tahun').numberspinner('getValue'),
                                    pakaiadjustment: $("#PAKAIADJUSTMENT").prop('checked') ? '1' : '0',
                                    pakaippn: $("#PAKAIPPN").prop('checked') ? '1' : '0',
                                }),
                            });

                            if (!responseSimpan.ok) {
                                throw new Error(`HTTP error! status: ${responseSimpan.status} from ${urlSimpan}`);
                            }

                            const resultSimpan = await responseSimpan.json();

                            if (resultSimpan.success) {
                                $.messager.alert('Info', 'Transaksi Sukses', 'info');
                                $("#IDCLOSING").combogrid('grid').datagrid('load', {q: ''});
                            } else {
                                $.messager.alert('Error', resultSimpan.message, 'error');
                            }
                        } else {
                            $('#dialog-content').html(result.message);
                            $('#dialog').dialog({
                                closed: false
                            });
                        }

                    } catch (error) {
                        var textError = typeof getTextError === 'function' ? getTextError(error) : error.message;
                        $.messager.alert('Error', textError, 'error');
                    }
                } else {
                    try {
                        let url = link_api.simpanHitungHPP;

                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                bulan: $('#sb_bulan').combobox('getValue'),
                                tahun: $('#txt_tahun').numberspinner('getValue'),
                                pakaiadjustment: $("#PAKAIADJUSTMENT").prop('checked') ? '1' : '0',
                                pakaippn: $("#PAKAIPPN").prop('checked') ? '1' : '0',
                            }),
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                        }

                        const result = await response.json();

                        if (result.success) {
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                            $("#IDCLOSING").combogrid('grid').datagrid('load', {q: ''});
                        } else {
                            $.messager.alert('Error', result.message, 'error');
                        }

                    } catch (error) {
                        console.error('Error details:', error);
                        var textError = typeof getTextError === 'function' ? getTextError(error) : error.message;
                        $.messager.alert('Error', textError, 'error');
                    }
                }

                tutupLoader();
            }
        });
    }

    async function batal_trans() {
        var kodeclosing = $("#IDCLOSING").combogrid('getText');

        if (kodeclosing != '') {
            $.messager.confirm('Perhatian', 'Anda Yakin Membatalkan No Faktur ' + kodeclosing + ' ?', async function(r) {
                if (r) {
                    bukaLoader();
                    try {
                        let url = link_api.batalHitungHPP;

                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'bearer {{ session('TOKEN') }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                kodeclosing: kodeclosing
                            }),
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error(
                                    `HTTP error! status: ${response.status} from ${url}`
                                );
                            }
                            return response.json();
                        })

                        if (response.success) {
                            $.messager.alert('Info', 'Transaksi Sukses', 'info');
                            $("#IDCLOSING").combogrid('clear').combogrid('grid').datagrid('load', {q: ''})
                        } else {
                            $.messager.alert('Error', response.message, 'error');
                        }
                    } catch (error) {
                        var textError = getTextError(error);
                        $.messager.alert('Error', getTextError(error), 'error');
                    }
                    tutupLoader()
                }
            });
        }
    }

    function browse_kodetrans() {
        $("#IDCLOSING").combogrid({
            panelWidth: 400,
            mode: 'remote',
            idField: 'kodeclosing',
            textField: 'kodeclosing',
            sortName: 'tglawal',
            sortOrder: 'desc',
            url: link_api.browseHitungHPP,
            columns: [
            [{
                field: 'kodeclosing',
                title: 'Kode',
                width: 110,
                sortable: false
            },
            {
                field: 'tglawal',
                title: 'Tgl Awal',
                width: 80,
                sortable: false,
                align: 'center',
                formatter: ubah_tgl_indo
            },
            {
                field: 'tglakhir',
                title: 'Tgl Akhir',
                width: 80,
                sortable: false,
                align: 'center',
                formatter: ubah_tgl_indo
            },
            {
                field: 'userentry',
                title: 'User',
                width: 100,
                sortable: false
            },
            ]
            ],
        });
    }
</script>
@endpush
