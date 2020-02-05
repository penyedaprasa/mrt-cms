@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Setting</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Setting</a>
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
            <div class="col-xl-6">
                <div class="block">
                <div class="block-header">
                <h3 class="block-title">Role</h3>
                <div class="block-options">
                    <div class="block-options-item">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-role">Add Role</button>
                    </div>
                </div>
                </div>
                <div class="block-content">
                    <table class="table table-vcenter">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" style="width: 30px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 35%;">Description</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Enabled</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <th class="text-center" scope="row">{{$role->id}}</th>
                            <td class="font-w600 font-size-sm">
                                {{$role->name}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{$role->description}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{$role->enabled}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#modal-edit-role"
                                    data-id="{{$role->id}}" data-url="{{url('dashboard/role/edit/'.$role->id)}}" title="Edit Role">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Role">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="block">
                <div class="block-header">
                <h3 class="block-title"><a href="{{url('/dashboard/setting')}}">Sidebar Menu</a></h3>
                <div class="block-options">
                    <div class="block-options-item">
                        <button class="btn btn-primary" data-toggle="modal" 
                        data-target="#modal-add-menu" data-parent="{{ request()->parent !='' ? request()->parent : 0 }} ">Add Menu</button>
                    </div>
                </div>
                </div>
                <div class="block-content">
                    <table class="table table-vcenter">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" style="width: 25px;">#</th>
                            <th>Title</th>
                            <th class="d-none d-sm-table-cell" style="width: 25%;">Tool Tip</th>
                            <th class="d-none d-sm-table-cell" style="width: 25%;">Route/URL</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Enabled</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sidebars as $menu)
                        <tr>
                            <th class="text-center" scope="row">{{$menu->id}}</th>
                            <td class="font-w600 font-size-sm">
                            <i class="{{$menu->icon}}"></i>   
                            <a href="{{url('dashboard/setting/?parent='.$menu->id)}}"> {{$menu->title}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{$menu->tooltip}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{$menu->route}} / {{$menu->url}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{$menu->enabled}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a  class="btn btn-sm btn-light" 
                                     href="{{url('dashboard/privilege/'.$menu->id)}}" title="Edit Privilege">
                                        <i class="fa fa-fw fa-key"></i>
                                    </a>
                                    <a href="{{url('dashboard/sidebar/remove/'.$menu->id)}}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Sidebar Menu">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <div class="modal fade" id="modal-add-role" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Add Role</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <form id="add-role" action="{{route('role.store')}}" method="POST">
                                @csrf 
                                <div class="form-group">
                                    <input type="text"  name="name" placeholder="Role name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="description" placeholder="Description" class="form-control"/>
                                </div>
                                <div class="form-check form-check-inline">
                                <label for="enabled1" class="form-check-label">Enabled : </label>
                                    <input type="radio"  name="enabled" value="Y" class="form-check-input" checked/>
                                    Yes
                                    <input type="radio"  name="enabled" value="N" class="form-check-input"/>
                                    No
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" onclick="javascript:$('#add-role').submit();" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Add Role</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Edit Role</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <form id="edit-role" action="{{route('role.store')}}" method="POST">
                                @csrf 
                                <input type="hidden" name="id" id="role_id" value=""/>
                                <div class="form-group">
                                    <input type="text" id="role_name" name="name" placeholder="Role name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text"  id="role_description" name="description" placeholder="Description" class="form-control"/>
                                </div>
                                <div class="form-check form-check-inline">
                                <label for="enabled1" class="form-check-label">Enabled : </label>
                                    <input type="radio" id="role_enabled" name="enabled" value="Y" class="form-check-input"/>
                                    Yes
                                    <input type="radio" id="role_disabled" name="enabled" value="N" class="form-check-input"/>
                                    No
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" onclick="javascript:$('#edit-role').submit();" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Update Role</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="modal-add-menu" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Add Sidebar Menu</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <form id="add-menu" action="{{route('sidebar.store')}}" method="POST">
                                @csrf 
                                
                                <div class="form-group">
                                    <input type="text"  name="title" placeholder="Menu Title" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tooltip" placeholder="Menu Description" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="route" placeholder="Route Menu" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="url" placeholder="Menu URL" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="icon" placeholder="Menu Icon" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="menu_parent">Parent Menu</label>
                                    <select id="menu_parent" name="parent" class="form-control">
                                    @foreach($parents as $parent)
                                    <option value="{{$parent->id}}">{{$parent->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-check form-check-inline">
                                <label for="enabled1" class="form-check-label">Enabled : </label>
                                    <input type="radio" name="enabled" value="Y" class="form-check-input" checked/>
                                    Yes
                                    <input type="radio" name="enabled" value="N" class="form-check-input"/>
                                    No
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" onclick="javascript:$('#add-menu').submit();" class="btn btn-sm btn-primary" 
                            data-dismiss="modal"><i class="fa fa-check mr-1"></i>Add Menu</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('js_after')
<script type="text/javascript">
$('#modal-edit-role').on('shown.bs.modal',function(e){
    var id = $(e.relatedTarget).attr('data-id');
    var URL = $(e.relatedTarget).attr('data-url');
    $('#role_id').val(id);
    $.ajax({url:URL,type:'GET'}).done(function(json){
        $('#role_name').val(json.name);
        $('#role_description').val(json.description);
        if(json.enabled==='Y'){
            $('#role_enabled').prop('checked',true);
        } else {
            $('#role_disabled').prop('checked',true);
        }
    });

});
$('#modal-add-menu').on('shown.bs.modal',function(e){
    var parent = $(e.relatedTarget).attr('data-parent');
    console.log('parent:'+parent);
    $('#menu_parent option[value='+parent+']').attr('selected','selected');
});
</script>
@endsection
