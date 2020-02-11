<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="val-email">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{@$data->name}}" placeholder="Enter a Route Name..">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control-file" name="image" id="train-image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Textarea</label>
                        <textarea class="form-control" id="description" name="description" value="{{@$data->description}}" rows="4" placeholder="Description content.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Source <span class="text-danger">*</span></label>
                        <select class="form-control" name="source">
                            <option value="">-- Select Station Source --</option>
                            @foreach ($listStations as $listStation)
                                <option value="{{$listStation->id}}" {{ $listStation->id == @$data->source ? 'selected' : ''}}>{{$listStation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Destination <span class="text-danger">*</span></label>
                        <select class="form-control" name="destination">
                            <option value="">-- Select Station Destination --</option>
                            @foreach ($listStations as $listStation)
                                <option value="{{$listStation->id}}" {{ $listStation->id == @$data->destination ? 'selected' : ''}}>{{$listStation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Distance</label>
                        <div class="input-group">
                            <input type="number"class="form-control" name="distance" value="{{@$data->distance}}" placeholder="Enter a Route Distance..">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    KM
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Distance</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="time_est" value="{{@$data->time_est}}" placeholder="Enter a Route Time Estimation ..">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    Minute
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <label for="val-username">Image Show</label>
                    <div class="options-container">
                        <img class="img-fluid options-item" id="train-image-show" src="{{ @$data->image != null ? url('storage/'.@$data->image) : ""}}" alt="">
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
