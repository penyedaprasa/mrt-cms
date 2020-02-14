@extends('layouts.backend')

@section('content')
<div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Create Schedule Kereta : {{$train->name}}/{{$train->train_code}}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Create</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Train Schedule</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
    @foreach($stations as $station)
        <div class="row">
            <div class="col-md-4">
            Asal Stasiun : {{$station->name}} ({{Helper::getDestinationCount($station->id)}})  
            Ke :</div>
                <div class="col-md-8">
                @foreach(Helper::getDestinations($station->id) as $dest)    
                
                <form name="add_schedule_{{$station->id}}" action="{{route('trainschedule.update')}}" method="GET">
            @csrf 
            <input type="hidden" name="source" value="{{$station->id}}"/>
            <input type="hidden" name="trainid" value="{{$train->id}}"/>
                <div class="row">
                <div class="col-md-6">                
                {!! Helper::selectStationNotIn('destination',$station->id,$dest->destination)!!}
                </div>
                <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update ({{$dest->jumlah}})</button>
                </div>
            </div>
                </form>

                @endforeach
                </div>
            
        </div>
        @endforeach
    </div>
@endsection    