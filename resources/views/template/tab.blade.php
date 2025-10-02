<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ isset($menu) ? $menu : 'Atena - Software Akuntansi Online Cloud Terbaik Di Indonesia' }}</title>
  <link rel="icon" href="{{ asset('assets/images/icon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/metro-blue/easyui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-easyui/themes/icon.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nav-modul.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loader.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-accordion.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sidebar.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Acme|Heebo|Hind|Nunito+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:900|Heebo:900&display=swap" rel="stylesheet">

  <script>
    var base_url = '{{ url('') }}/';
    var decimaldigitqty = {{ session('DECIMALDIGITQTY') }};
    var decimaldigitamount = {{ session('DECIMALDIGITAMOUNT') }};
    var csrf_token = '{{ csrf_token() }}';
    var warna_status_s = '{{ session('WARNA_STATUS_S') }}';
    var warna_status_p = '{{ session('WARNA_STATUS_P') }}';
    var warna_status_d = '{{ session('WARNA_STATUS_D') }}';
  </script>
</head>

<body class="easyui-layout">
  <!-- Loading start -->
  <div id="mask-loader">
    <svg class="loader-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
      <circle class="loader-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33"
        r="30"></circle>
    </svg>
  </div>
  <!-- Loading end -->

  <!-- MENU -->
  <div class="sidebarContainer" style="bottom:25px">
    <nav class="navi">
      <ul class="navList">
        <br>
        <br>
        @foreach (session('array_menu') as $menuLv1)
          @if ($menuLv1['kodemenu'] == 'UYTR5')
            <div class="main">

              <button class="btn top  shownow" id="collapsible">
                <div data-tooltip="{{ $menuLv1['namamenu'] }}">
                  <i class="{{ $menuLv1['icon'] }} iconColor" style="font-size:30px;"></i>
                </div>
              </button>
              <div class="laporanList notshow">
                @foreach ($menuLv1['children'] as $menuLv2)
                  <div class="mainLaporan">
                    <div class="laporanItem shownowLaporan">
                      <i class="{{ $menuLv2['icon'] }} iconColor " style="font-size:15px; margin-right:10px;"></i>

                      {{ $menuLv2['namamenu'] }}

                      <i class="fa fa-caret-left iconColor arrowIcon"
                        style="position:absolute; font-size:10px; right:15px;"></i>
                    </div>
                    <div class="notshowLaporan" style="display: none">

                      @foreach ($menuLv2['children'] as $menuLv3)
                        @php
                          $menuutama = str_replace(' ', '', $menuLv1['namamenu']);
                          $link =
                              url('') .
                              '/' .
                              $menuLv3['namamodul'] .
                              '/' .
                              $menuutama .
                              '/' .
                              str_replace(' ', '', $menuLv2['namamenu']) .
                              '/' .
                              $menuLv3['namaclass'] .
                              '?kode=' .
                              $menuLv3['kodemenu'] .
                              '&kodeinduk=' .
                              $menuLv1['kodemenu'] .
                              '&kodelaporan=' .
                              $menuLv2['kodemenu'] .
                              '&jenis=' .
                              $menuLv3['jenis'];
                        @endphp

                        <a href="#" id="linkLaporan" class="Links"
                          onclick="javascript:buka_submenu(event,'{{ $menuLv3['namamenu'] }} ','{{ $link }}','{{ $menuLv1['icon'] }}')">
                          <div class="laporanSubItems">

                            <i class="fa fa-caret-right iconColor " style="margin-right:10px; font-size:10px;"></i>
                            <i class="{{ $menuLv2['icon'] }} iconColor "
                              style="font-size:10px; margin-right:10px;"></i>

                            {{ $menuLv3['namamenu'] }}
                          </div>
                        </a>
                      @endforeach

                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          @endif
        @endforeach
        @foreach (session('array_menu') as $menuLv1)
          @if ($menuLv1['kodemenu'] != 'UYTR5')
            @php
              $i = 2;
              $topValue = 17;
            @endphp
            <li class="navItem main">

              <div data-tooltip="{{ $menuLv1['namamenu'] }}">
                <button class="btn top shownow ">

                  <i class="{{ $menuLv1['icon'] }} iconColor" style="font-size:30px;"></i>


                </button>
              </div>

              <div class="content1 notshow" style="top:<?= $topValue ?>px">

                @php
                  $topLaporan = 16;
                @endphp

                @foreach ($menuLv1['children'] as $menuLv2)
                  <ul class="submenuList">
                    @php
                      $urutan = 1;
                    @endphp
                    @foreach ($menuLv2['children'] as $menuLv3)
                      @php
                        $menuutama = str_replace(' ', '', $menuLv1['namamenu']);

                        // Parameter kodeinduk disini mereferensikan kodemenu pada parent menu yang paling atas (menu level 1),
                        // gunanya untuk bisa mendapatkan menu level 1 dari menu level 3 yang sedang dibuka
                        $link = strtolower(
                            url('') .
                                '/' .
                                $menuLv3['namamodul'] .
                                '/' .
                                $menuutama .
                                '/' .
                                $menuLv3['namaclass'] .
                                '/' .
                                str_replace(' ', '', $menuLv2['namamenu']) .
                                '?kode=' .
                                $menuLv3['kodemenu'] .
                                '&kodeinduk=' .
                                $menuLv1['kodemenu'] .
                                '&jenis=' .
                                $menuLv3['jenis'],
                        );
                      @endphp
                      <li class="submenuListItems">
                        <a href="#" class="Links linkSubmenu"
                          onclick="javascript:buka_submenu(event,'{{ $menuLv3['namamenu'] }}','{{ $link }}','{{ $menuLv1['icon'] }}')">
                          <div class="contentItemContainer">
                            <p class="menuOrder"></p>

                            <div class="iconContainer">
                              <!-- <i class="fa fa-question-circle-o" style="font-size:20px; color:white;"></i>-->
                            </div>

                            <p class="title">{{ $menuLv3['namamenu'] }}</p>
                          </div>
                        </a>
                      </li>

                      @php
                        $urutan++;
                      @endphp
                    @endforeach
                  </ul>
                @endforeach
              </div>
            </li>
            @php
              $i++;
              $topValue += 40.1;
            @endphp
          @endif
        @endforeach
      </ul>
    </nav>
  </div>

  <style>
    #header td {
      padding: 0
    }
  </style>
  <!-- Region north start -->
  <div id="header" data-options="region:'north',border:false" style="padding:0px; height:50px;">
    <!--<table width="100%" border="0" style="background-image:url('{{ asset('assets/images/header.png') }}');border-collapse:collapse">!-->
    <table width="100%" border="0"
      style="background-image:url({{ asset('assets/images/header.png') }});border-collapse:collapse">
      <tr class="logoheader">
        <td class="font-header-form" align="left" valign="center" style="padding-left: 28px; width:120px;">
          <img style="width: 100px;display: block" src="{{ asset('assets/images/logo_atena_white.png') }}">
        </td>
        <td align="left">
          <img id="billing-image" style="height:50px;" src="{{ asset('assets/images/freetrial.png') }}" hidden>
        </td>
        <td align="right" valign="center">
          <table>
            <tr>
              <td class="font-header-form" style="font-size: 25px;padding-right: 10px;">
                @if (session()->has('NAMAPERUSAHAAN'))
                  {{ session('NAMAPERUSAHAAN') }}
                @endif
              </td>
              <td class="label_form">
                <a target="_blank"><img src="{{ asset('assets/images/help.png') }}"
                    style="width:35px; height:35px; object-fit: cover; object-position: 50% 0%;"></a>
              </td>
              <td style="padding-right: 35px">
                <a href="javascript:void(0)" class="easyui-menubutton profile_btn"
                  data-options="menu:'#profile_menu',iconCls:''">
                  <table>
                    <tr>
                      <td>
                        @php
                          $gambaruser = session('DATAUSER')['gambar'] ?? 'assets/foto_user/NO_IMAGE.jpg';
                        @endphp
                        <img src="{{ $gambaruser }}"
                          style="border-radius:100%; width:30px; height:30px; object-fit: cover; object-position: 50% 0%;"
                          onerror="this.onerror=null;this.src='assets/foto_user/NO_IMAGE.jpg';">
                      </td>
                      <td>
                        <div id="user_entry" style="color:white;">
                          {{ session('DATAUSER')['username'] }}
                        </div>
                      </td>
                      <td>
                        <div id="profile_menu" style="width:200px; border-radius:5px;">
                          <div onclick="javascript:edit_profile()" data-options="iconCls:'icon-profile'">Profile</div>
                          @if (url()->current() != route('homepage.perusahaan') && count(session('LISTPERUSAHAAN')) > 1)
                            <div onclick="javascript:halamanPilihPerusahaan()" data-options="iconCls:'icon-logout'">
                              Kembali ke Pilih Perusahaan
                            </div>
                          @endif
                          <div onclick="javascript:logout()" data-options="iconCls:'icon-logout'">Keluar dari Aplikasi
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
  <!-- Region north end -->

  @if (!is_null(request()->get('kode')))
    @php
      $menu_induk = session('array_menu')
          ->where('kodemenu', request()->get('kodeinduk'))
          ->first();
    @endphp

    <!-- Region west start -->
    <div
      data-options="region: 'west',split: true,hideCollapsedContent: false,collapsed: true,iconCls: 'fa fa-align-justify fa-fw'"
      title="{{ $menu_induk->namamenu }}" style="width:320px">
  @endif

  <nav id="sidemenu-content" style="height: 100%" {{ is_null(request()->get('kode')) ? 'hidden' : '' }}>
    <div id="menu-link" class="menu-accordion">
      @include('template.nav_menu')
    </div>
  </nav>

  @if (!is_null(request()->get('kode')))
    </div>
  @endif

  <!-- Region center start -->
  <div data-options="region:'center'" id="v_modul" style="display: none">

    <!-- EDIT PROFILE -->
    <form id="form_input_user" enctype="multipart/form-data" method="post" hidden>
      <input type="hidden" name="iduser_profile" id="IDUSER_PROFILE">
      <input type="hidden" name="gambaruser_profile" id="GAMBARUSER_PROFILE">

      <!-- DATA USER DARI QUERY -->
      <table style="padding:2px" border="0">
        <tr>
          <td align="right" id="label_form" style="width:100px">Nama User </td>
          <td>
            <input name="username_profile" id="USERNAME_PROFILE" style="width:150px" class="label_input"
              validType='length[0,50]'>
          </td>
          <td>&nbsp;</td>
          <td rowspan="11" style="width:130px" valign="top" align="center">
            <div style="width:140px; height:140px; ">
              <img id="preview-image-profile" src=""
                style="width:100%; height:100%; object-fit: cover; object-position: 50% 0%;" />
            </div>
            <input id="FILEGAMBAR_PROFILE" name="filegambar_profile" class="easyui-filebox"
              data-options="required:false,buttonIcon:'icon-man',buttonText:'Foto'" style="width:140px">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Email </td>
          <td><input name="email_profile" id="EMAIL_PROFILE" style="width:150px" class="label_input"
              validType="email">
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">No. HP </td>
          <td><input name="nohp_profile" id="NOHP_PROFILE" style="width:150px" class="label_input"
              validType='number'>
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Old Password</td>
          <td><input name="old_pass_profile" id="OLD_PASS_PROFILE" type="password" class="label_input"
              data-options="required:true,fontTransform:'normal'" validType='length[0,50]' style="width:150px" />
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">New Password</td>
          <td><input name="new_pass_profile" type="password" class="label_input"
              data-options="fontTransform:'normal'" validType='length[0,50]' style="width:150px" />
          </td>
        </tr>
        <tr>
          <td align="right" id="label_form">Ulangi Password</td>
          <td><input name="re_pass_profile" id="RE_PASS_PROFILE" type="password" class="label_input"
              data-options="fontTransform:'normal'" validType="equals['[name=new_pass_profile]']"
              style="width:150px" /></td>
        </tr>
      </table>

    </form>
    <div id="dlg-buttons-profile" hidden>
      <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
          <td style="text-align:right">
            <a href="#" class="easyui-linkbutton" iconCls="icon-save" id='btn_simpan_profile'
              onclick="javascript:simpan_profile()">Simpan</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-reload"
              onclick="javascript:edit_profile()">Reset</a>
          </td>
        </tr>
      </table>
    </div>

    {{-- <div data-options="region:'center',border:false"> --}}
    <div class="easyui-layout" style="width:100%;height:100%;padding-left: 50px;">
      <div id="tab_menu" class="easyui-tabs" style="width:100%;height:100%;">
        <div title="Dashboard" id="Dashboard">
          {{-- <iframe src="{{ route('dashboard') }}" frameborder="0"
                        style="width: 100%; height: calc(100% - 5px)"></iframe> --}}
        </div>
      </div>
    </div>

  </div>

  <table width="100%" style="position:absolute; bottom:20px;">
    <tr>
      <td hidden style="height:40px; color:white; text-align:center; font-size:12pt;" id="billing-widget">Masa
        Gratis Anda Akan Berakhir Hari Lagi !&nbsp;&nbsp;</td>
    </tr>
  </table>

  <div data-options="region:'south',border:false"
    style="height:25px; background-color:#daeef5;padding:1px; vertical-align:bottom">

    <table width="100%" style="font-family:Verdana, Geneva, sans-serif;font-size:14px; font-weight:bold">
      <tr>
        <td width="50%" align="left">Developed by Alpha Raya Kreasi</td>
        <td align="right" style="padding-right:10px">
          <span>{{ session('DATAUSER')['username'] }} | {{ session('NAMALOKASI') ?? '' }} | </span>
          <span>{{ date('Y-m-d') }}</span>
          <span id="label_jam"></span>
        </td>
      </tr>
    </table>
  </div>

  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/jquery.easyui.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/js/function.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/accounting.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/menu-accordion.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/globalvariable.js') }}"></script>
  <script>
    var counter = 0;

    $("#lbl-user-login").click(function(e) {
      e.preventDefault();
      $('#mm-user').menu('show', {
        left: e.pageX,
        top: e.pageY
      });
    });

    $(document).ready(function() {

      $('button#nav-modul-close').click(function() {
        tutup_popup_modul()
      })

      $('button#nav-laporan-close').click(function() {
        tutup_popup_laporan()
      })

      $('#form_input_user').form({
        url: 'Master/Data/User/simpanProfil',
        ajax: true,
        iframe: false,
        success: function(data) {
          $.messager.progress('close');

          var msg = JSON.parse(data);

          if (msg.success) {

            $.messager.show({
              title: 'Info',
              msg: 'Profil telah Berubah',
              showType: 'show'
            });
            $('#form_input_user').dialog('close');
            location.reload();
            $('#preview-image-profile').removeAttr('src').replaceWith($(
              '#preview-image-profile').clone());
            $('#fm-tabs').tabs('select', 0)
          } else {
            $.messager.alert('Error', msg.message, 'error');
          }
        },
      });

      $("#form_input_user").dialog({
        onOpen: function() {
          $('#form_input_user').form('clear');
          $('#OLD_PASS_PROFILE').textbox('enableValidation');
        },
        onClose: function() {
          $('#OLD_PASS_PROFILE').textbox('disableValidation');
        },
        buttons: '#dlg-buttons-profile'
      }).dialog('close');

      $('#FILEGAMBAR_PROFILE').filebox({
        accept: 'image/*',
        onChange: function(newVal, oldVal) {
          var input = $(this).next().find('.textbox-value')[0];

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#preview-image-profile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
      });

      // Menghapus loading ketika halaman sudah dimuat
      setTimeout(function() {
        $('#mask-loader').fadeOut(500, function() {
          $(this).remove()
        })
      }, 150)

    });

    function edit_profile() {
      $('#form_input_user').dialog('open').dialog('setTitle', 'Edit Profil');
      $('#USERID_PROFILE').textbox('setValue', "{{ session('DATAUSER')['uuiduser'] }}");
      $('#USERID_PROFILE').textbox('readonly', true);
      $('#USERNAME_PROFILE').textbox('setValue', "{{ session('DATAUSER')['username'] }}");
      $('#EMAIL_PROFILE').textbox('setValue', "{{ session('DATAUSER')['email'] }}");
      $('#NOHP_PROFILE').textbox('setValue', "{{ session('DATAUSER')['nohp'] }}");
      $('#GAMBARUSER_PROFILE').val("{{ session('DATAUSER')['gambar_url'] }}");
      $('#IDUSER_PROFILE').val("{{ session('DATAUSER')['uuiduser'] }}");

      if ($('#GAMBARUSER_PROFILE').val() == "{{ session('DATAUSER')['gambar_url'] }}") {
        $('#preview-image-profile').removeAttr('src').replaceWith($('#preview-image-profile').clone());
        var image = $('#preview-image-profile')[0];
        var downloadingImage = new Image();
        downloadingImage.onload = function() {
          image.src = this.src;
        };

        downloadingImage.src = base_url + "assets/foto_user/" + "{{ session('DATAUSER')['gambar_url'] }}";
      }
    }

    function simpan_profile() {
      var isValid = $('#form_input_user').form('validate');

      if (isValid) {
        $('#form_input_user').submit();
      }
    }

    $("#lbl-user-login").click(function(e) {
      e.preventDefault();
      $('#mm-user').menu('show', {
        left: e.pageX,
        top: e.pageY
      });
    });

    /**
     * fungsi untuk menampilkan pop up daftar menu level 1/modul
     *
     * @param {string} animation
     */
    function buka_menu_utama(animation) {
      $('#nav-modul-mask').show()
      $('#nav-modul-mask').find('.nav-popup').addClass('animate-grow-blur-in')
    }

    /**
     * menampilkan popup untuk menu laporan
     */
    function tampilkan_popup_laporan() {
      $('#nav-laporan-mask').show()
      $('#nav-laporan-mask').find('.nav-popup').addClass('animate-grow-blur-in')
    }

    /**
     * fungsi untuk logout
     */
    function logout() {
      $.messager.confirm('Question', 'Anda Yakin Akan Keluar Dari Sistem ?', function(r) {
        if (r) {
          localStorage.clear();
          window.location = base_url;
        }
      });
    }

    /**
     * fungsi untuk kembali ke halaman pilih perusahaan
     */
    function halamanPilihPerusahaan() {
      $.messager.confirm('Question', 'Anda Yakin Akan Kembali ke Halaman Pilih Perusahaan ?', function(r) {
        if (r) {
          window.location = '{{ route('homepage.perusahaan') }}';
        }
      });
    }

    /**
     * menutup popup daftar menu/modul
     *
     * @param {string} animation
     */
    function tutup_popup_modul(animation) {
      if (animation == 'fade') {
        $('#nav-modul-mask').fadeOut(250)
        return
      }

      if (animation == 'no-animation') {
        $('#nav-modul-mask').hide()
        return
      }

      $('#nav-modul-mask').addClass('animate-grow-blur-out')

      setTimeout(function() {
        $('#nav-modul-mask').removeClass('animate-grow-blur-out')
        $('#nav-modul-mask').hide()
      }, 250)
    }

    function tutupTab() {
      var tab = $('#tab_menu').tabs('getSelected');
      var index = $('#tab_menu').tabs('getTabIndex', tab);
      $('#tab_menu').tabs('close', index);
    }

    /**
     * menutup popup laporan
     */
    function tutup_popup_laporan() {
      $('#nav-laporan-mask').addClass('animate-grow-blur-out')
      setTimeout(function() {
        $('#nav-laporan-mask').removeClass('animate-grow-blur-out')
        $('#nav-laporan-mask').hide()
      }, 250)

      // menampilkan menu utama lagi
      buka_menu_utama()
    }

    function check_tab_exist(namamenu, gambarmenu) {
      var tab_title = '<span class="' + gambarmenu + '"></span> ' + namamenu;
      if ($('#tab_menu').tabs('exists', tab_title)) {
        return true;
      } else {
        return false;
      }
    }

    function buka_submenu(e, namamenu, link, gambarmenu) {
      if (e != null && e != undefined) {
        e.preventDefault();
      }

      counter++;
      var tab_title = '<span class="' + gambarmenu + '"></span> ' + namamenu;
      var tab_name = namamenu + "_" + counter;

      // mengecek session dulu
      if ($('#tab_menu').tabs('exists', tab_title)) {
        $('#tab_menu').tabs('select', tab_title);
      } else {
        $('#tab_menu').tabs('add', {
          title: tab_title,
          id: counter,
          content: '<iframe class="tab_form" id="' + counter + '" name="' +
            tab_name + '" src="' + link + '" frameborder="0"></iframe>',
          closable: true
        });
      }
    }
    //MENU BARU
    $("body").on("click", ".shownow", function() {
      $(".notshow").removeClass("nohide");
      $(this)
        .closest(".main")
        .find(".notshow")
        .addClass("nohide")
        .toggle();
      $(".notshow").each(function() {
        if (!$(this).hasClass("nohide")) {
          //untuk melakukan hide pada popup lain ketika suatu menu ditekan
          $(this).hide();
        }
      });
    });
    $("#collapsible").click(function() {
      $(".arrowIcon").toggleClass("fa fa-caret-down fa fa-caret-up");
    });
    $(".linkSubmenu").click(function() {
      $(".notshow").removeClass("nohide");
      $(this)
        .closest(".main")
        .find(".notshow")
        .addClass("nohide")
        .toggle();
      $(".notshow").each(function() {
        if (!$(this).hasClass("nohide")) {
          //untuk melakukan hide pada popup lain ketika suatu menu ditekan
          $(this).hide();
        }
      });

    })


    $("body").on("click", ".shownow", function() {
      $(".notshows").removeClass("nohide");

      $(this)
        .closest(".main")
        .find(".notshows")
        .addClass("nohide")
        .toggle();



      $(".notshows").each(function() {
        if (!$(this).hasClass("nohide")) {
          //untuk melakukan hide pada popup lain ketika suatu menu ditekan
          $(this).hide();
        }
      });

    });
    $("body").on("click", ".shownowLaporan", function() {
      $(".notshowLaporan").removeClass("nohideLaporan");
      $(this)
        .closest(".mainLaporan")
        .find(".notshowLaporan")
        .addClass("nohideLaporan")
        .toggle();
      $(this).closest(".shownowLaporan").find(".arrowIcon").toggleClass("fa fa-caret-left fa fa-caret-up");
      $(".notshowLaporan").each(function() {
        if (!$(this).hasClass("nohideLaporan")) {
          //untuk melakukan hide pada popup lain ketika suatu menu ditekan
          $(this).hide();
        }
      });
    });

    $(".laporanSubItems").click(function() {
      $(".notshows").removeClass("nohide");
      $(this)
        .closest(".main")
        .find(".notshows")
        .addClass("nohide")
        .toggle();

      $(".laporanList").hide();

      $(".notshows").each(function() {
        if (!$(this).hasClass("nohide")) {
          //untuk melakukan hide pada popup lain ketika suatu menu ditekan
          $(this).hide();
        }
      });
    })

    function bukaMenu(namamenu, queryparameter) {
      const map = {
        'penjualan': {
          url: `{{ route('atena.penjualan.returpenjualan.form') }}?${queryparameter}`,
          namamenu: 'Penjualan'
        }
      }

      buka_submenu(null, map[namamenu].namamenu, map[namamenu].url, '');
    }
  </script>
  <!--Start of Tawk.to Script-->
  {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API || {}, Tawk_LoadStart = new Date();

        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/60caa6dc65b7290ac6365e9b/1f8bpnjrt';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> --}}
  <!--End of Tawk.to Script-->
  @stack('js')
</body>

</html>
