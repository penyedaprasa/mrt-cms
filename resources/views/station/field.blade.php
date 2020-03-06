<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{@$data->name}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="10" rows="4" class="form-control"/>{{@$data->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="form-label">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="station-image-upload" class="custom-file-input" data-toggle="custom-file-input"/>
                            <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" id="latitude" value="{{@$data->latitude}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" id="longitude" value="{{@$data->latitude}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="time_open">Time Open</label>
                        <input type="text" name="time_open" id="time_open" class="js-flatpickr form-control" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true" value="{{@$data->time_open != null ? @$data->time_open:'05:00'}}"/>
                    </div>
                    <div class="form-group">
                        <label for="time_close">Time Close</label>
                        <input type="text" name="time_close" id="time_close" class="js-flatpickr form-control" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true" value="{{@$data->time_close != null ? @$data->time_close:'23:00'}}"/>
                    </div>
                    <div class="form-group">
                        <label for="lanes">Lanes Count<span class="text-danger">*</span></label>
                        <input type="text" name="lanes" id="lanes" class="form-control" value="{{@$data->lanes != null ? @$data->lanes:'2'}}"/>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor<span class="text-danger">*</span></label>
                        <input type="text" name="nomor" id="nomor" class="form-control" value="{{@$data->nomor}}"/>
                    </div>
                    <div class="form-group">
                        <label for="time_close">Status</label>
                        {!! Helper::create_radio('status',['close','open'],'open') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <label for="val-username">Image Show</label>
                    <div class="options-container">
                    <img class="img-fluid options-item" id="station-image-show" src="{{ @$data->image != null ? url('storage/'.@$data->image) : ""}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row items-push">
                <div class="col-lg-8">

                </div>
            </div>
    </div>
</div>
@section('js_after')
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        console.log(e);
      $('#station-image-show').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#station-image-upload").change(function() {
  readURL(this);
});

</script>
<script>jQuery(function(){ One.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>
@endsection
