@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    
    <div class="row" style="height:100%;">
        <div class="col-md-12 py-3 px-3">
        <div class="block">
        <div class="block-header">
        @if(!empty($fromstation))
        <h2>Jadwal MRT Stasiun {{$station->name}} dari {{$fromstation->name}}</h2>
        @else 
        <h2>Jadwal MRT Stasiun {{$station->name}} belum Ada</h2>
        @endif
        <h3>Nama Kereta : {{$train->name}}</h3>
        </div>
        <div class="block-content">
        <table class="table">
            <tr><th>Jam</th><th>Menit</th><th></th></tr>
            @for($i=intval($station->time_open);$i<=intval($station->time_close);$i++)
            <tr>
            <td>{{$i}}</td>
            <td>
            <div id="row_{{$i}}">
                @foreach(Helper::getMinutes($train->id,$station->id,$i) as $minute)
                <div class="btn btn-group">
                <button type="button" 
                class="btn btn-sm btn-info" title="Hari Biasa">{{$minute->departure_minute}}</button>
                @if($minute->departure_minute!=$minute->dep_hday_minute)
                <button class="btn btn-sm btn-danger" title="Hari Libur">{{$minute->dep_hday_minute}}</button>
                @endif
                </div>
                @endforeach
            </div>
            
            </tr>
            @endfor
            </table> 
            </div>
            </div>
        </div>
        
    </div>
    
    <!-- END Hero -->
@endsection
