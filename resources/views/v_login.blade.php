<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" />
    <title>Atena - Software Akuntansi Online Cloud Terbaik Di Indonesia</title>

    <!-- page css -->
    <link href="{{ asset('assets/css/auth/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/auth/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        html {
            background-image: url('{{ asset('assets/images/imgbg.jpg') }}')
        }

        body {
            background-color: transparent;
        }
    </style>
</head>

<body class="skin-default card-no-border">

    {{-- Loader --}}
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">
                <img style="width: 50px;margin: 0 auto;display: block"
                    src="{{ asset('assets/images/logo_atena.png') }}">
            </p>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body p-5">
                    <form class="form-horizontal form-material" id="loginform">

                        <img style="width: 200px;margin: 0 auto;display: block"
                            src="{{ asset('assets/images/logo_atena.png') }}">

                        {{-- <p class="text-center" style="font-size: 15px;color: #111111">Aplikasi Usaha Optik Online</p> --}}
                        <br>
                        <h3 class="text-center m-b-20" style="font-weight:bold; font-size:14pt;">Selamat Datang Kembali
                        </h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="email" required placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="password" required
                                    placeholder="Kata Sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="ml-auto">
                                        <a onclick="bukaModalLupaKataSandi()" href="javascript:void(0)" id="to-recover"
                                            class="text-muted">Lupa kata sandi?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info" type="submit">Masuk</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Belum punya akun? <a href="#" onclick="bukaModalPendaftaran()"
                                    class="text-info m-l-5"><b>Daftar</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="lupakatasandi-container" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lupa Kata Sandi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="font-weight-bold">Masukkan email anda</label>
                    <input class="form-control mb-3" id="email_user">

                    <p class="alert alert-warning">
                        <b>Anda akan menerima email untuk melakukan reset kata sandi.</b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button href="#" class="btn btn-success" onclick="kirimEmailResetPassword()">
                        Kirim
                    </button>

                    <button href="#" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="signup-container" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="font-weight-bold">Email</label>
                    <input class="form-control mb-3" id="email_signup">

                    <label class="font-weight-bold">Nama</label>
                    <input class="form-control mb-3" id="nama_signup">

                    <label class="font-weight-bold">No. HP</label>
                    <input class="form-control mb-3" id="hp_signup">

                    <label class="font-weight-bold">Password</label>
                    <input class="form-control mb-3" name="password_signup" id="password_signup" type="password">

                    <label class="font-weight-bold">Konfirmasi kata sandi</label>
                    <input class="form-control mb-3" name="konfirmasi_password_signup"
                        id="konfirmasi_password_signup" type="password">

                    <p class="alert alert-warning">
                        <b>Anda akan menerima email untuk melakukan verifikasi.</b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button href="#" class="btn btn-success" onclick="signUp()">
                        Daftar
                    </button>

                    <button href="#" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/js/auth/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('assets/js/auth/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/globalvariable.js') }}"></script>
    <script>
        var csrf_token = '{{ csrf_token() }}';
        var base_url = '{{ url('') }}/';
    </script>
    <script type="text/javascript">
        // mengeset header untuk ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        $(function() {
            $(".preloader").fadeOut();

            checkReferer();
        });

        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#loginform').submit(function(e) {
            e.preventDefault();

            login();
        })

        $('#loginform button[type="submit"]').click(function(e) {
            e.preventDefault();

            login();
        });

        async function login() {
            var dataUser;
            var dataPerusahaan = [];
            Swal.showLoading();
            var isLoginSuccess = false;
            try {
                await $.ajax({
                    type: 'POST',
                    url: link_api.login,
                    async: false,
                    data: {
                        credential: $('#email').val(),
                        password: $('#password').val(),
                        program: "ATENA"
                    },
                    success: function(response) {
                        if (response.success) {
                            isLoginSuccess = true;
                            console.log(response.data);
                            dataUser = response.data.user;
                            dataPerusahaan = response.data.daftar_perusahaan;
                            console.log(dataUser);
                        } else {
                            isLoginSuccess = false;
                            Swal.close();
                            Swal.fire({
                                type: 'error',
                                text: response.message
                            })
                            return null;
                        }
                    }
                });
            } catch (error) {
                isLoginSuccess = false;
                console.log(error.message, error.name)
                Swal.close();
                Swal.fire({
                    type: 'error',
                    text: 'Terjadi kesalahan, silahkan coba lagi',
                })
                return null;
            } finally {
                if (!isLoginSuccess) {
                    return null;
                }
                var dataSession = [{
                        keySession: "DATAUSER",
                        valueSession: dataUser,
                    },
                    {
                        keySession: "LISTPERUSAHAAN",
                        valueSession: dataPerusahaan
                    }
                ];
                console.log(dataSession);
                if (dataPerusahaan.length > 0) {
                    // dataSession.push({
                    //     keySession: "DATAPERUSAHAAN",
                    //     valueSession: dataUser,
                    // });
                    // dataSession.push({
                    //     keySession: "IDPERUSAHAAN",
                    //     valueSession: dataPerusahaan[0].uuid,
                    // })
                    // dataSession.push({
                    //     keySession: "NAMAPERUSAHAAN",
                    //     valueSession: dataPerusahaan[0].namaperusahaan,
                    // })
                }
                await saveSession(dataSession);
                console.log(dataSession);
                if (dataPerusahaan.length==1) {
                    var token = "";
                    var success = false;
                    try {
                        await $.ajax({
                            type: 'POST',
                            url: link_api.loginPerusahaan,
                            async: false,
                            data: {
                                uuid_user: dataUser.uuid,
                                uuid_perusahaan: dataPerusahaan[0].uuid,
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    success = true;
                                    token = response.data.token ?? "";
                                } else {
                                    success = false;
                                    Swal.close();
                                    Swal.fire({
                                        type: 'error',
                                        text: response.message
                                    });
                                    return null;
                                }
                            }
                        });
                    } catch (error) {
                        success = false;
                        Swal.close();
                        Swal.fire({
                            type: 'error',
                            text: error,
                        })
                        return null;
                    } finally {
                        if (!success) {
                            return null;
                        }
                        dataSession = [{
                            keySession: "TOKEN",
                            valueSession: token,
                        },
                        {
                            keySession: "IDPERUSAHAAN",
                            valueSession: dataPerusahaan[0].uuid,
                        },
                        {
                            keySession: "NAMAPERUSAHAAN",
                            valueSession: dataPerusahaan[0].namaperusahaan,
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
                        }];
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
                                        "uuidperusahaan": dataPerusahaan[0].uuid,
                                    }),
                                    // data: {
                                    //     "uuidperusahaan": dataPerusahaan[0].uuid,
                                    // }
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
                                dataSession.push({
                                    keySession: "NAMAPERUSAHAAN",
                                    valueSession: responseDetail.data.namaperusahaan ?? "",
                                });
                                dataSession.push({
                                    keySession: "NAMAPERUSAHAAN",
                                    valueSession: responseDetail.data.namaperusahaan ?? "",
                                });
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
                                for(var i=0;i<dataConfig.length;i++){
                                  var conf=dataConfig[i];
                                    dataSession.push({
                                    keySession: conf.config,
                                    valueSession: conf.value??"",
                                })
                                }
                                dataSession.push({
                                    keySession: "TIMEOUT",
                                    valueSession: 5000,
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
                    }
                }else if(dataPerusahaan.length>1){
                    //go to pilih perusahaan page
                    window.location.replace("{{ url('hompage-perusahaan') }}");
                } else {
                    Swal.close();
                }
            }

        }

        async function saveSession(dataSession) {
            // await $.ajax({
            //     type: 'POST',
            //     url: "{{ route('save.session') }}",
            //     async: false,
            //     data: {
            //         data: dataSession
            //     }
            // })
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

        function signUp() {
            var email = $('#email_signup').val();
            var emailValid = validateEmail(email);
            var nama = $('#nama_signup').val();
            var hp = $('#hp_signup').val();

            if (!emailValid) {
                return false;
            }

            // mengirim request untuk kirim email reset password
            // $.ajax({
            //     type: 'POST',
            //     url: '',
            //     data: {
            //         email: email,
            //         username: nama,
            //         hp: hp,
            //         password: $('#password_signup').val(),
            //         konfirmasi_password: $('#konfirmasi_password_signup').val(),
            //     },
            //     beforeSend: function(xhr) {
            //         Swal.fire({
            //             timerProgressBar: false,
            //             allowOutsideClick: false,
            //             onBeforeOpen: () => {
            //                 Swal.showLoading();
            //             }
            //         });
            //     },
            //     success: function(response) {
            //         Swal.close();

            //         $('#email_signup').val('');
            //         $('#password_signup').val('');
            //         $('#nama_signup').val('');
            //         $('#hp_signup').val('');
            //         $('#konfirmasi_password_signup').val('');

            //         if (response.success) {
            //             Swal.fire({
            //                 type: 'success',
            //                 title: 'Berhasil',
            //                 text: 'Harap cek email anda untuk melakukan verifikasi'
            //             })
            //         } else {
            //             Swal.fire({
            //                 type: 'error',
            //                 text: response.errorMsg
            //             });
            //         }
            //     }
            // })
        }

        function validateEmail(email) {
            // regex untuk mengecek pola email
            var regex = /\S+@\S+\.\S+/;

            // memastikan email di inputkan dan tidak kosong
            if (email == '') {
                Swal.fire({
                    type: 'error',
                    text: 'Email tidak boleh kosong !'
                });

                return false;
            }

            // memastikan format email yang dimasukkan benar
            if (!regex.test(email)) {
                Swal.fire({
                    type: 'error',
                    text: 'Email tidak boleh kosong !'
                });

                $.messager.alert('Error', 'Format email yang anda masukkan salah !', 'error')

                return false;
            }

            return true;
        }

        // mengirim email untuk reset password
        function kirimEmailResetPassword() {
            var email = $('#email_user').val();
            var emailValid = validateEmail(email);

            if (!emailValid) {
                return false;
            }

            // mengirim request untuk kirim email reset password
            // $.ajax({
            //     type: 'POST',
            //     url: '',
            //     data: {
            //         email: email
            //     },
            //     beforeSend: function(xhr) {
            //         Swal.fire({
            //             timerProgressBar: false,
            //             allowOutsideClick: false,
            //             onBeforeOpen: () => {
            //                 Swal.showLoading();
            //             }
            //         })
            //     },
            //     success: function(response) {
            //         Swal.close();

            //         $('#email_user').val('')

            //         if (response.success) {
            //             window.location.replace(base_url + 'emailResetPasswordTerkirim/' + response.token);
            //         } else {
            //             Swal.fire({
            //                 type: 'error',
            //                 text: response.errorMsg
            //             });
            //         }
            //     }
            // })
        }

        function checkReferer() {
            var urlParams = new URLSearchParams(window.location.search);

            if (!urlParams.has('referer')) {
                return false;
            }

            if (urlParams.get('referer') == '') {
                return false;
            }

            if (urlParams.get('referer') == 'signup') {
                bukaModalPendaftaran();
            }
        }

        function bukaModalLupaKataSandi() {
            $('#lupakatasandi-container').modal('show');
        }

        function bukaModalPendaftaran() {
            $('#signup-container').modal('show');
        }
    </script>

</body>

</html>
