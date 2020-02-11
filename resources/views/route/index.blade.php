@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">{{$title}}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                   {{ Breadcrumbs::render('route.index') }}
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
                <table id="datatable" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr role="row">
                            <th width="15%">Name</th>
                            <th width="20%">Description</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th width="8%">Distance</th>
                            <th width="8%">Time Est</th>
                            <th>Image</th>
                            <th width="15%">Action</th>
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
    <script>
    $('#datatable1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        columns:[
            {data:'stationSource.id'},
            // {data: 'title', name: 'posts.title'},
            // {data: 'name', name: 'users.name'},
            // {data: 'created_at', name: 'posts.created_at'},
            // {data: 'updated_at', name: 'posts.updated_at'}
        ]
    });
    </script>
@endsection
