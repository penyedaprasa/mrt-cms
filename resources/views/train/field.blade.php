<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input New Train</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="val-username">Train Kode<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="train_code" value="{{@$data->train_code}}" placeholder="Enter a Train Code..">
                    </div>
                    <div class="form-group">
                        <label for="val-email">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{@$data->name}}" placeholder="Enter a Train Name..">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <input type="file" class="form-control-file" name="image" id="train-image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Textarea</label>
                        <textarea class="form-control" id="description" name="description" value="{{@$data->description}}" rows="4" placeholder="Description content.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Train Type</label>
                        <input type="text" class="form-control" name="train_type" value="{{@$data->train_type}}" placeholder="Enter a Train Type..">
                    </div>
                    <div class="form-group">
                        <label for="">Speed</label>
                        <input type="number" class="form-control" name="speed" value="{{@$data->speed}}" placeholder="Enter a Train speed..">
                    </div>
                    <div class="form-group">
                        <label for="">Speed Unit</label>
                        <input type="number" class="form-control" name="speed_unit" value="{{@$data->speed_unit}}" placeholder="Enter a Train Speed Unit..">
                    </div>
                    <div class="form-group">
                        <label for="">Enabled</label>
                        <div class="custom-control custom-switch custom-control-lg mb-2">
                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg1" name="enabled" value="yes" {{ @$data->enabled == 'yes' ? 'checked':''}}>
                            <label class="custom-control-label" for="example-sw-custom-lg1"></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <label for="val-username">Image Show</label>
                    <div class="options-container">
                        <img class="img-fluid options-item" id="train-image-show" src="" alt="">
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
      $('#train-image-show').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#train-image-upload").change(function() {
  readURL(this);
});
</script>
@endsection
