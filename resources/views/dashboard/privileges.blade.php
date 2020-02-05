@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Role Privileges</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Role Privileges</a>
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
        <div class="col-md-6 col-xs-6 col-lg-6">
            
            <div class="block">
                <div class="block-header">
                <h3 class="block-title">Sidebar menu : {{$sidebar->title}}</h3>
                </div>    
                <div class="block-content">
                <form action="{{route('privilege.update')}}" method="POST">
                @csrf 
                <input type="hidden" name="menu_id" value="{{$sidebar->id}}"/>
                @foreach($roles as $role)
                <input type="hidden" name="role[]" value="{{$role->id}}"/>
                <input type="hidden" name="grant_create[]" id="create_{{$role->id}}_value" value="{{Helper::privilege_value($sidebar->id,$role->id,'create')}}"/>
                <input type="hidden" name="grant_read[]" id="read_{{$role->id}}_value" value="{{Helper::privilege_value($sidebar->id,$role->id,'read')}}"/>
                <input type="hidden" name="grant_update[]" id="update_{{$role->id}}_value" value="{{Helper::privilege_value($sidebar->id,$role->id,'update')}}"/>
                <input type="hidden" name="grant_delete[]" id="delete_{{$role->id}}_value" value="{{Helper::privilege_value($sidebar->id,$role->id,'delete')}}"/>
                <p>Role : {{$role->name}}</p>
                <div class="form-group">
                <label class="form-label">Hak Akses:</label>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" rel="create" class="custom-control-input" id="create_{{$role->id}}" value="{{$role->id}}" 
                         {!! Helper::privilege_checked($sidebar->id,$role->id,'create')!!}>
                        <label class="custom-control-label" for="create_{{$role->id}}">CREATE</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox"  rel="read" class="custom-control-input" id="read_{{$role->id}}" value="{{$role->id}}" 
                        {!! Helper::privilege_checked($sidebar->id,$role->id,'read')!!}>
                        <label class="custom-control-label" for="read_{{$role->id}}">READ</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox"  rel="update" class="custom-control-input" id="update_{{$role->id}}" value="{{$role->id}}" 
                        {!! Helper::privilege_checked($sidebar->id,$role->id,'update')!!}>
                        <label class="custom-control-label" for="update_{{$role->id}}">UPDATE</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox"  rel="delete" class="custom-control-input" id="delete_{{$role->id}}" value="{{$role->id}}" 
                        {!! Helper::privilege_checked($sidebar->id,$role->id,'delete')!!}>
                        <label class="custom-control-label" for="delete_{{$role->id}}">DELETE</label>
                    </div>
                </div>
                
                @endforeach
                <div class="py-3">
                <div class="form-group row justify-content-center mb-0">
                    <div class="col-md-6 col-xl-5">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-fw fa-key mr-1"></i> Update Hak Akses
                        </button>
                    </div>
                </div>
                </div>
                </form>
                </div>    
            </div>    
            
        </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
<script type="text/javascript">

$('[rel="create"]').click(function(e){
    var roleId = $(this).val();
    var checked = $(this).prop('checked');
    if(checked){
        $('#create_'+roleId+'_value').val('Y');
    } else {
        $('#create_'+roleId+'_value').val('N');
    }
});
$('[rel="read"]').click(function(e){
    var roleId = $(this).val();
    var checked = $(this).prop('checked');
    if(checked){
        $('#read_'+roleId+'_value').val('Y');
    } else {
        $('#read_'+roleId+'_value').val('N');
    }
});
$('[rel="update"]').click(function(e){
    var roleId = $(this).val();
    var checked = $(this).prop('checked');
    if(checked){
        $('#update_'+roleId+'_value').val('Y');
    } else {
        $('#update_'+roleId+'_value').val('N');
    }
});
$('[rel="delete"]').click(function(e){
    var roleId = $(this).val();
    var checked = $(this).prop('checked');
    if(checked){
        $('#delete_'+roleId+'_value').val('Y');
    } else {
        $('#delete_'+roleId+'_value').val('N');
    }
});
</script>
@endsection