@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Media Gallery</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Media</li>
                        <li class="breadcrumb-item">Gallery</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('media.create')}}">Create</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
                
@foreach($medias as $item) 
<div class="col-md-3 animated fadeIn">
<div class="options-container fx-item-zoom-in fx-overlay-slide-right">
    @if($item->thumbnail=='')
    <img class="img-fluid options-item" src="{{url('/storage/'.$item->filename)}}" alt="{{$item->caption}}"/>
    @else 
    <img class="img-fluid options-item" src="{{url('/storage/'.$item->thumbnail)}}" alt="{{$item->caption}}"/>
    @endif 
<div class="options-overlay bg-black-75">
    <div class="options-overlay-content">
        <h3 class="h4 text-white mb-2">{{$item->caption}}</h3>
        <h4 class="h6 text-white-75 font-w400 mb-3">{{$item->filename}}</h4>
        <div class="btn btn-group">
            
        <a class="btn btn-sm btn-light" href="{{url('dashboard/media/edit/'.$item->id)}}"><i class="fa fa-edit"></i>Edit</a>
        <a class="btn btn-sm btn-light" href="{{url('dashboard/media/remove/'.$item->id)}}"><i class="fa fa-trash"></i>Remove</a>
        </div>
    </div>
</div></div></div>
@endforeach
            
        </div>
    </div>
    <!-- END Page Content -->
@endsection
