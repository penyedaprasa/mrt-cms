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

    <!-- END Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-xl-8">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <form id="form_banners" class="form" role="form" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="videoMedia" name="video" value="{{@$banner->video}}"/>
                <input type="hidden" id="imageMedia" name="image" value="{{@$banner->image}}"/>
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{@$banner->name}}" class="form-control"/></div>
                <div class="form-group">
                <label for="image">Media</label>
                    <div class="custom-file">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#video-gallery">Add Media</button>
                    <label id="mediaFile">{{@$banner->video.''.@$banner->image}}</label>
                    </div>
                </div>
                <div class="form-group">
                <label for="url">Url</label>
                <input type="text" name="url" id="url" value="{{@$banner->url}}" class="form-control"/></div>
                <div class="form-check form-check-inline">
                <label for="enabled1" class="form-check-label">Visible : </label>
                     {!! Helper::create_radio('visible',array('Y','N'),@$banner->visible)!!}
                </div>

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
    <div class="modal fade" id="video-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Choose Media</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="row">
                            @foreach($videos as $media)
                                <div class="col-md-4">
                                <img src="{{url('/storage/'.$media->thumbnail)}}" data-file="{{$media->filename}}"
                                data-id="{{$media->id}}" data-target="" rel="video" class="preview-image"/>
                                </div>
                            @endforeach
                            @foreach($images as $media)
                                <div class="col-md-4">
                                <img src="{{url('/storage/'.$media->filename)}}" data-file="{{$media->filename}}"
                                data-id="{{$media->id}}" data-target="image-container" rel="image" class="preview-image"/>
                                </div>
                            @endforeach
                        </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('js_after')
<script src="/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/slick-carousel/slick.min.js"></script>
<script type="text/javascript">
$('[rel="video"]').click(function(e){
    var src = $(this).attr('src');
    console.log(src);
    var file = $(this).attr('data-file');
    $('#videoMedia').val(file);
    $('#imageMedia').val('');
    $('#mediaFile').text(file);
});
$('[rel="image"]').click(function(e){
    var src = $(this).attr('src');
    console.log(src);
    var file = $(this).attr('data-file');
    $('#imageMedia').val(file);
    $('#videoMedia').val('');
    $('#mediaFile').text(file);
});
</script>
@endsection
