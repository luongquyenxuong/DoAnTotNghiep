<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TeaHouse </title>
    <!-- plugins:css -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}

    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    {{-- <link href="{{ asset('assets/css/icons.min.css') }} " rel="stylesheet" type="text/css"> --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/js/select.dataTables.min.css') }}">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}

    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>

            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text"> <span
                                class="text-black fw-bold">{{ Auth::user()->full_name }}</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if (Auth::user()->avatar == null)
                                <img class="img-xs rounded-circle" src="{{ asset('assets/images/user.png') }}"
                                    alt="Profile image">
                            @else
                                <img class="img-xs rounded-circle" src="/storage/{{ Auth::user()->avatar }}"
                                    alt="Profile image">
                            @endif
                        </a>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                @if (Auth::user()->avatar == null)
                                    <img class="img-xs rounded-circle" src="{{ asset('assets/images/user.png') }}"
                                        alt="Profile image">
                                @else
                                    <img class="img-xs rounded-circle" src="/storage/{{ Auth::user()->avatar }}"
                                        alt="Profile image"> </a>
                                @endif
                                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->full_name }}</p>
                                <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                                <span class="badge badge-pill badge-danger"></span></a>

                            <a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            {{-- <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>

                </div>
            </div> --}}

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi mdi-chart-line menu-icon"></i>
                            <span class="menu-title">Thống kê</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="mdi mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Người dùng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('address.index') }}">
                            <i class="mdi mdi-map-marker menu-icon"></i>
                            <span class="menu-title">Địa chỉ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">
                            <i class="mdi mdi mdi-food menu-icon"></i>
                            <span class="menu-title">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="mdi mdi-shape menu-icon"></i>
                            <span class="menu-title">Danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topping.index') }}">
                            <i class="mdi mdi mdi-food-fork-drink menu-icon"></i>
                            <span class="menu-title">Topping</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('size.index') }}">
                            <i class="mdi mdi mdi-cup menu-icon"></i>
                            <span class="menu-title">Kích cỡ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bill.index') }}">
                            <i class="mdi mdi mdi-receipt menu-icon"></i>
                            <span class="menu-title">Hóa đơn</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements"
                            aria-expanded="false" aria-controls="form-elements">
                            <i class="mdi mdi mdi-receipt menu-icon"></i>
                            <span class="menu-title">Hóa đơn</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements" style="">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bill.index') }}">Tất cả</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bill.confirming') }}">Chờ xác nhận</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bill.delivering') }}">Đang giao</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bill.complete') }}">Đã giao</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('bill.cancel') }}">Đã hủy</a></li>
                            </ul>
                        </div>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi mdi-square-inc-cash menu-icon"></i>
                            <span class="menu-title">Khuyến mãi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi mdi-table-large menu-icon"></i>
                            <span class="menu-title">Bàn</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi mdi-newspaper menu-icon"></i>
                            <span class="menu-title">Bài viết</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi mdi-image-filter menu-icon"></i>
                            <span class="menu-title">Banner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Đặt bàn</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">UI Elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/dropdowns.html">Dropdowns</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li> --}}


                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Đăng xuất </a></li> --}}

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                            BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script> --}}s
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/misc.js') }}"></script> --}}
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- <script src="{{ asset('assets/js/file-upload.js') }}"></script> --}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#hinhanh').attr('src', e.target.result).width(150).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        // $('#exampleModal').on('hidden.bs.modal', function() {
        //     location.reload();
        // });
    </script>
    @if (Session::has('deleted'))
        <script>
            swal("Xóa thành công!", {
                icon: "success",
            });
        </script>
    @endif
    <script>
        $('.delete').submit(function(e) {
            e.preventDefault();

            swal({
                    title: "Bạn có chắc muốn xóa?",
                    icon: "warning",
                    buttons: ["Hủy", true],
                    dangerMode: true,

                })
                .then((willDelete) => {
                    if (willDelete) {
                        this.submit();
                    }
                });
        });
    </script>
    @if (Session::has('update'))
        {{-- @section('scripts') --}}
        <script>
            swal({
                title: "Cập nhật thánh công!!!",
                icon: "success",
                button: "Ok",
            });
        </script>
        {{-- @endsection --}}
    @endif

    @if (Session::has('add'))
        {{-- @section('scripts') --}}
        <script>
            swal({
                title: "Thêm thành công!!!",
                icon: "success",
                button: "Ok",
            });
        </script>
        {{-- @endsection --}}
    @endif
    @if (Session::has('restored'))
        <script>
            swal("Khôi phục thành công!", {
                icon: "success",
            });
        </script>
    @endif
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
    <!-- End custom js for this page-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
