@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Update Hari Libur</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Holiday</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('holiday.index')}}">List</a>
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
        <div class="col-md-6">
        <form id="form_holidays" class="form" role="form" action="{{route('holiday.store')}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$holiday->id}}"/>
<div class="form-group">
<label for="title">Judul</label>
<input type="text" name="title" id="title" class="form-control" value="{{$holiday->title}}"/></div>
<div class="form-group">
<label for="jenis">Jenis Libur</label>
{!! Helper::create_radio('jenis',$jenis,$holiday->jenis) !!}

</div>
<div class="form-group">
<label for="holi_date">Tanggal</label>
<input type="text" name="holi_date" id="holi_date" class="form-control" value="{{$holiday->holi_date}}"/></div>
<div class="form-group">
<label for="enabled">Tampilkan</label>
{!! Helper::create_radio('enabled',array('Y','N'),$holiday->enabled) !!}
</div>
<div class="py-3">
  <div class="form-group row justify-content-center mb-0">
  <div class="col-md-6 col-xl-5">
  <button type="submit" class="btn btn-block btn-primary">
  <i class="fa fa-fw fa-save mr-1"></i> Simpan Hari Libur
  </button>
  </div>
  </div>
</div>
</form>
        </div></div>
    </div>
    <!-- END Page Content -->
@endsection
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
