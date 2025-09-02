@extends('template.frame_header')

@push('title')
  Atena - Software Akuntansi Online Cloud Terbaik Di Indonesia
@endpush

@push('css')
  <link rel="icon" href="{{ asset('assets/images/icon.png') }}" />
  <link href="{{ asset('assets/css/auth/sweetalert2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nav-modul.css') }}" rel="stylesheet">
@endpush

@section('content')
  <div class="easyui-layout " fit="true">
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

    <div id="menu-wrapper" data-options="region:'center'">
      <div class="root">
        @php
          $daftarPerusahaan = session('LISTPERUSAHAAN');
        @endphp
        @foreach ($daftarPerusahaan as $perusahaan)
          <div class="card card-perusahaan"
            onclick="loginPerusahaan('{{ $perusahaan['uuid'] }}','{{ $perusahaan['namaperusahaan'] }}')">
            <div>
              <h4>{{ $perusahaan['namaperusahaan'] }}</h4>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div data-options="region:'center'" id="v_modul" style="display: none">

      <!-- EDIT PROFILE -->
      <form id="form_input_user" enctype="multipart/form-data" method="post" hidden>
        <input type="hidden" name="iduser_profile" id="IDUSER_PROFILE">
        <input type="hidden" name="gambaruser_profile" id="GAMBARUSER_PROFILE">

        <!-- DATA USER DARI QUERY -->
        <table style="padding:2px" border="0">
          <tr>
            <td align="right" id="label_form" style="width:100px">User ID</td>
            <td>
              <input name="userid_profile" id="USERID_PROFILE" style="width:150px" class="label_input"
                data-options="fontTransform:'normal',prompt:''">
            </td>
            <td>&nbsp;</td>
            <td rowspan="12" style="width:130px" valign="top" align="center">
              <div style="width:160px; height:160px; ">
                <img id="preview-image-profile" src=""
                  style="width:100%; height:100%; object-fit: cover; object-position: 50% 0%;" />
              </div>
              <input id="FILEGAMBAR_PROFILE" name="filegambar_profile" class="easyui-filebox"
                data-options="required:false,buttonIcon:'icon-man',buttonText:'Foto'" style="width:160px">
            </td>
          </tr>
          <tr>
            <td align="right" id="label_form">Nama User </td>
            <td><input name="username_profile" id="USERNAME_PROFILE" style="width:150px" class="label_input"
                validType='length[0,50]'></td>
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
                data-options="fontTransform:'normal'" validType='length[0,50]' style="width:150px" /> </td>
          </tr>
          <tr>
            <td align="right" id="label_form">Ulangi Password</td>
            <td><input name="re_pass_profile" id="RE_PASS_PROFILE" type="password" class="label_input"
                data-options="fontTransform:'normal'" validType="equals['[name=new_pass_profile]']"
                style="width:150px" /></td>
          </tr>
        </table>
        <div id="dlg-buttons-profile">
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
      </form>
    </div>

    <div data-options="region:'south',border:false"
      style="height:25px; background-color:#daeef5;padding:1px; vertical-align:bottom">
      <table width="100%" style="font-family:Verdana, Geneva, sans-serif;font-size:14px; font-weight:bold">
        <tr>
          <td width="50%" align="left">Developed by Alpha Raya Kreasi</td>
          <td align="right" style="padding-right:10px">
            <span>{{ date('Y-m-d') }}</span>
            <span id="label_jam"></span>
          </td>
        </tr>
      </table>
    </div>
    <div id="mm-user" class="easyui-menu" style="width:auto;">
      <div onclick="javascript:logout()">Logout</div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('assets/js/auth/sweetalert2.all.min.js') }}"></script>
  <script>
    $(function() {
      $('#mask-loader').fadeOut(500, function() {
        $(this).remove()
      })
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
    })

    function edit_profile() {
      $('#form_input_user').dialog('open').dialog('setTitle', 'Edit Profile');
      $('#USERID_PROFILE').textbox('setValue', "{{ session('DATAUSER')['uuid'] }}");
      $('#USERID_PROFILE').textbox('readonly', true);
      $('#USERNAME_PROFILE').textbox('setValue', "{{ session('DATAUSER')['username'] }}");
      $('#EMAIL_PROFILE').textbox('setValue', "{{ session('DATAUSER')['email'] }}");
      $('#NOHP_PROFILE').textbox('setValue', "{{ session('DATAUSER')['nohp'] }}");
      $('#GAMBARUSER_PROFILE').val("{{ session('DATAUSER')['gambar_url'] }}");
      $('#IDUSER_PROFILE').val("{{ session('DATAUSER')['uuid'] }}");

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

    function logout() {
      $.messager.confirm('Question', 'Anda Yakin Akan Keluar Dari Sistem ?', function(r) {
        if (r) {
          localStorage.clear();
          window.location = base_url;
        }
      });
    }

    async function loginPerusahaan(perusahaan, nama_perusahaan) {
      var token = "";
      var success = false;
      Swal.showLoading();
      $.ajax({
        type: 'POST',
        url: link_api.loginPerusahaan,
        data: {
          uuid_user: '{{ session('DATAUSER')['uuid'] }}',
          uuid_perusahaan: perusahaan
        },
        success: async function(response) {
          if (response.success) {
            success = true;
            token = response.data.token ?? "";
            dataSession = [{
                keySession: "TOKEN",
                valueSession: token,
              },
              {
                keySession: "IDPERUSAHAAN",
                valueSession: perusahaan,
              },
              {
                keySession: "NAMAPERUSAHAAN",
                valueSession: nama_perusahaan,
              },
              {
                keySession: "WARNA_STATUS_S",
                valueSession: '#66CC33',
              }, {
                keySession: "WARNA_STATUS_P",
                valueSession: '#FFCC00',
              }, {
                keySession: "WARNA_STATUS_D",
                valueSession: '#FF5959',
              }, {
                keySession: "WARNA_STATUS_R",
                valueSession: '#A1887F',
              }
            ];
            try {
              const urls = [
                link_api.getDetailPerusahaan,
                link_api.getConfigGlobal,
                link_api.getDaftarMenu,
              ];
              const promises = urls.map(url =>
                fetch(url, {
                  method: 'POST',
                  headers: {
                    authorization: `bearer ${token}`,
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({
                    "uuidperusahaan": perusahaan,
                  }),
                }).then(response => {
                  if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status} from ${url}`);
                  }
                  return response.json();
                })
              );
              const [responseDetail, responseGlobal, responseMenu] = await Promise.all(promises);
              //ambil detail perusahaan
              if (responseDetail.success) {
                dataSession.push({
                  keySession: "ALAMATPERUSAHAAN",
                  valueSession: responseDetail.data.alamat ?? "",
                });
                dataSession.push({
                  keySession: "KODEPERUSAHAAN",
                  valueSession: responseDetail.data.kodeperusahaan ?? "",
                });
                dataSession.push({
                  keySession: "PEMANGGIL",
                  valueSession: responseDetail.data.pemanggil ?? "",
                });
              } else {
                Swal.close();
                Swal.fire({
                  type: 'error',
                  text: responseDetail.message
                });
                return null;
              }
              //ambil config global
              if (responseGlobal.success) {
                var dataConfig = responseGlobal.data.config;
                dataSession.push({
                  keySession: "DECIMALDIGITQTY",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "DECIMALDIGITQTY").value) ?? ""
                })
                dataSession.push({
                  keySession: "DECIMALDIGITAMOUNT",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "DECIMALDIGITAMOUNT").value) ?? ""
                })
                dataSession.push({
                  keySession: "MULTICURRENCY",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "MULTICURRENCY").value) ?? ""
                })
                dataSession.push({
                  keySession: "SIMBOLCURRENCY",
                  valueSession: responseGlobal.simbol_currency ?? "",
                })
                dataSession.push({
                  keySession: "PPN",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "PPNPERSEN").value) ?? ""
                })
                dataSession.push({
                  keySession: "DEFAULTPAKAIPPN",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "DEFAULTPAKAIPPN").value) ?? ""
                })
                dataSession.push({
                  keySession: "PPH22",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "PPH22PERSEN").value) ?? ""
                })
                dataSession.push({
                  keySession: "TIMEOUT",
                  valueSession: 5000,
                })
                dataSession.push({
                  keySession: "CEKMINUS",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "CEKMINUS").value) ?? ""
                })
                dataSession.push({
                  keySession: "SHOWBARCODE",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "SHOWBARCODE").value) ?? ""
                })
                dataSession.push({
                  keySession: "SHOWPARTNUMBER",
                  valueSession: (dataConfig.find((conf) => conf.config ==
                    "SHOWPARTNUMBER").value) ?? ""
                })
              } else {
                Swal.close();
                Swal.fire({
                  type: 'error',
                  text: responseGlobal.message
                });
                return null;
              }
              //ambil list menu
              if (responseMenu.success) {
                dataSession.push({
                  keySession: "array_menu",
                  valueSession: responseMenu.data,
                })
              } else {
                Swal.close();
                Swal.fire({
                  type: 'error',
                  text: responseMenu.message
                });
                return null;
              }
              await saveSession(dataSession);
              Swal.close();
              Swal.fire({
                type: 'success',
                text: 'Login Berhasil',
              });
              window.location.replace("{{ url('home') }}");
            } catch (error) {
              Swal.close();
              console.error('Ada salah satu request yang gagal:', error);
              return null;
            }
          } else {
            Swal.close();
            Swal.fire({
              type: 'error',
              text: response.message
            });
          }
        }
      })
    }

    async function saveSession(dataSession) {
      await fetch("{{ route('save.session') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
          data: dataSession
        }),
      })
    }
  </script>
@endpush
