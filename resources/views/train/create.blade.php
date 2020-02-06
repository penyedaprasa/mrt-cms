@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">{{$title}}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    {{ Breadcrumbs::render('train.create') }}
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
        <div class="col-md-8 col-lg-8 col-xs-8">
            <div class="block">
            <div class="block-content">
            <form id="form_trains" class="form" role="form" action="{{route('train.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"/></div>
            <div class="form-group">
            <label for="train_code">Train_code</label>
            <input type="text" name="train_code" id="train_code" class="form-control"/></div>
            <div class="form-group">
                <label for="avatar" class="form-label">Image</label>
                <div class="custom-file">
                <input type="file" name="image" id="avatar" class="custom-file-input" data-toggle="custom-file-input"/>
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                </div>
                </div>
            <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control"/></div>
            <div class="form-group">
            <label for="train_type">Train_type</label>
            <input type="text" name="train_type" id="train_type" class="form-control"/></div>
            <div class="form-group">
            <label for="speed">Speed</label>
            <input type="text" name="speed" id="speed" class="form-control"/></div>
            <div class="form-group">
            <label for="speed_unit">Speed_unit</label>
            <input type="text" name="speed_unit" id="speed_unit" class="form-control"/></div>
            <div class="form-group">
            <label for="current_lat">Current_lat</label>
            <input type="text" name="current_lat" id="current_lat" class="form-control"/></div>
            <div class="form-group">
            <label for="current_lng">Current_lng</label>
            <input type="text" name="current_lng" id="current_lng" class="form-control"/></div>
            <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control"/></div>
            <div class="form-group">
            <label for="heading_to">Heading_to</label>
            <input type="text" name="heading_to" id="heading_to" class="form-control"/></div>
            <div class="form-group">
            <label for="enabled">Enabled</label>
            <input type="text" name="enabled" id="enabled" class="form-control"/></div>
            </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
