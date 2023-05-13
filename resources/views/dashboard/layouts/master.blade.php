<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard/assets') }}/">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Ezqariq')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />




    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/pages/cards-advance.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/quill/editor.css') }}" />

    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('dashboard/assets/vendor/js/template-customizer.js') }}"></script>
    <!-- Config: Mandatory theme config file contains global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <style>
        th[colspan="4"] {
            text-align: center;
        }

        th[colspan="3"] {
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('dashboard.layouts.sidenav')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('dashboard.layouts.topnav')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        <!-- / Content -->
                    </div>
                    <!-- Footer -->
                    @include('dashboard.layouts.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app-user-list.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/forms-editors.js') }}"></script>
    @include('dashboard.layouts.data_table')
    @stack('scripts')

<script>
    function confirmDelete(item) {
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    item = item.id;
                    var path = $("#" + item).attr("data-delete-path");
                    var column = $("#" + item).attr("data-column");
                    var datadeleteId = $("#" + item).attr("data-delete");
                    deleteData(path, datadeleteId, column);
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
    }

    function deleteData(path, datadeleteId, column) {
        $.ajax({
            url:  path,
            type: "POST",
            data: {
                column: column,
                datadeleteId: datadeleteId,

            },
            dataType: "html",
            success: function() {
                swal("Done!", "It was succesfully deleted!", "success");
                window.location.reload();
            },
            error: function(xhr, status, error) {
                var err = xhr.responseText;
                console.log(err);
            }
        });
    }

    function confirmStatus(item) {
        swal({
                title: "Are you sure?",
                text: "You want to update the status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    item = item.id;
                    var path = $("#" + item).attr("data-update-path");
                    var column = $("#" + item).attr("data-column");
                    var dataupdateId = $("#" + item).attr("data-update");
                    var table = $("#" + item).attr("data-table");
                    var currentStatus = $("#" + item).attr("data-status");
                    changeStatus(path, dataupdateId, column, table, currentStatus);
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
    }

    function changeStatus(path, dataupdateId, column, table, currentStatus) {
        $.ajax({
            url:  path,
            type: "POST",
            data: {
                column: column,
                dataupdateId: dataupdateId,
                table: table,
                currentStatus: currentStatus

            },
            dataType: "html",
            success: function() {
                swal("Done!", "It was succesfully deleted!", "success");
                window.location.reload();
            },
            error: function(xhr, status, error) {
                var err = xhr.responseText;
                console.log(err);
            }
        });
    }
    </script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>


</body>

</html>
