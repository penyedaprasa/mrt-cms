@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Update Menu</h1>
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
                <h3 class="block-title">Update Menu</h3>
                </div>
                <div class="block-content">
            <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="id" value="{{$menu->id}}"/>
            <input type="hidden" name="icon" id="icon" />
            <input type="hidden" name="image" id="image" />
            <input type="hidden" name="video" id="video" />
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$menu->title}}"/></div>
            <div class="row">
                <div class="col-md-4">
            <div class="form-group">
            <label for="icon">Icon</label>
            @if(!empty($menu->icon))
            <img src="{{url('/storage/'.$menu->icon)}}" id="preview_icon" class="py-3 preview-image"/>
            @else 
            <img src="{{url('/media/icon_image.png')}}" id="preview_icon" class="py-3 preview-image"/>
            @endif
            <button type="button" class="btn btn-primary" data-source="icon" data-toggle="modal" data-target="#media-gallery">Choose Icon</button>
            </div>
            </div>
            <div class="col-md-4">            
            <div class="form-group">
            <label class="form-label">Image</label>
            @if(!empty($menu->image))
            <img src="{{url('/storage/'.$menu->image)}}" id="preview_image" class="py-3 preview-image"/>
            @else 
            <img src="{{url('/media/icon_image.png')}}" id="preview_image" class="py-3 preview-image"/>
            @endif
            <button type="button" class="btn btn-success" data-source="image" data-toggle="modal" data-target="#media-gallery">Choose Image</button>
            </div>
            </div>
            <div class="col-md-4">            
            <div class="form-group">
            <label class="form-label">Video</label>
            <img src="{{url('/media/icon_video.png')}}" id="preview_video" class="py-3 preview-image"/>
            <button type="button" class="btn btn-success" data-source="video" 
            data-toggle="modal" data-target="#media-gallery">Choose Video</button>
            </div>
            </div>
        </div>
            <div class="form-group">
            <label for="action_text">Action Text</label>
            <input type="text" name="action_text" id="action_text" class="form-control" value="{{$menu->action_text}}"/>
        </div>
            <div class="form-group">
            <label for="action_url">Action URL</label>
            <input type="text" name="action_url" id="action_url" class="form-control"  value="{{$menu->action_url}}"/>
        </div>
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
                            <i class="fa fa-fw fa-save mr-1"></i> Update Menu
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
    <div class="modal fade" id="media-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
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
                            @foreach($medias as $media)
                            <div class="col-md-4">
                            @if (strpos($media->mmtype, 'video') !== false)
                            <img src="{{url('/storage/'.$media->thumbnail)}}" data-file="{{$media->filename}}"
                            data-id="{{$media->id}}" data-target="" rel="media" class="preview-image"/>
                            @else 
                            <img src="{{url('/storage/'.$media->filename)}}"  data-file="{{$media->filename}}"
                            data-id="{{$media->id}}" data-target="" rel="media" class="preview-image"/>
                            @endif
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
<script type="text/javascript">
$('#media-gallery').on('shown.bs.modal',function(e){
    var source = $(e.relatedTarget).attr('data-source');
    $('[rel="media"]').attr('data-target',source);
});
$('[rel="media"]').click(function(e){
    var src = $(this).attr('src');
    var file = $(this).attr('data-file');
    var target = $(this).attr('data-target');
    $('#preview_'+target).attr('src',src);
    $('#'+target).val(file);
});
</script>
@endsection