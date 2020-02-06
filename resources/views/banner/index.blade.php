@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Banner</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Application</li>
                        <li class="breadcrumb-item">Banner</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('banner.create')}}">Create</a>
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
            <div class="col-md-12 col-xl-12">
                <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="banners" class="table table-stripe">
<thead> <tr><th>Id</th><th>Name</th><th>Url</th><th>Visible</th><th>Created_at</th><th>Action</th></tr>
</thead><tbody>
@foreach($banners as $item) 
<tr><td>{{$item->id}}</td><td>{{$item->name}}</td><td>{{$item->url}}</td><td>{{$item->visible}}</td>
<td>{{$item->created_at}}</td>
<td><div class="btn-group"><a class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Edit</a><a class="btn btn-sm btn-danger">
<i class="fa fa-trash"></i>Remove</a></div></td></tr>
@endforeach
</tbody>
</table>

                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
