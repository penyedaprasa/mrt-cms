@extends('layouts.backend')

@section('content')
<div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Update Schedule</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Train</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('trainschedule.index')}}">Schedule</a>
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
            <h3>Kereta : {{$train->name}}/{{$train->train_code}}</h3>
            <h4> Dari Stasiun {{$source->name}} ke Stasiun : {{$destination->name}}</h4>
            <table class="table">
            <tr><th>Jam</th><th>Menit</th><th></th></tr>
            @for($i=intval($open);$i<=$close;$i++)
            <tr>
            <td>{{$i}}</td>
            <td>
            <div id="row_{{$i}}">
            @if(!empty(Helper::getMinutes($train->id,$source->id,$destination->id,$i)))
                @foreach(Helper::getMinutes($train->id,$source->id,$destination->id,$i) as $minute)
                <div class="btn btn-group" id="group_{{$minute->id}}">
                <button type="button" data-id="{{$minute->id}}" data-hour="{{$i}}" data-toggle="modal" 
                data-target="#modal-update-minute" data-minute1="{{$minute->departure_minute}}"
                data-minute2="{{$minute->dep_hday_minute}}"
                class="btn btn-sm btn-info" title="Hari Biasa">{{$minute->departure_minute}}</button>
                @if($minute->departure_minute!=$minute->dep_hday_minute)
                <button type="button" class="btn btn-sm btn-danger" title="Hari Libur">{{$minute->dep_hday_minute}}</button>
                @endif
                </div>
                @endforeach
            @endif    
            </div>
            </td>
            <td class="btn-group"><a href="#" data-id="{{$i}}" class="btn btn-sm btn-primary" rel="addmin" data-toggle="modal" 
            data-target="#modal-add-minute" title="Tambahkan Menit"><i class="fa fa-plus"></i></a>
            <button type="button" class="btn btn-sm btn-danger" rel="remmin" data-hour="{{$i}}" data-station="{{$destination->id}}"
            data-train="{{$train->id}}"
            title="Hapus Semua menit di jam tersebut"><i class="fa fa-trash"></i></button>
            </td>
            </tr>
            @endfor
            </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add-minute" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Menambahkan Jadwal MRT</h3>
                            
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <h4> Dari Stasiun {{$source->name}} ke Stasiun : {{$destination->name}}</h4>
                            <form id="add-minute" action="{{route('trainschedule.store')}}" method="POST">
                                @csrf 
                                <input type="hidden" name="source" value="{{$source->id}}" />
                                <input type="hidden" name="destination" value="{{$destination->id}}" />
                                <input type="hidden" name="train_id" value="{{$train->id}}"/>
                                <input type="hidden" id="departure_hour" name="departure_hour" />
                                <input type="hidden" id="dep_hday_hour" name="dep_hday_hour" />
                                <div class="form-group">
                                    <label for="minute">Menit:</label>
                                    <input type="text" id="minute" name="departure_minute" placeholder="Menit" class="form-control"/>
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                <label for="holy_minute">Hari libur Menit:</label>
                                    <input type="text" id="holy_minute" name="dep_hday_minute" placeholder="Hari Libur" class="form-control"/>
                                </div>
                                
                                <div class="form-check form-check-inline">
                                <label for="enabled1" class="form-check-label">Active : </label>
                                    <input type="radio" name="status" value="Aktif" class="form-check-input" checked/>
                                    Yes
                                    <input type="radio" name="status" value="NonAktif" class="form-check-input"/>
                                    No
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" onclick="javascript:$('#add-minute').submit();" 
                            class="btn btn-sm btn-primary" 
                            data-dismiss="modal"><i class="fa fa-check mr-1"></i>Tambahkan Jadwal</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="modal-update-minute" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Update Jadwal</h3>
                            
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <h4> Dari Stasiun {{$source->name}} ke Stasiun : {{$destination->name}}</h4>
                            <form id="update-minute" action="{{route('trainschedule.store')}}" method="POST">
                                @csrf 
                                <input type="hidden" name="id" id="schedule_id"/>
                                <div class="form-group">
                                    <label for="update_minute">Menit:</label>
                                    <input type="text" id="update_minute" name="departure_minute" placeholder="Menit" class="form-control"/>
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                <label for="update_holy_minute">Hari libur Menit:</label>
                                    <input type="text" id="update_holy_minute" name="dep_hday_minute" placeholder="Hari Libur" class="form-control"/>
                                </div>
                                
                                <div class="form-check form-check-inline">
                                <label for="enabled1" class="form-check-label">Active : </label>
                                    <input type="radio" name="status" value="Aktif" class="form-check-input" checked/>
                                    Yes
                                    <input type="radio" name="status" value="NonAktif" class="form-check-input"/>
                                    No
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_remove"
                            class="btn btn-sm btn-danger" 
                            data-dismiss="modal"><i class="fa fa-trash"></i>Remove</button>
                            <button type="button" onclick="javascript:$('#update-minute').submit();" 
                            class="btn btn-sm btn-primary" 
                            data-dismiss="modal"><i class="fa fa-check mr-1"></i>Update</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>       
@endsection    
@section('js_after')
<script src="/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript">
$('#minute').on('blur',function(){
    var val = $(this).val();
    $('#holy_minute').val(val);
});
$('#modal-add-minute').on('shown.bs.modal',function(e){
    var hour=$(e.relatedTarget).attr('data-id');
    $('#departure_hour').val(hour);
    $('#dep_hday_hour').val(hour);
});
$('#add-minute').submit(function(e){
    e.preventDefault();
    var actionURL = $(this).attr('action');
    var formData = $(this).serialize();
    $.ajax({url:actionURL, 
    data:formData, type:'POST'}).done(function(json){
        // console.log(json);
        const schedule = json.schedule;
        const hour = schedule.departure_hour;
        const minute = schedule.departure_minute;
        const minute2 = schedule.dep_hday_minute;
        var html='<div class="btn btn-group" id="group_'+schedule.id+'">';
        if(minute===minute2){
            html +='<button type="button" class="btn btn-sm btn-info" data-id="'+schedule.id+'" data-toggle="modal" data-target="#modal-update-minute">'+minute+'</button>';
         
        } else {
            html+='<button type="button" class="btn btn-sm btn-info" data-id="'+schedule.id+'" data-toggle="modal" data-target="#modal-update-minute">'+minute+'</button><button class="btn btn-sm btn-danger">'+minute2+'</button>';
            
        }
        html+='</div>';
        $('#row_'+hour).append(html);
        if(json.status){
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: json.message});
        } else {
            One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: json.message});
        }
    });
});
$('[rel="remmin"]').click(function(e){
    var train = $(this).attr('data-train');
    var station = $(this).attr('data-station');
    var hour = $(this).attr('data-hour');
    const value = confirm('Are you Sure Delete this schedule?');
    if(value){
        var URL = "{{url('dashboard/trainschedule/remove')}}/"+train+"/"+station+"/"+hour;
    $.ajax({url:URL,type:'GET'}).done(function(json){
        if(json.status){
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: json.message}); 
            $('#row_'+hour).empty();
        } else {
            One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: json.message});
        }
        
    });
    }
    
});
$('#modal-update-minute').on('shown.bs.modal',function(e){
    var id=$(e.relatedTarget).attr('data-id');
    var minute1=$(e.relatedTarget).attr('data-minute1');
    var minute2=$(e.relatedTarget).attr('data-minute2');
    $('#schedule_id').val(id);
    $('#update_minute').val(minute1);
    $('#update_holy_minute').val(minute2);
});
$('#update-minute').submit(function(e){
    e.preventDefault();
    var actionURL = $(this).attr('action');
    var formData = $(this).serialize();
    $.ajax({url:actionURL, 
    data:formData, type:'POST'}).done(function(json){
        // console.log(json);
        const schedule = json.schedule;
        const hour = schedule.departure_hour;
        const minute = schedule.departure_minute;
        const minute2 = schedule.dep_hday_minute;
        
        $('#group_'+schedule.id+' [data-id="'+schedule.id+'"]').text(minute);
        if(minute!==minute2){
            $('#group_'+schedule.id).append('<button class="btn btn-sm btn-danger">'+minute2+'</button>');
        }
        if(json.status){
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: json.message});
        } else {
            One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: json.message});
        }
    });
});
$('#btn_remove').click(function(e){
    var sid = $('#schedule_id').val();
    var URL = "{{url('/dashboard/trainschedule/delete')}}/"+sid;
    $.ajax({url:URL,type:'GET'}).done(function(json){
        
        if(json.status){
            $('#group_'+sid).empty();
            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: json.message});
        } else {
            One.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: json.message});
        }
    });
    
})
</script>
@endsection