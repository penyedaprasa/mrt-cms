@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Update Media</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Media</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Update</a>
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
                <form id="form_media" class="form" role="form" action="{{route('media.store')}}" method="POST" 
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$media->id}}"/>
                <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" name="caption" id="caption" class="form-control" value="{{$media->caption}}"/></div>
                <div class="form-group">
                <label for="avatar" class="form-label">Media File</label>
                <div class="custom-file">
                <input type="file" name="file" id="avatar" class="custom-file-input" data-toggle="custom-file-input"/>
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                </div>
                </div>
                <div class="py-3">
                <div class="form-group row justify-content-center mb-0">
                <div class="col-md-12 col-xl-12">
                <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-save mr-1"></i> Update Media
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
