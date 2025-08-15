! function(e) {
    function t(t, i) {
        var d = e(this),
            n = d.datagrid("cell");
        d.datagrid("options");
        if (!d.datagrid("input", n)) return d.datagrid("gotoCell", i), !1
    }

    function i(t) {
        var i = e(this),
            d = i.datagrid("cell");
        if (d) return i.datagrid("input", d) ? void 0 : (i.datagrid("editCell", {
            index: d.index,
            field: d.field,
            value: ""
        }), !1)
    }

    function d(t, i) {
        var d = e(t).datagrid("options");
        d.finder.getTr(t, i.index).find('td[field="' + i.field + '"]').removeClass("datagrid-row-selected"), d.onUnselectCell.call(t, i.index, i.field)
    }

    function n(t) {
        e(t).datagrid("getPanel").find("td.datagrid-row-selected").removeClass("datagrid-row-selected")
    }

    function l(t, i) {
        var d = e(t).datagrid("options");
        d.singleSelect && (d.onSelectCell.call(t, i.index, i.field), n(t)), d.finder.getTr(t, i.index).find('td[field="' + i.field + '"]').addClass("datagrid-row-selected")
    }

    function a(t, i) {
        var d = e(t),
            n = d.datagrid("cell");
        if (n) {
            var l = d.datagrid("input", n);
            if (l)
                if (i) {
                    if (!d.datagrid("validateRow", n.index)) return d.datagrid("gotoCell", n), l.focus(), !1;
                    d.datagrid("endEdit", n.index), d.datagrid("gotoCell", n)
                } else d.datagrid("cancelEdit", n.index), d.datagrid("gotoCell", n)
        }
        return !0
    }
    e.extend(e.fn.datagrid.defaults, {
        clickToEdit: !0,
        dblclickToEdit: !1,
        RowAdd: !0,
        RowDelete: !0,
        RowEdit: !0,
        navHandler: {
            37: function(i) {
                var d = e(this).datagrid("options");
                return t.call(this, i, d.isRtl ? "right" : "left")
            },
            39: function(i) {
                var d = e(this).datagrid("options");
                return t.call(this, i, d.isRtl ? "left" : "right")
            },
            38: function(e) {
                return t.call(this, e, "up")
            },
            40: function(e) {
                return t.call(this, e, "down")
            },
            13: function(t) {
                return function(t) {
                    var i = e(this),
                        d = i.datagrid("cell");
                    if (!d) return;
					var input = i.datagrid('input', d);
					//alert(input[0].tagName.toLowerCase())
					//alert(t.ctrlKey)
					if (input){
						if (input[0].tagName.toLowerCase() == 'textarea' && t.ctrlKey == false){
							//alert('masuk sini')
							//return false;
							input.focus();
						} else {
							//alert('masuk sana');
							a(this, !0)
						}
					} else {
						i.datagrid("editCell", d)
					}
					
                    //i.datagrid("input", d) ? a(this, !0) : i.datagrid("editCell", d);
                    return !1
                }.call(this, t)
            },
            27: function(e) {
                return function(e) {
                    return a(this, !1), !1
                }.call(this, e)
            },
            8: function(e) {
                return i.call(this, e)
            },
            46: function(t) {
                var d = e(this),
                    n = d.datagrid("cell"),
                    l = d.datagrid("options");
                return t.shiftKey && l.RowDelete ? (d.datagrid("getRows").length > 0 && e.messager.confirm("Confirm", "Anda Yakin Akan Menghapus Data Pada Baris Ini ?", function(e) {
                    if (e) {
                        var t = d.datagrid("getRows")[n.index];
                        d.datagrid("deleteRow", n.index), l.onAfterDeleteRow.call(this, n.index, t)
                    }
                    var i = d.datagrid("getRows").length == n.index ? d.datagrid("getRows").length - 1 : n.index;
                    d.datagrid("gotoCell", {
                        index: i,
                        field: n.field
                    })
                }), !1) : i.call(this, t)
            },
            keypress: function(t) {
                if (!t.metaKey && !t.ctrlKey) {
                    var i = e(this),
                        d = i.datagrid("cell");
                    i.datagrid("options");
                    if (d)
                        if (!i.datagrid("input", d)) {
                            var n = e("<span></span>");
                            n.html(String.fromCharCode(t.which));
                            var l = n.text();
                            if (n.remove(), l) return i.datagrid("editCell", {
                                index: d.index,
                                field: d.field,
                                value: l
                            }), !1
                        }
                }
            }
        },
        onBeforeCellEdit: function(e, t) {},
        onCellEdit: function(e, t, i) {},
        onSelectCell: function(e, t) {},
        onUnselectCell: function(e, t) {},
        onAfterDeleteRow: function(e, t) {}
    }), e.extend(e.fn.datagrid.methods, {
        editCell: function(t, i) {
            return t.each(function() {
                ! function(t, i) {
                    var d = e(t),
                        n = d.datagrid("options"),
                        l = d.datagrid("input", i);
                    if (0 != n.RowEdit) {
                        if (l) return d.datagrid("gotoCell", i), void l.focus();
                        if (a(t, !0) && 0 != n.onBeforeCellEdit.call(t, i.index, i.field)) {
                            var r = d.datagrid("getColumnFields", !0).concat(d.datagrid("getColumnFields"));
                            e.map(r, function(e) {
                                var t = d.datagrid("getColumnOption", e);
                                t.editor1 = t.editor, e != i.field && (t.editor = null)
                            }), d.datagrid("getColumnOption", i.field).editor ? (d.datagrid("beginEdit", i.index), (l = d.datagrid("input", i)) ? (d.datagrid("gotoCell", i), setTimeout(function() {
                                l.unbind(".cellediting").bind("keydown.cellediting", function(e) {
                                    if (13 == e.keyCode) return n.navHandler[13].call(t, e), !1
                                }), l.focus()
                            }, 0), n.onCellEdit.call(t, i.index, i.field, i.value), l.val(i.value)) : (d.datagrid("cancelEdit", i.index), d.datagrid("gotoCell", i))) : d.datagrid("gotoCell", i), e.map(r, function(e) {
                                var t = d.datagrid("getColumnOption", e);
                                t.editor = t.editor1
                            })
                        }
                    }
                }(this, i)
            })
        },
        isEditing: function(t, i) {
            var d = e.data(t[0], "datagrid").options.finder.getTr(t[0], i);
            return d.length && d.hasClass("datagrid-row-editing")
        },
        gotoCell: function(t, i) {
            return t.each(function() {
                ! function(t, i) {
                    var d = e(t),
                        a = d.datagrid("options"),
                        r = d.datagrid("getPanel").focus(),
                        o = d.datagrid("cell");
                    if (o) {
                        var g = d.datagrid("input", o);
                        if (g) return void g.focus()
                    }
                    if ("object" != typeof i) {
                        var c = r.find("td.datagrid-row-selected");
                        if (c) {
                            var s = d.datagrid("getColumnFields", !0).concat(d.datagrid("getColumnFields")),
                                f = c.attr("field"),
                                u = c.closest("tr.datagrid-row"),
                                C = parseInt(u.attr("datagrid-row-index")),
                                v = e.inArray(f, s);
                            if ("up" == i && C > 0) {
                                var h = d.datagrid("getRows");
                                if (a.RowDelete) {
                                    var p = [];
                                    0 == isNaN(C) && h.length > 0 && (p = e.map(h[C], function(e) {
                                        return e
                                    }));
                                    for (var w = 0; w < s.length;) {
                                        if (void 0 !== (k = d.datagrid("getColumnOption", s[w])) && "null" != k && void 0 !== k.editor && "null" != k.editor && void 0 !== k.editor.options && "null" != k.editor.options && k.editor.options.required) {
                                            "" === h[C][s[w]] && d.datagrid("deleteRow", C);
                                            break
                                        }
                                        w++
                                    }
                                }
                                C--
                            } else if ("down" == i)
                                if (a.finder.getRow(t, C + 1)) C++;
                                else {
                                    var b = !0;
                                    h = d.datagrid("getRows"), p = [], 0 == isNaN(C) && h.length > 0 && (p = e.map(h[C], function(e) {
                                        return e
                                    }));
                                    var x = {};
                                    for (w = 0; w < s.length;) {
                                        var m = "";
                                        if (void 0 !== (k = d.datagrid("getColumnOption", s[w])) && "null" != k && void 0 !== k.editor && "null" != k.editor && ("numberbox" == k.editor.type ? m = 0 : "datebox" == k.editor.type && (m = date_format()), void 0 !== k.editor.options && "null" != k.editor.options && k.editor.options.required && p.length > 0 && "" === h[C][s[w]])) {
                                            b = !1, e.messager.show({
                                                title: "Warning",
                                                msg: k.title + " Belum Diisi...",
                                                showType: "fade",
                                                timeout: 500,
                                                style: {
                                                    right: "",
                                                    bottom: ""
                                                }
                                            });
                                            break
                                        }
                                        x[s[w]] = m, w++
                                    }
                                    if (b && a.RowAdd) {
                                        for (d.datagrid("appendRow", x), f = "", w = 0; w < s.length;) {
                                            if (!(k = d.datagrid("getColumnOption", s[w])).hidden) {
                                                f = s[w];
                                                break
                                            }
                                            w++
                                        }
                                        return x = d.datagrid("getRows"), void d.datagrid("gotoCell", {
                                            index: x.length - 1,
                                            field: f
                                        })
                                    }
                                }
                            else if ("left" == i)
                                for (w = v - 1; w >= 0;) {
                                    if (!(k = d.datagrid("getColumnOption", s[w])).hidden) {
                                        v = w;
                                        break
                                    }
                                    w--
                                } else if ("right" == i)
                                    for (w = v + 1; w <= s.length - 1;) {
                                        var k;
                                        if (!(k = d.datagrid("getColumnOption", s[w])).hidden) {
                                            v = w;
                                            break
                                        }
                                        w++
                                    }
                            y({
                                index: C,
                                field: f = s[v]
                            })
                        }
                    } else y(i);

                    function y(e) {
                        d.datagrid("scrollTo", e.index), n(t), l(t, e);
                        var i = a.finder.getTr(t, e.index, "body", 2).find('td[field="' + e.field + '"]');
                        if (i.length) {
                            var r = d.data("datagrid").dc.body2,
                                o = i.position().left;
                            o < 0 ? r._scrollLeft(r._scrollLeft() + o * (a.isRtl ? -1 : 1)) : o + i._outerWidth() > r.width() && r._scrollLeft(r._scrollLeft() + (o + i._outerWidth() - r.width()) * (a.isRtl ? -1 : 1))
                        }
                    }
                }(this, i)
            })
        },
        enableCellEditing: function(t) {
            return t.each(function() {
                var t, i, d, n;
                i = e(t = this), d = i.datagrid("options"), (n = i.datagrid("getPanel")).attr("tabindex", 1).css("outline-style", "none").unbind(".cellediting").bind("keydown.cellediting", function(e) {
                    var i = d.navHandler[e.keyCode];
                    if (i) return i.call(t, e)
                }).bind("keypress.cellediting", function(e) {
                    return d.navHandler.keypress.call(t, e)
                }), n.panel("panel").unbind(".cellediting").bind("keydown.cellediting", function(e) {
                    e.stopPropagation()
                }).bind("keypress.cellediting", function(e) {
                    e.stopPropagation()
                }).bind("mouseover.cellediting", function(t) {
                    var i = e(t.target).closest("td[field]");
                    i.length && (i.addClass("datagrid-row-over"), i.closest("tr.datagrid-row").removeClass("datagrid-row-over"))
                }).bind("mouseout.cellediting", function(t) {
                    e(t.target).closest("td[field]").removeClass("datagrid-row-over")
                }), d.isRtl = "rtl" == i.datagrid("getPanel").css("direction").toLowerCase(), d.oldOnClickCell = d.onClickCell, d.oldOnDblClickCell = d.onDblClickCell, d.onClickCell = function(t, i, n) {
                    d.clickToEdit ? e(this).datagrid("editCell", {
                        index: t,
                        field: i,
                        value: n
                    }) : a(this, !0) && e(this).datagrid("gotoCell", {
                        index: t,
                        field: i
                    }), d.oldOnClickCell.call(this, t, i, n)
                }, d.dblclickToEdit && (d.onDblClickCell = function(t, i, n) {
                    e(this).datagrid("editCell", {
                        index: t,
                        field: i
                    }), d.oldOnDblClickCell.call(this, t, i, n)
                }), d.OldOnBeforeSelect = d.onBeforeSelect, d.onBeforeSelect = function() {
                    return !1
                }, i.datagrid("clearSelections")
            })
        },
        disableCellEditing: function(t) {
            return t.each(function() {
                var t, i, d;
                t = e(this), i = t.datagrid("getPanel"), (d = t.datagrid("options")).onClickCell = d.oldOnClickCell || d.onClickCell, d.onDblClickCell = d.oldOnDblClickCell || d.onDblClickCell, d.onBeforeSelect = d.OldOnBeforeSelect || d.onBeforeSelect, i.unbind(".cellediting").find("td.datagrid-row-selected").removeClass("datagrid-row-selected"), i.panel("panel").unbind(".cellediting")
            })
        },
        enableCellSelecting: function(t) {
            return t.each(function() {
                var t, i, a, r, o, g;
                i = e(t = this), a = i.data("datagrid"), r = i.datagrid("getPanel"), o = a.options, g = a.dc, r.attr("tabindex", 1).css("outline-style", "none").unbind(".cellediting").bind("keydown.cellediting", function(e) {
                    var i = o.navHandler[e.keyCode];
                    if (i) return i.call(t, e)
                }), g.body1.add(g.body2).unbind(".cellediting").bind("click.cellediting", function(i) {
                    var a = e(i.target).closest(".datagrid-row");
                    if (a.length && a.parent().length) {
                        var r = e(i.target).closest("td[field]", a);
                        if (r.length) {
                            var g = {
                                index: parseInt(a.attr("datagrid-row-index")),
                                field: r.attr("field")
                            };
                            o.singleSelect ? l(t, g) : o.ctrlSelect ? i.ctrlKey ? r.hasClass("datagrid-row-selected") ? d(t, g) : l(t, g) : (n(t), l(t, g)) : r.hasClass("datagrid-row-selected") ? d(t, g) : l(t, g)
                        }
                    }
                }).bind("mouseover.cellediting", function(t) {
                    var i = e(t.target).closest("td[field]");
                    i.length && (i.addClass("datagrid-row-over"), i.closest("tr.datagrid-row").removeClass("datagrid-row-over"))
                }).bind("mouseout.cellediting", function(t) {
                    e(t.target).closest("td[field]").removeClass("datagrid-row-over")
                }), o.isRtl = "rtl" == i.datagrid("getPanel").css("direction").toLowerCase(), o.OldOnBeforeSelect = o.onBeforeSelect, o.onBeforeSelect = function() {
                    return !1
                }, i.datagrid("clearSelections")
            })
        },
        disableCellSelecting: function(t) {
            return t.each(function() {
                ! function(t) {
                    var i = e(t),
                        d = i.data("datagrid"),
                        n = i.datagrid("getPanel"),
                        l = d.options;
                    l.onBeforeSelect = l.OldOnBeforeSelect || l.onBeforeSelect, n.unbind(".cellediting").find("td.datagrid-row-selected").removeClass("datagrid-row-selected");
                    var a = d.dc;
                    a.body1.add(a.body2).unbind("cellediting")
                }(this)
            })
        },
        input: function(t, i) {
            if (!i) return null;
            var d = t.datagrid("getEditor", i);
            if (d) {
                var n = e(d.target);
                return n.hasClass("textbox-f") && (n = n.textbox("textbox")), n
            }
            return null
        },
        cell: function(t) {
            return i = t[0], (d = e(i).datagrid("getPanel").find("td.datagrid-row-selected")).find("div.datagrid-cell"), d.length ? {
                index: parseInt(d.closest("tr.datagrid-row").attr("datagrid-row-index")),
                field: d.attr("field"),
                value: d.find("div.datagrid-cell").html()
            } : null;
            var i, d
        },
        getSelectedCells: function(t) {
            return i = t[0], d = [], e(i).datagrid("getPanel").find("td.datagrid-row-selected").each(function() {
                var t = e(this);
                d.push({
                    index: parseInt(t.closest("tr.datagrid-row").attr("datagrid-row-index")),
                    field: t.attr("field")
                })
            }), d;
            var i, d
        }
    })
}(jQuery);