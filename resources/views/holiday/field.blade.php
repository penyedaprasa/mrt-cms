<div class="block">
    <div class="block-header">
        <h3 class="block-title">Form Input</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="form-group">
        <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{@$data->title}}"/>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Libur</label>
            {!! Helper::create_radio('jenis',$jenis,@$data->jenis) !!}
        </div>
        <div class="form-group">
            <label for="holi_date">Tanggal</label>
            <input type="text" name="holi_date" id="holi_date" class="form-control" value="{{@$data->holi_date}}"/>
        </div>
        <div class="form-group">
            <label for="enabled">Tampilkan</label>
            {!! Helper::create_radio('enabled',array('Y','N'),@$data->enabled) !!}
        </div>
    </div>
</div>
@section('js_after')
<script>
$(document).ready(function(){
    $('#holi_date').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
    });
});
</script>
@endsection
