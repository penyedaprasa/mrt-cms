@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Train Route</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Create</li>
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
                <form id="form_train_routes" class="form" role="form" action="{{route('trainroute.store')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="train_id">Train_id</label>
                <input type="text" name="train_id" id="train_id" class="form-control"/></div>
                <div class="form-group">
                <label for="route_id">Route_id</label>
                <input type="text" name="route_id" id="route_id" class="form-control"/></div>
                <div class="form-group">
                <label for="arrival">Arrival</label>
                <input type="text" name="arrival" id="arrival" class="form-control"/></div>
                <div class="form-group">
                <label for="departure">Departure</label>
                <input type="text" name="departure" id="departure" class="form-control"/></div>
                <div class="py-3">
                <div class="form-group row justify-content-center mb-0">
                <div class="col-md-6 col-xl-5">
                <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-save mr-1"></i> Simpan Train_routes
                </button>
                </div>
                </div>
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
