$(document).ready(function () {
    $(".label_input").textbox();
    $.extend($.fn.validatebox.defaults.rules, {
        equals: {
            validator: function (value, param) {
                return value == $(param[0]).val();
            },
            message: "Field do not match.",
        },
    });
    $.extend($.fn.textbox.defaults, {
        fontTransform: "besar",
    });
    $.extend($.fn.validatebox.defaults, {
        fontTransform: "besar",
    });
    $.extend($.fn.combogrid.defaults, {
        selectFirstRow: false,
        delay: 500,
    });
    $(".number").numberbox().numberbox("setValue", 0);
    $(".noDecimal")
        .numberbox({
            precision: 0,
        })
        .numberbox("setValue", 0);
    $(".date").datebox().datebox("setValue", date_format());
    $.ajaxSetup({
        error: function (msg) {
            $.messager.progress("close");
            $.messager.alert("Error", "Error While Process", "error");

            // jika terdapat variabel cekbtnsimpan (variabel ini digunakan
            // pada form transaksi), maka ubah nilainya menjadi true
            if (cekbtnsimpan != undefined) {
                cekbtnsimpan = true;
            }
        },
    });
    $(".number")
        .add($(".noDecimal"))
        .on("focus", function () {
            $(this).select();
        });
    $(".number")
        .add($(".noDecimal"))
        .on("mouseup", function () {
            $(this).select();
        });
    $(document).on("mouseup", ".numberbox .textbox-text", function (e) {
        $(this).select();
    });
    $("#form-ubah-password")
        .dialog({
            modal: true,
            closable: true,
            buttons: [
                {
                    text: "Reset",
                    iconCls: "icon-reload",
                    handler: function () {
                        $("#form-ubah-password").form("clear");
                    },
                },
                {
                    text: "Update",
                    iconCls: "icon-save",
                    handler: function () {
                        if ($("#form-ubah-password").form("validate")) {
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "data/process/proses_login.php",
                                data:
                                    $(
                                        "#form-ubah-password :input"
                                    ).serialize() + "&act=ubah_password",
                                cache: false,
                                success: function (data) {
                                    if (data.success) {
                                        $.messager.alert(
                                            "Info",
                                            "Change Password is Success<br>Please Re-Login...",
                                            "info"
                                        );
                                        $.ajax({
                                            type: "POST",
                                            url: "data/process/proses_logout.php",
                                            cache: false,
                                            success: function (msg) {
                                                window.location = "index.php";
                                            },
                                        });
                                    } else {
                                        $.messager.alert(
                                            "Error",
                                            data.errorMsg,
                                            "error"
                                        );
                                    }
                                },
                            });
                        }
                    },
                },
            ],
            onOpen: function () {
                $(this).form("clear");
            },
        })
        .dialog("close");
});

function status_transaksi(statusTrans) {
    var linkTrans;
    if (statusTrans == "I") {
        linkTrans = "";
    }
    if (statusTrans == "S") {
        linkTrans =
            "<img style='height:100px;' src='" +
            base_url +
            "assets/images/cetak_transparan.png'>";
    }
    if (statusTrans == "R") {
        linkTrans = "";
    }
    if (statusTrans == "P" || statusTrans == "T") {
        linkTrans =
            "<img style='height:100px;' src='" +
            base_url +
            "assets/images/posting_transparan.png'>";
    }
    if (statusTrans == "D") {
        linkTrans =
            "<img style='height:100px;' src='" +
            base_url +
            "assets/images/batal_transparan.png'>";
    }
    return linkTrans;
}

function ubah_tgl_indo(date) {
    return date;
}

function ubah_tgl_mysql(date) {
    if (date != null) {
        var tahun = date.substr(6, 4);
        var tgl = date.substr(0, 2);
        var bulan = date.substr(3, 2);
        return tahun + "-" + bulan + "-" + tgl;
    }
}

function logout() {
    $.messager.confirm(
        "Question",
        "Anda Yakin Akan Keluar Dari Sistem ?",
        function (r) {
            if (r) {
                $.ajax({
                    type: "POST",
                    url: base_url + "Login/logout",
                    cache: false,
                    success: function (msg) {
                        window.location = base_url;
                        //window.location = 'http://localhost:70/nxt_home';
                    },
                });
            }
        }
    );
}

function halamanPilihPerusahaan() {
    $.messager.confirm(
        "Question",
        "Anda Yakin Akan Kembali ke Halaman Pilih Perusahaan ?",
        function (r) {
            if (r) {
                window.location = base_url + "Perusahaan";
            }
        }
    );
}

/**
 * menjalankan proses login
 *
 * @param {boolean} first_login
 */
function login(first_login) {
    var data = $("#form_login :input").serialize();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "Login/cekLogin",
        data: data + "&act=first_login",
        cache: false,
        success: function (msg) {
            if (msg.success) {
                $.messager.alert("Info", msg.info);

                if (first_login) {
                    window.location.replace(msg.redirect);
                } else {
                    location.reload();
                }
            } else {
                $.messager.alert("Error", msg.errorMsg, "error");
            }
        },
    });
}

function select_menu(link) {
    window.location = link;
}
var int = self.setInterval("clock()", 1000);

function clock() {
    var time = new Date();
    var sh = time.getHours() + "";
    var sm = time.getMinutes() + "";
    var ss = time.getSeconds() + "";
    $("#label_jam").html(
        (sh.length == 1 ? "0" + sh : sh) +
            ":" +
            (sm.length == 1 ? "0" + sm : sm) +
            ":" +
            (ss.length == 1 ? "0" + ss : ss)
    );
}

function date_format(date) {
    date = typeof date !== "undefined" ? date : new Date();
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d);
}

function date_name(index) {
    var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

    return days[index];
}

function time_format(date) {
    date = typeof date !== "undefined" ? date : new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    return h + ":" + m;
}

function date_parser(s) {
    if (!s) return new Date();
    var ss = s.split("-");
    var y = parseInt(ss[0], 10);
    var m = parseInt(ss[1], 10);
    var d = parseInt(ss[2], 10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
        return new Date(y, m - 1, d);
    } else {
        return new Date();
    }
}

function format_int(val, row) {
    return isNaN(parseInt(val)) ? 0 : parseInt(val);
}

function format_amount(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, decimaldigitamount, ",", ".");
    }
}

function format_qty(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, decimaldigitqty, ",", ".");
    }
}

function format_amount_2(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, 2, ",", ".");
    }
}

function format_amount_4(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, 4, ",", ".");
    }
}

function format_amount_6(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, 6, ",", ".");
    }
}

function format_amount_produksi(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, decimaldigitproduksi, ",", ".");
    }
}

function format_number(val, row) {
    if (isNaN(val)) {
        return val;
    } else {
        return accounting.formatNumber(val, 0, ",");
    }
}

function format_checked(val) {
    if (val == 1) {
        return '<input type="checkbox" checked="checked" disabled="disabled"/>';
    } else {
        return '<input type="checkbox" disabled="disabled"/>';
    }
}

shortcut = {
    all_shortcuts: {},
    add: function (shortcut_combination, callback, opt) {
        var default_options = {
            type: "keydown",
            propagate: false,
            disable_in_input: false,
            target: document,
            keycode: false,
        };
        if (!opt) opt = default_options;
        else {
            for (var dfo in default_options) {
                if (typeof opt[dfo] == "undefined")
                    opt[dfo] = default_options[dfo];
            }
        }
        var ele = opt.target;
        if (typeof opt.target == "string")
            ele = document.getElementById(opt.target);
        var ths = this;
        shortcut_combination = shortcut_combination.toLowerCase();
        var func = function (e) {
            e = e || window.event;
            if (opt["disable_in_input"]) {
                var element;
                if (e.target) element = e.target;
                else if (e.srcElement) element = e.srcElement;
                if (element.nodeType == 3) element = element.parentNode;
                if (element.tagName == "INPUT" || element.tagName == "TEXTAREA")
                    return;
            }
            if (e.keyCode) code = e.keyCode;
            else if (e.which) code = e.which;
            var character = String.fromCharCode(code).toLowerCase();
            if (code == 188) character = ",";
            if (code == 190) character = ".";
            var keys = shortcut_combination.split("+");
            var kp = 0;
            var shift_nums = {
                "`": "~",
                1: "!",
                2: "@",
                3: "#",
                4: "$",
                5: "%",
                6: "^",
                7: "&",
                8: "*",
                9: "(",
                0: ")",
                "-": "_",
                "=": "+",
                ";": ":",
                "'": '"',
                ",": "<",
                ".": ">",
                "/": "?",
                "\\": "|",
            };
            var special_keys = {
                esc: 27,
                escape: 27,
                tab: 9,
                space: 32,
                return: 13,
                enter: 13,
                backspace: 8,
                scrolllock: 145,
                scroll_lock: 145,
                scroll: 145,
                capslock: 20,
                caps_lock: 20,
                caps: 20,
                numlock: 144,
                num_lock: 144,
                num: 144,
                pause: 19,
                break: 19,
                insert: 45,
                home: 36,
                delete: 46,
                end: 35,
                pageup: 33,
                page_up: 33,
                pu: 33,
                pagedown: 34,
                page_down: 34,
                pd: 34,
                left: 37,
                up: 38,
                right: 39,
                down: 40,
                f1: 112,
                f2: 113,
                f3: 114,
                f4: 115,
                f5: 116,
                f6: 117,
                f7: 118,
                f8: 119,
                f9: 120,
                f10: 121,
                f11: 122,
                f12: 123,
            };
            var modifiers = {
                shift: {
                    wanted: false,
                    pressed: false,
                },
                ctrl: {
                    wanted: false,
                    pressed: false,
                },
                alt: {
                    wanted: false,
                    pressed: false,
                },
                meta: {
                    wanted: false,
                    pressed: false,
                },
            };
            if (e.ctrlKey) modifiers.ctrl.pressed = true;
            if (e.shiftKey) modifiers.shift.pressed = true;
            if (e.altKey) modifiers.alt.pressed = true;
            if (e.metaKey) modifiers.meta.pressed = true;
            for (var i = 0; (k = keys[i]), i < keys.length; i++) {
                if (k == "ctrl" || k == "control") {
                    kp++;
                    modifiers.ctrl.wanted = true;
                } else if (k == "shift") {
                    kp++;
                    modifiers.shift.wanted = true;
                } else if (k == "alt") {
                    kp++;
                    modifiers.alt.wanted = true;
                } else if (k == "meta") {
                    kp++;
                    modifiers.meta.wanted = true;
                } else if (k.length > 1) {
                    if (special_keys[k] == code) kp++;
                } else if (opt["keycode"]) {
                    if (opt["keycode"] == code) kp++;
                } else {
                    if (character == k) kp++;
                    else {
                        if (shift_nums[character] && e.shiftKey) {
                            character = shift_nums[character];
                            if (character == k) kp++;
                        }
                    }
                }
            }
            if (
                kp == keys.length &&
                modifiers.ctrl.pressed == modifiers.ctrl.wanted &&
                modifiers.shift.pressed == modifiers.shift.wanted &&
                modifiers.alt.pressed == modifiers.alt.wanted &&
                modifiers.meta.pressed == modifiers.meta.wanted
            ) {
                callback(e);
                if (!opt["propagate"]) {
                    e.cancelBubble = true;
                    e.returnValue = false;
                    if (e.stopPropagation) {
                        e.stopPropagation();
                        e.preventDefault();
                    }
                    return false;
                }
            }
        };
        this.all_shortcuts[shortcut_combination] = {
            callback: func,
            target: ele,
            event: opt["type"],
        };
        if (ele.addEventListener)
            ele.addEventListener(opt["type"], func, false);
        else if (ele.attachEvent) ele.attachEvent("on" + opt["type"], func);
        else ele["on" + opt["type"]] = func;
    },
    remove: function (shortcut_combination) {
        shortcut_combination = shortcut_combination.toLowerCase();
        var binding = this.all_shortcuts[shortcut_combination];
        delete this.all_shortcuts[shortcut_combination];
        if (!binding) return;
        var type = binding["event"];
        var ele = binding["target"];
        var callback = binding["callback"];
        if (ele.detachEvent) ele.detachEvent("on" + type, callback);
        else if (ele.removeEventListener)
            ele.removeEventListener(type, callback, false);
        else ele["on" + type] = false;
    },
};
$.extend($.fn.datagrid.methods, {
    getChecked: function (jq) {
        var rr = [];
        var rows = jq.datagrid("getRows");
        jq.datagrid("getPanel")
            .find("div.datagrid-cell-check input:checked")
            .each(function () {
                var index = $(this)
                    .parents("tr:first")
                    .attr("datagrid-row-index");
                rr.push(rows[index]);
            });
        return rr;
    },
});

function get_index(dg) {
    var row = $(dg).datagrid("getSelected");
    var id = $(dg).datagrid("getRowIndex", row);
    return id;
}

function get_akses_user(kodemenu, callback) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "atena/Master/Data/User/getUserAkses",
        data: "kodemenu=" + kodemenu,
        cache: false,
        success: function (msg) {
            if (msg.success) {
                callback(msg.data);
            } else {
                $.messager.alert("Error", msg.errorMsg, "error");
            }
        },
    });
}

function get_akses_cetak_ulang(modul, callback) {
    var modul_kode = {
        pembelian: "B93JH",
        penjualan: "OI02K",
        inventori: "92DXS",
        produksi: "3K93J",
        aset: "93JK4",
        keuangan: "L03KD",
        akuntansi: "P02MS",
    };

    get_akses_user(modul_kode[modul], function (data) {
        if (data.hakakses == 0) {
            $.messager.alert(
                "Warning",
                "Anda Tidak Memiliki Hak Akses Cetak Ulang",
                "warning"
            );
        } else {
            callback(data);
        }
    });
}

function get_status_trans(v_link, v_idtrans, callback) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + v_link + "/getStatusTrans",
        data: {
            idtrans: v_idtrans,
        },
        cache: false,
        success: function (msg) {
            callback(msg);
        },
    });
}

function ubah_status_trans(v_kodetrans, v_table, v_field, v_status, callback) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: "config/transaction_function.php",
        data: {
            act: "ubah_status",
            kodetrans: v_kodetrans,
            table: v_table,
            field: v_field,
            status: v_status,
        },
        cache: false,
        success: function (msg) {
            callback(msg);
        },
    });
}

function get_combogrid_data(obj_combogrid, field, table) {
    var data = obj_combogrid.combogrid("grid").datagrid("getData").firstRows;
    var data =
        typeof data != "undefined"
            ? data
            : obj_combogrid.combogrid("grid").datagrid("getRows");
    var ketemu = false;
    var pjg = data.length;
    for (var i = 0; i < pjg; i++) {
        if (data[i].ID == field) {
            obj_combogrid.combogrid("grid").datagrid("loadData", [data[i]]);
            obj_combogrid.combogrid("setValue", field);
            ketemu = true;
            return;
        }
    }
    if (!ketemu) {
        $.ajax({
            type: "POST",
            url: table,
            data: {
                q: field,
            },
            cache: false,
            success: function (msg) {
                obj_combogrid.combogrid("grid").datagrid("loadData", msg);
                // obj_combogrid.combogrid('setValue', field);
                obj_combogrid.combogrid("options").onChange.call();
            },
        });
    }
}

function clear_data(id) {
    $(id).combogrid("grid").datagrid("loadData", []);
    $(id).combogrid("clear");
}

function get_konversi(data, newVal, oldVal) {
    satuan_lama = 0;
    konversi_lama = 1;
    satuan_baru = 0;
    konversi_baru = 1;
    var pjg = data.length;
    for (var i = 0; i < pjg; i++) {
        var sat = data[i].satuan;
        var jenis = data[i].jenis;
        satuan_lama = sat == oldVal ? jenis : satuan_lama;
        satuan_baru = sat == newVal ? jenis : satuan_baru;
    }
    for (var i = 0; i < pjg; i++) {
        var konversi = parseFloat(data[i].konversi);
        var jenis = data[i].jenis;
        konversi_baru = parseFloat(
            satuan_baru > satuan_lama
                ? jenis <= satuan_baru && jenis > satuan_lama
                    ? konversi_baru * konversi
                    : konversi_baru
                : konversi_baru
        );
        konversi_lama = parseFloat(
            satuan_baru < satuan_lama
                ? jenis <= satuan_lama && jenis > satuan_baru
                    ? konversi_lama * konversi
                    : konversi_lama
                : konversi_lama
        );
    }
}

function create_form_login() {
    /*var html = '<div id="form_login" class="easyui-dialog" title="Login to Authorization" closable="true" style="width:100%;max-width:250px;padding:20px 10px;">';
    html += '<div style="margin-bottom:10px">';
    html += '<input class="label_input" name="txt_user" style="width:100%;height:40px;padding:12px" data-options="prompt:\'User ID\',iconCls:\'icon-man\',iconWidth:38,fontTransform:\'normal\'">';
    html += '</div>';
    html += '<div style="">';
    html += '<input class="label_input" name="txt_pass" type="password" style="width:100%;height:40px;padding:12px" data-options="prompt:\'Password\',iconCls:\'icon-lock\',iconWidth:38,fontTransform:\'normal\'">';
    html += '</div>';
    html += '</div>';
    $('body').prepend(html);
    $('.label_input').textbox();*/
}

function get_editor(dg, index, field) {
    return $(dg).datagrid("getEditor", {
        index: index,
        field: field,
    }).target;
}
if ($.fn.numberbox) {
    if (typeof decimaldigitamount == "undefined") {
        decimaldigitamount = 2;
    }
    $.fn.numberbox.defaults.precision = decimaldigitamount;
    $.fn.numberbox.defaults.groupSeparator = ",";
    $.fn.numberbox.defaults.decimalSeparator = ".";
}
if ($.fn.datebox) {
    $.fn.datebox.defaults.formatter = date_format;
    $.fn.datebox.defaults.parser = date_parser;
}
if ($.fn.textbox) {
    $.fn.textbox.defaults.fontTransform = "besar";
    $.fn.textbox.defaults.inputEvents = {
        blur: function (e) {
            var t = $(e.data.target);
            var opt = t.textbox("options");
            var val = opt.value;
            var opt_tf = opt.fontTransform;
            if (opt_tf == "besar") val = val.toUpperCase();
            else if (opt_tf == "kecil") val = val.toLowerCase();
            t.textbox("setValue", val);
        },
    };
}
if ($.fn.validatebox) {
    $.fn.validatebox.defaults.fontTransform = "besar";
    $.fn.validatebox.defaults.events = {
        blur: function (e) {
            var t = $(e.data.target);
            var opt = t.validatebox("options");
            var val = t.val();
            var opt_tf = opt.fontTransform;
            if (opt_tf == "besar") val = val.toUpperCase();
            else if (opt_tf == "kecil") val = val.toLowerCase();
            t.val(val);
        },
    };
}
if ($.fn.combogrid) {
    $.fn.combogrid.defaults.selectOnNavigation = false;
    $.fn.combogrid.defaults.selectFirstRow = false;
    $.fn.combogrid.defaults.onLoadSuccess = function (data) {
        // var cg = $(this);
        // var opt = cg.combogrid('options');
        // if (opt.selectFirstRow && opt.mode == 'local') {
        // 	if (data.rows.length == 1) {
        // 		cg.combogrid('grid').datagrid('selectRow', 0);
        // 		cg.combogrid('readonly', true);
        // 	} else {
        // 		cg.combogrid('readonly', false);
        // 	}
        // }
    };

    //COMBOGRID HURUF BESAR
    //$.fn.combogrid.defaults.onChange = function(newVal, oldVal) {
    //	var cg = $(this);
    //	cg.combogrid('setValue',newVal.toUpperCase());
    //};
}
if ($.messager) {
    $.messager.defaults.ok = "Ya";
    $.messager.defaults.cancel = "Tidak";
}

function export_excel(file_name, data) {
    var str =
        "<form method='post' action='config/export_to_excel.php' style='display:none' id='ReportTableData'>";
    str += "<input type='text' name='file_name' value='" + file_name + "'>";
    str += "<textarea name='tableData'>" + data + "</textarea>";
    str += "</form>";
    $("body").prepend(str);
    $("#ReportTableData").submit().remove();
}

function get_kurs(tanggal, id) {
    var nilaikurs = 1;
    $.ajax({
        async: false,
        dataType: "json",
        type: "POST",
        url: link_api.getRateCurrency,
        data: {
            tanggal: tanggal,
            uuidcurrency: id,
        },
        cache: false,
        success: function (msg) {
            //callback(msg);
            nilaikurs = msg.kurs;
        },
    });

    return nilaikurs;
}

function get_all_kurs(tanggal, callback) {
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "atena/Master/Data/Currency/all_rate",
        data: {
            tanggal: tanggal,
        },
        cache: false,
        success: function (msg) {
            callback(msg);
        },
    });
}

function ubah_url_combogrid(target, str_url, opt) {
    if (str_url.split("//").length - 1 <= 1) {
        target.combogrid("grid").datagrid("options").url = str_url;
        if (typeof opt == "boolean" && opt) {
            target.combogrid("clear");
            target.combogrid("grid").datagrid("load", {
                q: "",
            });
        }
        if (typeof opt == "object") {
            if (opt.clear) target.combogrid("clear");
            if (opt.reload)
                target.combogrid("grid").datagrid("load", {
                    q: "",
                });
        }
    }
}

function get_tgl_jatuh_tempo(e_tgljthtempo, tgltrans, selisih) {
    // parsing date
    var d = date_parser(tgltrans);

    // due date
    d.setDate(d.getDate() + parseInt(selisih));

    e_tgljthtempo.datebox("setValue", date_format(d));
}

function cek_datagrid(dg) {
    var fields = dg
        .datagrid("getColumnFields", true)
        .concat(dg.datagrid("getColumnFields"));
    var rows = dg.datagrid("getRows");
    var ln = rows.length;
    var rowIndex = 0;
    var simpan = true;
    while (rowIndex < ln) {
        var i = 0;
        while (i < fields.length) {
            var col = dg.datagrid("getColumnOption", fields[i]);
            if (typeof col != "undefined" && col != "null") {
                if (typeof col.editor != "undefined" && col.editor != "null") {
                    if (
                        typeof col.editor.options != "undefined" &&
                        col.editor.options != "null"
                    ) {
                        if (col.editor.options.required) {
                            if (rows[rowIndex][fields[i]] === "") {
                                simpan = false;
                                $.messager.alert(
                                    "Error",
                                    "Cek Baris " +
                                        (rowIndex + 1) +
                                        ", Kolom " +
                                        col.title +
                                        " Belum Diisi",
                                    "error"
                                );
                                break;
                            }
                        }
                    }
                }
            }
            i++;
        }
        rowIndex++;
    }
    return simpan;
}

function cek_format(data) {
    data = data.replace(/,/g, ".");
    data = data.replace(/ /g, "");
    return data.match(/^[+0-9.]+$/g) !== null ? data : "error";
}

function format_textarea(val) {
    if (typeof val == "undefined" || val != "null") return val;
    else return val.replace(/\n/g, "<br>");
}

$.extend($.fn.validatebox.defaults.rules, {
    checked: {
        validator: function (value, param) {
            var c = $(param[0]);
            if (!c[0]._binded) {
                c[0]._binded = true;
                c.unbind(".cc").bind("change.cc", function () {
                    c.validatebox("validate");
                });
            }
            return c.is(":checked");
        },
        message: "Please check it.",
    },
});

function cek_tanggal_tutup_periode(tgltrans, jenisclosing, callback) {
    var str_jenisclosing = ["HITUNGHPP", "AKUNTANSI"];

    $.ajax({
        type: "POST",
        url: base_url + "Home/cekTanggalTutupPeriode",
        data: {
            tgltrans: tgltrans,
            jenisclosing: str_jenisclosing[jenisclosing],
        },
        async: false,
        success: function (response) {
            callback(response);
        },
    });
}

function hint_style() {
    $(this).tooltip("tip").css({
        backgroundColor: "#1a7bc9",
        borderColor: "#1a7bc9",
    });
}

function create_hint(el_id, text, position) {
    if (position == undefined) {
        position = "right";
    }

    $(el_id).tooltip({
        position: position,
        content: '<p class="text-white" style="margin: 0">' + text + "</p>",
        onShow: hint_style,
    });
}

function validasi_session(callback) {
    $.ajax({
        url: base_url + "Home/validasiSession",
        type: "POST",
        dataType: "json",
        success: function (response) {
            if (!response.success) {
                $.messager.alert("Error", response.errorMsg, "error");
            } else {
                callback();
            }
        },
    });
}

function nFormatter(num, digits) {
    var si = [
        { value: 1, symbol: "" },
        { value: 1e3, symbol: "K" },
        { value: 1e6, symbol: "M" },
        { value: 1e9, symbol: "G" },
        { value: 1e12, symbol: "T" },
        { value: 1e15, symbol: "P" },
        { value: 1e18, symbol: "E" },
    ];

    var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
    var i;

    for (i = si.length - 1; i > 0; i--) {
        if (num >= si[i].value) {
            break;
        }
    }

    return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
}

// function set_ppn_aktif(tanggal, callback) {
// 	if (tanggal == '') {
// 		return false;
// 	}

// 	$.ajax({
// 		url: base_url + 'atena/Master/Data/PPN/getPPNAktif',
// 		method: 'POST',
// 		data: {
// 			tanggal: tanggal,
// 		},
// 		dataType: 'JSON',
// 		success: function (response) {
// 			if (response.success) {
// 				if (typeof callback === 'function') {
// 					callback(response);
// 				}
// 			} else {
// 				$.messager.alert('Peringatan', response.errorMsg, 'error');
// 			}
// 		},
// 	});
// }

function update_ppn_table_detail(
    datagrid_object,
    ppnpersen,
    callback_after_update_per_row
) {
    var rows = datagrid_object.datagrid("getRows");

    for (var i = 0; i < rows.length; i++) {
        datagrid_object.datagrid("updateRow", {
            index: i,
            row: {
                ppnpersen: ppnpersen,
            },
        });

        if (typeof callback_after_update_per_row === "function") {
            callback_after_update_per_row(i, rows[i]);
        }
    }
}

function hitungAkumulasiDiskonPersen(str_diskon) {
    str_diskon = str_diskon.toString();
    var akumulasi = 0;
    var daftar_diskon = str_diskon.split("+");

    for (var i = 0; i < daftar_diskon.length; i++) {
        var diskon = parseFloat(daftar_diskon[i]);
        akumulasi += (diskon / 100) * (100 - akumulasi);
    }

    return akumulasi;
}

/**
 * Mengambil data PPN aktif berdasarkan tanggal tertentu (versi fetch API)
 *
 * @param {string} tanggal - Tanggal dalam format YYYY-MM-DD untuk menentukan PPN aktif
 * @param {function} callback - Fungsi callback yang akan dipanggil setelah data diterima
 * @returns {boolean} false jika tanggal kosong
 */
function set_ppn_aktif(tanggal, callback) {
    if (tanggal == "") {
        return false;
    }

    const formData = new FormData();
    formData.append("tglaktif", tanggal);

    fetch(link_api.getPPNAktfif, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.success) {
                if (typeof callback === "function") {
                    callback(response);
                }
            } else {
                $.messager.alert("Peringatan", response.message, "error");
            }
        })
        .catch((error) => {
            $.messager.alert("Error", "Error While Process", "error");
        });
}

function tampilLoaderSimpan() {
    $("#mask-loader-simpan").fadeIn(250);
}

function tutupLoaderSimpan() {
    // Menghapus loading ketika halaman sudah dimuat
    setTimeout(function () {
        $("#mask-loader-simpan").fadeOut(500);
    }, 150);
}
function bukaLoader() {
    $("#mask-loader").fadeIn(250);
}
function tutupLoader() {
    // Menghapus loading ketika halaman sudah dimuat
    setTimeout(function () {
        $("#mask-loader").fadeOut(500);
    }, 150);
}
