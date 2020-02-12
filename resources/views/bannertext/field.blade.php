<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
            <div class="row items-push">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Banner Content<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="banner" name="banner" rows="4" placeholder="Banner content..">{{@$data->banner}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Valid Until<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="valid_until" name="valid_until" value="{{@$data->valid_until}}">
                    </div>
                </div>
            </div>
    </div>
</div>
@section('js_after')
<script>
$(document).ready(function(){
    $('#valid_until').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
});
</script>
@endsection
