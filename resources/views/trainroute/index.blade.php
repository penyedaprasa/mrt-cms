@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Train Route</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Train Route</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-xl-5">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="train_routes" class="table table-stripe">
                <thead> <tr><th>Id<th><th>Train_id<th><th>Route_id<th><th>Arrival<th><th>Departure<th><th>Created_at<th><th>Updated_at<th><th>Action</th></tr>
                </thead><tbody>
                @foreach($train_routes as $item) 
                <tr><td>{{$item->id}}<td><td>{{$item->train_id}}<td><td>{{$item->route_id}}<td><td>{{$item->arrival}}<td><td>{{$item->departure}}<td><td>{{$item->created_at}}<td><td>{{$item->updated_at}}<td></tr>
                @endforeach
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
