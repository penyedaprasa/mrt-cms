@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Menu</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Application</li>
                        <li class="breadcrumb-item">Menu</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('menu.create')}}">Create</a>
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
                <table id="menus" class="table table-stripe">
                <thead> <tr><th>Id</th><th>Title</th><th>Icon</th><th>Image</th>
                <th>Action_text</th><th>Action_url</th><th>Visible</th><th>Action</th></tr>
                </thead><tbody>
                @foreach($menus as $item) 
                <tr><td>{{$item->id}}</td><td>{{$item->title}}</td>
                <td>
                <img src="{{url('/storage/'.$item->icon)}}" class="row-image-thumbnail"/>
                </td>
                <td>
                    
                    <img src="{{url('/storage/'.$item->image)}}" class="row-image-thumbnail"/>
                </td>
                <td>{{$item->action_text}}</td>
                <td>{{$item->action_url}}</td><td>{{$item->visible}}</td>
                <td><div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{url('dashboard/menu/edit/'.$item->id)}}"><i class="fa fa-edit"></i>Edit</a>
                <a class="btn btn-sm btn-danger"  href="{{url('dashboard/menu/remove/'.$item->id)}}"><i class="fa fa-trash"></i>Remove</a>
</div></td></tr>
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
