<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                    <input type="hidden" id="videoMedia" name="video" value="{{@$data->video}}"/>
                    <input type="hidden" id="imageMedia" name="image" value="{{@$data->image}}"/>
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{@$data->name}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="image">Media<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#video-gallery">Add Media</button>
                            </div>
                            <input type="text" id="mediaFile" readonly name="source" class="form-control" value="{{@$data->video.''.@$data->image}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url">Url<span class="text-danger">*</span></label>
                        <input type="text" name="url" id="url" value="{{@$data->url}}" class="form-control"/>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="enabled1" class="form-check-label">Visible : </label>
                        {!! Helper::create_radio('visible',array('Y','N'),@$data->visible)!!}
                    </div>
                </div>
            </div>
    </div>
</div>
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
    $('#mediaFile').val(file);
});
$('[rel="image"]').click(function(e){
    var src = $(this).attr('src');
    console.log(src);
    var file = $(this).attr('data-file');
    $('#imageMedia').val(file);
    $('#videoMedia').val('');
    $('#mediaFile').val(file);
});
</script>
@endsection

