<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tabTitle }} - {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- select2 -->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!-- solaimanlipi font -->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'SolaimanLipi', Arial, sans-serif !important;
        }
        
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <x-auth_preloader />

        @include('admin.layouts.navbar')

        @include('admin.layouts.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    {{ $header }}
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ route('admin.home') }}">{{ config('app.name') }}</a>.</strong>
            All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <!-- sweet alert -->
    <script src="{{ asset('assets/dist/js/sweetalert.min.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        // bootstrap tooltips init
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // session message
        @if (Session::has('message') AND Session::has('alert-type'))
            swal({
                title: "",
                text: "{{ Session::get('message') }}",
                icon: "{{ Session::get('alert-type') }}",
            });
        @endif

        // add new case type form
        $(document).on('submit', "#add_new_case_type_form", function(e) {
            e.preventDefault();
            let link = `{{ url('/') }}/case-types/${$("#case_type").val()}/all-cases/create`;
            window.location.href = link;
        });

        //return confirm message**********
        $(document).on("click", "#confirm", function(e){
            e.preventDefault();
            let link = $(this).attr("href");
            swal({
                title: "",
                text: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then(confirm => {
                if (confirm) {
                    $("#confirm_form").attr("action", link);
                    $('#confirm_form').submit();

                    /*
                     Only for get method, redirect to link
                     window.location.href = link;
                     */

                } else {
                    swal("Canceled.", {
                        icon: "success",
                    });
                }
            });
        });

        $(function () {
            $("#data_table").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });

        // add input field
        function add_input(name_field_value) {
            let new_input = `<div class="input-group mb-2">
                            <input type="text" name="${name_field_value}" class="form-control" required>
                            <div onclick="delete_input(this)" class="input-group-append">
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>`
            $("#new_input").append(new_input)
        }

        // delete input
        function delete_input(this_element) {
            $(this_element).parent().remove()
        }

        // select2 global
        $('.select2_global').select2({
            width: 'resolve'
        });

        // get zilas by division_id
        $("#division_id").change(function() {
            let division_id = $(this).val()
            $("#zila_id").empty()

            $.get(`{{ url('/') }}/json_response/division/${division_id}/zilas`)
            .done(function( data ) {
                $("#zila_id").append(`<option value="" disabled selected> জেলা নির্বাচন করুন </option>`)
                $.each(data.zilas, function(key, zila) {
                    $("#zila_id").append(`<option value="${zila.id}"> ${zila.name} </option>`);
                })
            })
        })

        // get pourashavas by zila_id
        $("#zila_id").change(function() {
            let zila_id = $(this).val()
            $("#pourashava_id").empty()

            $.get(`{{ url('/') }}/json_response/zila/${zila_id}/pourashavas`)
            .done(function( data ) {
                $("#pourashava_id").append(`<option value="" disabled selected> পৌরসভা নির্বাচন করুন </option>`)
                $.each(data.pourashavas, function(key, pourashava) {
                    $("#pourashava_id").append(`<option value="${pourashava.id}"> ${pourashava.name} </option>`);
                })
            })
        })


        // get village by ward_id
        $("#ward_id").change(function() {
            let ward_id = $(this).val()
        
            $("#village_id").empty()

            $.get(`{{ url('/') }}/json_response/ward/${ward_id}/villages`)
            .done(function( data ) {
                $("#village_id").append(`<option value="" disabled selected> ওয়ার্ড নং নির্বাচন করুন </option>`)
                $.each(data.villages, function(key, village) {
                    $("#village_id").append(`<option value="${village.id}"> ${village.name} </option>`);
                })
            })
        })

          // get business_types by ownnership_id
       $("#ownership_type_id").change(function() {
                let ownership_type_id = $(this).val()
               
                $("#business_type_id").empty()
                $.get(`{{ url('/') }}/json_response/ownership/${ownership_type_id}/business_types`)
                .done(function( data ) {
                    $("#business_type_id").append(`<option value="" disabled selected> ব্যবসার ধরণ নির্বাচন করুন </option>`)
                    $.each(data.business_types, function(key, business_type) {
                        $("#business_type_id").append(`<option value="${business_type.id}"> ${business_type.name} </option>`);
                    })
                })
            })
           
           
            // get capital Ranges by business_type_id
            $("#business_type_id").change(function() {
                let business_type_id = $(this).val()
               
               
                $("#capital_range_id").empty()
                $.get(`{{ url('/') }}/json_response/business_type/${business_type_id}/capital_ranges`)
                .done(function( data ) {
                    $("#capital_range_id").append(`<option value="" disabled selected> নির্বাচন করুন </option>`)
                    $.each(data.capital_ranges, function(key, capital_range) {
                        $("#capital_range_id").append(`<option value="${capital_range.id}"> ${capital_range.capital_range} </option>`);
                    })
                })
            })

            // get Licence Fee Details by capital_range_id
            $("#capital_range_id").change(function() {
                let capital_range_id = $(this).val()
        
                $.get(`{{ url('/') }}/json_response/capital_range/${capital_range_id}/capital_range`)
                .done(function( data ) {
                   console.log(data.capital_range.signboard_tax)
                   let  licence_fee = parseInt(data.capital_range.licence_fee);
                   let  signboard_tax =  parseInt(data.capital_range.signboard_tax);
                   let  service_charge =  parseInt(data.capital_range.service_charge);

                    $("#licence_fee").val(licence_fee);
                    $("#singboard_tax").val(signboard_tax);
                    $("#service_charge").val(service_charge);
                    let vat = Math.round(.15 * licence_fee);
                    $("#vat").val(vat);

                    console.log(licence_fee);
                    console.log(signboard_tax);
                    console.log(service_charge);
                    console.log(vat);
                    let total_amount = licence_fee + signboard_tax + service_charge + vat;
                
                    $("#total_amount").val(total_amount);
                })
            })
    </script>

    @stack('scripts')

</body>
</html>