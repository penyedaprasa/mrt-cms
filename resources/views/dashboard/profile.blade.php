@extends('layouts.backend')

@section('content')
    <div class="bg-image" style="background-image: url('/assets/media/photos/photo8@2x.jpg');">
        <div class="bg-black-50">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" 
                    src="{{url('/storage/'.$user->avatar)}}" alt="">
                </div>
                <h1 class="h2 text-white mb-0">{{$user->name}}</h1>
                <span class="text-white-75">{{$role->name}}</span>
            </div>
        </div>
    </div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Profile</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Profile</a>
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
            <div class="col-lg-4 col-xs-4 col-md-4">
            <div class="box">
            <div class="box-header"></div>
            <div class="box-content">
            <form action="{{url('/dashboard/profile/update')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"/>
            </div>
            <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"/>
            </div>
            <div class="form-group">
            <label for="avatar" class="form-label">Avatar</label>
            <div class="custom-file">
            <input type="file" name="avatar" id="avatar" class="custom-file-input" data-toggle="custom-file-input"/>
            <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
            </div>
            </div>
            <div class="form-group">
            <label for="new-password" class="form-label">New Password</label>
            <input type="password" name="newpass" id="new-password" value="" class="form-control"/>
            </div>
            <div class="form-group">
            <label for="new-password-confirm" class="form-label">New Password Confirmation</label>
            <input type="text" name="newpassconfirm" id="new-password-confirm" value="" class="form-control"/>
            </div>
            <div class="form-group">
            <p>Leave Password and Confirm Blank if no change</p>
            <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
            </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

