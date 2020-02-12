<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                   <div class="form-group">
                        <label for="">Train <span class="text-danger">*</span></label>
                        <select class="form-control" name="train_id">
                            <option value="">-- Select Train --</option>
                            @foreach ($listTrains as $listTrain)
                                <option value="{{$listTrain->id}}" {{ $listTrain->id == @$data->train_id ? 'selected' : ''}}>{{$listTrain->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Route Destination <span class="text-danger">*</span></label>
                        <select class="form-control" name="route_id">
                            <option value="">-- Select Route Destination --</option>
                            @foreach ($listRoutes as $listRoute)
                                <option value="{{$listRoute->id}}" {{ $listRoute->id == @$data->route_id ? 'selected' : ''}}>{{$listRoute->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Textarea</label>
                        <textarea class="form-control" id="description" name="description" value="{{@$data->description}}" rows="4" placeholder="Description content.."></textarea>
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
