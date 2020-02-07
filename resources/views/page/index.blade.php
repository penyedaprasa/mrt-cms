@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Digital Signage Page</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Page</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('page.create')}}">Create</a>
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
            <div class="col-md-8 col-xl-8">
            <div class="block">
                <div class="block-header">

                </div>
                <div class="block-content">
                <table id="pages" class="table table-stripe">
<thead> <tr><th>Id</th><th>Title</th><th>Banner_text</th><th>Time</th><th>Date</th><th>Created</th><th>Action</th></tr>
</thead><tbody>
@foreach($pages as $item) 
<tr><td>{{$item->id}}</td><td>{{$item->title}}</td>
<td>{{$item->banner_text}}</td>
<td>
{{$item->time_visible}}</td>
<td>{{$item->date_visible}}</td>
<td>{{$item->created_at}}</td>
<td><a class="btn btn-primary" href="{{url('')}}"><i class="fa fa-edit"></i>Edit</a><a class="btn btn-danger"  href="{{url('')}}"><i class="fa fa-trash"></i>Remove</a></td></tr>
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
