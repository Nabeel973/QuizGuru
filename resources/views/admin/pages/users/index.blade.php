@extends('admin.layouts.app')



@section('content')

    <h1>Users Lists </h1>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <table class="table table-bordered datatable" id="datatable" style="z-index: 3;">
                                <thead>
                                <tr class="bg-primary white">
                                    <th class="border-primary border-darken-1">S No.</th>
                                    <th class="border-primary border-darken-1">City Name</th>
                                    <th class="border-primary border-darken-1">Route Code</th>
                                    <th class="border-primary border-darken-1">Rider Name</th>
                                    <th class="border-primary border-darken-1">Start Point</th>
                                    <th class="border-primary border-darken-1">End Point</th>
                                    <th class="border-primary border-darken-1"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">


    <style type="text/css">
        table.dataTable {
            font-size: 12px;
        }
        #view_address_info{
            text-align: center;
        }

        table.dataTable .dataTables_info{
            text-align: center;
        }
        textarea#junction {
            resize: none;
        }

        table.dataTable thead tr th {
            padding-left: 0.5em;
            white-space: normal;
            word-wrap: break-word;
        }

        table.dataTable thead tr th:before,
        table.dataTable thead tr th:after {
            height: 20px;
            margin-bottom: -10px;
            bottom: 50% !important;
        }

        table.dataTable tbody tr td {
            padding-left: 0.5em;
            padding-right: 0.5em;
        }

        table.dataTable tbody tr td.select-checkbox:before {
            top: 50%;
            border-color: #64a0d2;
        }

        table.dataTable tbody tr.selected td.select-checkbox:after {
            top: 50%;
            text-shadow: none;
        }

        .btn-group .dropdown-menu .dropdown-item {
            white-space: normal;
        }

        #toast-bottom-center.toast-container {
            text-align: center;
        }

        #toast-bottom-center.toast-container .toast {
            display: table;
            width: auto !important;
            text-align: left;
        }
    </style>
@endsection


@section('custome_scripts')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/datatable_buttons.js')}}" type="text/javascript"></script>
    <script type="text/javascript">

        {{--$(document).ready(function() {--}}

        {{--    jQuery.fn.DataTable.Api.register( 'buttons.exportData()', function ( options ) {--}}
        {{--        if ( this.context.length ) {--}}
        {{--            body = [];--}}
        {{--            var params = table.ajax.params();--}}
        {{--            params.start = 0;--}}
        {{--            params.length = -1;--}}
        {{--            var jsonResult = $.ajax({--}}
        {{--                url: '{{ route('users.list') }}',--}}
        {{--                data: params,--}}
        {{--                success: function (result) {--}}
        {{--                    head = [];--}}
        {{--                    head.push('S.No');--}}
        {{--                    head.push('City Name');--}}
        {{--                    head.push('Route Code');--}}
        {{--                    head.push('Rider Name');--}}
        {{--                    head.push('Start Point');--}}
        {{--                    head.push('End Point');--}}
        {{--                    head.push('Junction');--}}
        {{--                    head.push('Added Date/Time');--}}
        {{--                    head.push('Status');--}}
        {{--                    /* head.push('Route Type');*/--}}


        {{--                    $.each(result.data, function(index, values) {--}}
        {{--                        row = [];--}}

        {{--                        row.push(index + 1);--}}
        {{--                        row.push(values.city);--}}
        {{--                        row.push(values.code);--}}
        {{--                        row.push(values.rider);--}}
        {{--                        row.push(values.start);--}}
        {{--                        row.push(values.end);--}}
        {{--                        row.push(values.junction);--}}
        {{--                        row.push(values.created_at);--}}
        {{--                        row.push(values.status);--}}
        {{--                        /* row.push(values.route_type);*/--}}

        {{--                        body.push(row);--}}
        {{--                    });--}}
        {{--                },--}}
        {{--                async: false--}}
        {{--            });--}}

        {{--            return {body: body, header: head};--}}
        {{--        }--}}
        {{--    } );--}}
        {{--    var table =  $('#datatable').DataTable({--}}
        {{--        dom: '<"d-inline-block"l><"pull-right"B>tipr',--}}
        {{--        @if (session('role_id') == 1 || in_array(93, session('permissions')))--}}

        {{--        buttons: [{--}}
        {{--            text: 'Add Route',--}}
        {{--            className: 'btn btn-primary',--}}
        {{--            enabled: true,--}}
        {{--            action: function (e, dt, node, config) {--}}
        {{--                $('#add_route').modal('show');--}}

        {{--            }--}}

        {{--        },--}}
        {{--            {--}}
        {{--                extend: 'excel',--}}
        {{--                title: 'Pickup Route',--}}
        {{--                className: 'btn btn-primary',--}}
        {{--                text: '<i class="la la-file-excel-o"></i> Excel',--}}
        {{--            },'reset'],--}}
        {{--        @else--}}
        {{--        buttons: [{--}}
        {{--            extend: 'excel',--}}
        {{--            title: 'Pickup Routes',--}}
        {{--            className: 'btn btn-primary',--}}
        {{--            text: '<i class="la la-file-excel-o"></i> Excel',--}}
        {{--        },'reset'],--}}
        {{--        @endif--}}
        {{--        scrollX: true, scrollY: '500px',--}}
        {{--        lengthMenu: [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, 'All']],--}}
        {{--        pageLength: 50,--}}
        {{--        pagingType: 'full_numbers',--}}
        {{--        processing: true,--}}
        {{--        language: {--}}
        {{--            processing: data_table_loader--}}
        {{--        },--}}
        {{--        serverSide: true,--}}
        {{--        ajax: '{{ route('users.list') }}',--}}
        {{--        rowId: 'id',--}}
        {{--        order: [[7, 'desc']],--}}
        {{--        columns: [--}}
        {{--            //{data: 'id', orderable: false, searchable: false, class: 'text-center align-middle select p-1', targets: 0, render: function (data, type, row) {return '';}},--}}
        {{--            {data: 'id',orderable: false, searchable: false, name: 'align-middle serial_number', class: 'align-middle serial_number', targets: 0, render: function (data, type, row) {return '';}},--}}
        {{--            {data: 'city', name: 'cities.name', class: 'align-middle city'},--}}
        {{--            {data: 'code', name: 'routes.code', class: 'align-middle code'},--}}
        {{--            {data: 'rider', name: 'riders.name', class: 'align-middle rider'},--}}
        {{--            {data: 'start', name: 'routes.start', class: 'align-middle start'},--}}
        {{--            {data: 'end', name: 'routes.end', class: 'align-middle end'},--}}
        {{--            {data: 'junction', name: 'routes.junction', class: 'align-middle junction'},--}}
        {{--            {data: 'created_at', name: 'created_at', class: 'align-middle created_at'},--}}
        {{--            {data: 'status', name: 'routes.status', class: 'align-middle status'},--}}
        {{--            /*  {data: 'route_type', name: 'rt.id', class: 'align-middle route_type'},*/--}}
        {{--            {data: 'action', name: 'action', class: 'align-middle action text-center', orderable: false, searchable: false}--}}
        {{--        ],--}}
        {{--        rowCallback: function(row, data, index) {--}}
        {{--            var info = table.page.info();--}}

        {{--            $('td:eq(0)', row).html(index + 1 + info.page * info.length);--}}

        {{--        },--}}
        {{--        initComplete: function() {--}}
        {{--            var search = $('<tr role="row" class="bg-primary bg-lighten-1 search"></tr>').appendTo(this.api().table().header());--}}

        {{--            var td = '<td style="padding:5px;" class="border-primary border-lighten-2"><fieldset class="form-group m-0 position-relative has-icon-right"></fieldset></td>';--}}
        {{--            var input = '<input type="text" class="form-control form-control-sm input-sm primary">';--}}
        {{--            var icon = '<div class="form-control-position primary"><i class="la la-search"></i></div>';--}}
        {{--            var status_select = '<select name="status_select" id="status_select" class="select2 form-control">' +--}}
        {{--                '<option value="0">Inactive</option>' +--}}
        {{--                '<option value="1">Active</option>' +--}}
        {{--                '</select>';--}}
        {{--            var route_type = '<select name="route_type" id="route_type" class="select2 form-control">' +--}}
        {{--                '<option value="1">Pickup</option>' +--}}
        {{--                '<option value="2">Delivery</option>' +--}}
        {{--                '</select>';--}}
        {{--            this.api().columns().every(function(column_id) {--}}
        {{--                var column = this;--}}
        {{--                var header = column.header();--}}

        {{--                if ($(header).is('.serial_number') || $(header).is('.action')) {--}}
        {{--                    $(td).appendTo($(search));--}}
        {{--                }else if($(header).is('.status')){--}}
        {{--                    $(status_select).appendTo($(search))--}}
        {{--                        .on( 'change', function () {--}}
        {{--                            column.search($(this).val(), false, false, true).draw();--}}
        {{--                        } ).wrap(td);--}}
        {{--                }else if($(header).is('.route_type')){--}}
        {{--                    $(route_type).appendTo($(search))--}}
        {{--                        .on( 'change', function () {--}}
        {{--                            column.search($(this).val(), false, false, true).draw();--}}
        {{--                        } ).wrap(td);--}}
        {{--                }--}}
        {{--                else {--}}
        {{--                    var current = $(input).appendTo($(search)).on('change', function() {--}}
        {{--                        column.search($(this).val(), false, false, true).draw();--}}
        {{--                    }).wrap(td).after(icon);--}}

        {{--                    if (column.search()) {--}}
        {{--                        current.val(column.search());--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            });--}}
        {{--            // $("#status_select").prepend('<option value="" selected></option>').select2({--}}
        {{--            //     placeholder: "Select Status",--}}
        {{--            //     width:'100%',--}}
        {{--            //     containerCssClass: 'select-xs',--}}
        {{--            //     dropdownCssClass: 'form-control-sm p-0'--}}
        {{--            // });--}}
        {{--            //--}}
        {{--            // this.api().table().columns.adjust();--}}
        {{--        }--}}
        {{--    });--}}


        {{--    --}}{{--$('#datatable tbody').on('click', 'tr td.action .btn-group .dropdown-menu .dropdown-item', function() {--}}
        {{--    --}}{{--    var route_id = table.row( $(this).parents('tr') ).data().id;--}}
        {{--    --}}{{--    if ($(this).hasClass('update_route')) {--}}
        {{--    --}}{{--        $.ajax({--}}
        {{--    --}}{{--            url: '{!! route('admin.v2_pickups.pickup_route.edit_ajax') !!}',--}}
        {{--    --}}{{--            method: 'POST',--}}
        {{--    --}}{{--            data: {--}}
        {{--    --}}{{--                '_token': '{{ csrf_token() }}',--}}
        {{--    --}}{{--                'route_id': route_id--}}
        {{--    --}}{{--            }--}}
        {{--    --}}{{--        }).done(function(data){--}}

        {{--    --}}{{--            if(data.details.length != 0 ){--}}
        {{--    --}}{{--                /*$.each(data.details, function(index, value) {*/--}}
        {{--    --}}{{--                var city_id = data.details.city_id;--}}
        {{--    --}}{{--                var route_code = data.details.code;--}}
        {{--    --}}{{--                var start = data.details.start;--}}
        {{--    --}}{{--                var end = data.details.end;--}}
        {{--    --}}{{--                var rider_id = data.details.rider_id;--}}
        {{--    --}}{{--                var junctions = data.details.junctions;--}}

        {{--    --}}{{--                $('#city_id').val(city_id).trigger('change');--}}
        {{--    --}}{{--                $('#route_code').val(route_code);--}}
        {{--    --}}{{--                $('#start').val(start);--}}
        {{--    --}}{{--                $('#end').val(end);--}}
        {{--    --}}{{--                $('#rider_id').val(rider_id).trigger('change');--}}
        {{--    --}}{{--                $('#junstion_edit').val(junctions);--}}
        {{--    --}}{{--                //});--}}
        {{--    --}}{{--                $('#edit_route_modal').modal('show');--}}
        {{--    --}}{{--                var route = '{!! route('admin.management.route.edit', ':id') !!}';--}}
        {{--    --}}{{--                route = route.replace(':id', route_id);--}}
        {{--    --}}{{--                $("#editRouteForm").attr('action', route);--}}

        {{--    --}}{{--            }--}}

        {{--    --}}{{--        });--}}

        {{--    --}}{{--    }--}}
        {{--    --}}{{--});--}}

        {{--    --}}{{--$('#datatable tbody').on('click', 'tr td.action .btn-group .dropdown-menu  .dropdown-item', function() {--}}

        {{--    --}}{{--    if ($(this).hasClass('view_location')) {--}}
        {{--    --}}{{--        var route_id = table.row( $(this).parents('tr') ).data().id;--}}

        {{--    --}}{{--        $.ajax({--}}
        {{--    --}}{{--            url: '{!! route('admin.management.route.assign_locations_view') !!}',--}}
        {{--    --}}{{--            method: 'POST',--}}
        {{--    --}}{{--            data: {--}}
        {{--    --}}{{--                '_token': '{{ csrf_token() }}',--}}
        {{--    --}}{{--                'route_id': route_id--}}
        {{--    --}}{{--            }--}}
        {{--    --}}{{--        }).done(function(data){--}}
        {{--    --}}{{--            if(data.locations.length != 0){--}}

        {{--    --}}{{--                var html = '';--}}
        {{--    --}}{{--                html += '<table class="table table-sm datatable text-center">';--}}
        {{--    --}}{{--                html += '<thead><tr><th>S No.</th><th><strong>Addresses</strong></th></tr></thead>';--}}
        {{--    --}}{{--                html += '<tbody>';--}}
        {{--    --}}{{--                $.each(data.locations, function(index, value) {--}}
        {{--    --}}{{--                    var ind = index+1;--}}
        {{--    --}}{{--                    html += '<tr class=""><td>' + ind + '</td>';--}}
        {{--    --}}{{--                    html += '<td>' + value + '</td>';--}}
        {{--    --}}{{--                });--}}
        {{--    --}}{{--                html += '</tbody></table>';--}}

        {{--    --}}{{--                $('#AssignLocationsView .modal-body').html(html);--}}
        {{--    --}}{{--                $('#AssignLocationsView').modal('show');--}}
        {{--    --}}{{--            }--}}
        {{--    --}}{{--            else{--}}
        {{--    --}}{{--                var error = "No Address Found";--}}
        {{--    --}}{{--                toastr.error(error, 'Error!', {--}}
        {{--    --}}{{--                    positionClass: 'toast-top-center',--}}
        {{--    --}}{{--                    containerId: 'toast-top-center'--}}
        {{--    --}}{{--                });--}}
        {{--    --}}{{--            }--}}

        {{--    --}}{{--        });--}}
        {{--    --}}{{--    }--}}
        {{--    --}}{{--});--}}
        {{--});--}}

    </script>

@endsection
