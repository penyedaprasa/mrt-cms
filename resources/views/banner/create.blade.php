@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Create</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Create</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('banner.index')}}">Banner</a>
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
                <form id="form_banners" class="form" role="form" action="{{route('banner.store')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"/></div>
                <div class="form-group">
                <label for="image">Image</label>
                <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input"/>
                <label class="custom-file-label" for="image">Choose Thumbnail</label>
                </div>
                </div>
                <div class="form-group">
                <label for="video">Video</label>
                <div class="custom-file">
                <input type="file" name="video" id="video" class="custom-file-input"/>
                <label class="custom-file-label" for="video">Choose Video</label>
                </div>
                </div>
                <div class="form-group">
                <label for="url">Url</label>
                <input type="text" name="url" id="url" class="form-control"/></div>
                <div class="form-group">
                <label for="visible">Visible</label>
                <input type="text" name="visible" id="visible" class="form-control"/></div>
                <div class="py-3">
                <div class="form-group row justify-content-center mb-0">
                    <div class="col-md-6 col-xl-5">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-fw fa-save mr-1"></i> Simpan Banner
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
