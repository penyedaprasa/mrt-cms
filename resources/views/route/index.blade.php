@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Route</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Route</a>
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
                <table id="routes" class="table table-stripe">
<thead> <tr><th>Id</th><th>Name</th><th>Description</th><th>Image</th><th>Source</th><th>Destination</th><th>Distance</th><th>Time_est</th><th>Created_at</th><th>Action</th></tr>
</thead><tbody>
@foreach($routes as $item) 
<tr><td>{{$item->id}}</td><td>{{$item->name}}</td><td>{{$item->description}}</td><td>{{$item->image}}</td><td>{{$item->source}}</td><td>{{$item->destination}}</td><td>{{$item->distance}}</td><td>{{$item->time_est}}</td><td>{{$item->created_at}}</td><td><a class="btn btn-primary" href="{{url('')}}"><i class="fa fa-edit"></i>Edit</a><a class="btn btn-danger"  href="{{url('')}}"><i class="fa fa-trash"></i>Remove</a></td></tr>
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
