@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">{{$title}}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                   {{ Breadcrumbs::render('station.index') }}
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">{{$title}}<small>Table</small></h3>
            </div>
            <div class="block-content">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table id="datatable-dashboard" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <!-- <tr role="row">
                            <th>No.</th>
                            <th>stations_lanes</th>
                            <th>stations_name</th>
                            <th>stations_status</th>
                            <th>digital_created_at</th>
                            <th>diff</th>
                            <th>digital_status</th>
                            <th>digital_hit_now</th>
                        </tr> -->
                        <tr role="row">
                            <th>No.</th>
                            <!-- <th>stations_lanes</th> -->
                            <th>station name</th>
                            <th>station status</th>
                            <th>digital created</th>
                            <!-- <th>diff</th> -->
                            <th>digital status</th>
                            <th>lihat</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
    
@endsection

@section('js_after')
<script type="text/javascript">
            $(document).ready(function(){
                @if(!empty($columns))
                    $('#datatable-dashboard tfoot th').each(function () {
                        var title = $(this).text();
                        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                    });
                    var table = $('#datatable-dashboard').DataTable({
                        searching: false,   
                        processing: true,
                        serverSide: true,
                        ajax: '{{ url()->current() }}',
                        columns:{!! General::columnDatatable($columns) !!}
                    });
                @endif
                $('select').select2();
            });
        </script>
@endsection
