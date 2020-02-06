@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Route</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Create</li>
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
                <form id="form_routes" class="form" role="form" action="{{route('route.store')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"/></div>
                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"/></div>
                <div class="form-group">
                <label for="image">Image</label>
                <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input"/>
                <label class="custom-file-label" for="image">Choose file</label>
                </div>
                </div>
                <div class="form-group">
                <label for="source">Source</label>
                <input type="text" name="source" id="source" class="form-control"/></div>
                <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" name="destination" id="destination" class="form-control"/></div>
                <div class="form-group">
                <label for="distance">Distance</label>
                <input type="text" name="distance" id="distance" class="form-control"/></div>
                <div class="form-group">
                <label for="time_est">Time_est</label>
                <input type="text" name="time_est" id="time_est" class="form-control"/></div>
                <div class="py-3">
                    <div class="form-group row justify-content-center mb-0">
                    <div class="col-md-6 col-xl-5">
                    <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-fw fa-save mr-1"></i> Simpan Rute
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
