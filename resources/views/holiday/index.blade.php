@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Pengaturan Hari Libur</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Holiday</li>
                        <li class="breadcrumb-item">List</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('holiday.create')}}">Create</a>
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
        <div class="col-md-12 col-xl-12 col-lg-12">
        <div class="block">
        <div class="block-body">
        <table id="holidays" class="table table-stripe">
<thead> <tr><th>Id</th><th>Judul</th><th>Jenis</th><th>Tanggal</th><th>Enabled</th><th>Action</th></tr>
</thead><tbody>
@foreach($holidays as $item) 
<tr><td>{{$item->id}}</td><td>{{$item->title}}</td><td>{{ucwords($item->jenis)}}</td><td>{{$item->holi_date}}</td>
<td>{{$item->enabled}}</td><td class="btn-group"><a class="btn btn-primary" 
href="{{route('holiday.edit',$item->id)}}"><i class="fa fa-edit"></i>Edit</a>
<a class="btn btn-danger"  href="{{route('holiday.destroy',$item->id)}}"><i class="fa fa-trash"></i>Remove</a></td></tr>
@endforeach
</tbody>
</table>
</div></div>
        </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
