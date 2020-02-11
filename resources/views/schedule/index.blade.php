@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Train Schedule</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Train Schedule</a>
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
            <div class="col-md-12 col-xl-12">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="train_routes" class="table table-stripe">
                <thead> <tr><th>Id</th><th>Name</th><th>KODE</th><th>Action</th></tr>
                </thead><tbody>
                @foreach($trains as $item) 
                <tr><td>{{$item->id}}</td><td>{{$item->name}}</td><td>{{$item->train_code}}</td>
                <td><a href="{{url('/dashboard/trainschedule/create/'.$item->id)}}" class="btn btn-primary">Schedule</a></td></tr>
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
