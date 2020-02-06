@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Station</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Station</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row ">
            <div class="col-md-6 col-xl-5">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="stations" class="table table-stripe">
                <thead> <tr><th>Id<th><th>Name<th><th>Description<th><th>Image<th><th>Latitude<th><th>Longitude<th><th>Time_open<th><th>Time_close<th><th>Status<th><th>Created_at<th><th>Updated_at<th><th>Action</th></tr>
                </thead><tbody>
                @foreach($stations as $item) 
                <tr><td>{{$item->id}}<td><td>{{$item->name}}<td><td>{{$item->description}}<td><td>{{$item->image}}<td><td>{{$item->latitude}}<td><td>{{$item->longitude}}<td><td>{{$item->time_open}}<td><td>{{$item->time_close}}<td><td>{{$item->status}}<td><td>{{$item->created_at}}<td><td>{{$item->updated_at}}<td></tr>
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
