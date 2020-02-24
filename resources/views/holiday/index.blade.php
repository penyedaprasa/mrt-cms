@extends('layouts.backend')

@section('content')
    <!-- Hero -->

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">{{$title}}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                   {{ Breadcrumbs::render($view.'.index') }}
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
            <div class="block-header">
                <a href="{{route($view.'.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Holiday</a>
            </div>
            <div class="block-content">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table id="datatable" class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr role="row">
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Enabled</th>
                            <th width='15%'>action</th>
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
