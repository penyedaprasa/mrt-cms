@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    
    <div class="row" style="height:100%;">
        <div class="col-md-6 py-3 px-3">
        <h2>Station</h2>
        <table class="table table-stripe">
            @foreach($stations as $station)
            <tr>
            <td>
            <img class="row-image-thumbnail" src="{{url('/storage/'.$station->image)}}"/>
            </td>
            <td><h4>{{$station->name}}</h4>
            <p>{{$station->description}}</p>
            </td>
            <td>
            <a href="" class="btn btn-primary btn-lg">More Info</a>
            <a href="{{url('/schedule/'.$station->id)}}" class="btn btn-success btn-lg">Jadwal</a>
            </td>
            </tr>
            @endforeach
        </table>    
        </div>
        <div class="col-md-6" style="background-image:url('assets/media/background.jpg');">
        
        </div>
    </div>
    
    <!-- END Hero -->
@endsection
