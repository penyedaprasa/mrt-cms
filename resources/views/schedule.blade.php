@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    
    <div class="row" style="height:100%;">
    @foreach($destinations as $destination)
        <div class="col-md-6 py-3 px-3">
        <div class="block">
        <div class="block-header">
        <h1 class="block-title">Nama Kereta : {{$train->name}}</h1>
        </div>
        <div class="block-content">
        <h2 class="block-title">Jadwal MRT Stasiun {{$source->name}} Arah ke {{$destination->tujuan}}</h2>
        <table class="table">
            <tr><th>Jam</th><th>Menit</th><th></th></tr>
            @for($i=intval($source->time_open);$i<=intval($source->time_close);$i++)
            <tr>
            <td>{{$i}}</td>
            <td>
            
                @foreach(Helper::getMinutes($train->id,$source->id,$destination->destination,$i) as $minute)
                <div class="btn btn-group">
                <button type="button" 
                class="btn btn-sm btn-info" title="Hari Biasa">{{$minute->departure_minute}}</button>
                @if($minute->departure_minute!=$minute->dep_hday_minute)
                <button class="btn btn-sm btn-danger" title="Hari Libur">{{$minute->dep_hday_minute}}</button>
                @endif
                </div>
                @endforeach
            
            </td>
            </tr>
            @endfor
            </table> 
            </div>
            </div>
        </div>
     @endforeach   
    </div>
    
    <!-- END Hero -->
@endsection
