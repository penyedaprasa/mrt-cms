@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Create Menu</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Create</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('menu.index')}}">Menu</a>
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
            <div class="col-md-8 col-xl-8">
            <div class="block">
                <div class="block-header">
                <h3 class="block-title">Create Menu</h3>
                </div>
                <div class="block-content">
            <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"/></div>
            <div class="form-group">
            <label for="icon">Icon</label>
            <div class="custom-file">
            <input type="file" name="icon" id="icon" class="custom-file-input" data-toggle="custom-file-input"/>
            <label class="custom-file-label" for="icon">Choose Icon</label>
            </div>
            </div>
            <div class="form-group">
            <div class="form-group">
            <label for="avatar" class="form-label">Image</label>
            <div class="custom-file">
            <input type="file" name="image" id="avatar" class="custom-file-input" data-toggle="custom-file-input"/>
            <label class="custom-file-label" for="avatar">Choose Image</label>
            </div>
            </div>
            <div class="form-group">
            <label for="action_text">Action Text</label>
            <input type="text" name="action_text" id="action_text" class="form-control"/></div>
            <div class="form-group">
            <label for="action_url">Action URL</label>
            <input type="text" name="action_url" id="action_url" class="form-control"/></div>
            <div class="form-check form-check-inline">
                <label for="enabled1" class="form-check-label">Visible : </label>
                    <input type="radio" name="visible" value="Y" class="form-check-input" checked/>
                    Yes
                    <input type="radio" name="visible" value="N" class="form-check-input"/>
                    No
                </div>
            <div class="py-3">
                <div class="form-group row justify-content-center mb-0">
                    <div class="col-md-6 col-xl-5">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-fw fa-save mr-1"></i> Simpan Menu
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
