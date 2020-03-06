@extends('layouts.simple')
@section('css_after')
<link rel="stylesheet" href="/assets/js/plugins/slick-carousel/slick.css">
<link rel="stylesheet" href="/assets/js/plugins/slick-carousel/slick-theme.css">

<link rel="stylesheet" href="/css/signage.css">
@endsection
@section('content')
    <!-- Hero -->
    
    <div class="row" style="height:100%;">
        <div class="col-md-12 col-lg-12">
            <div class="frame-center">
            <img class="logo" src="{{url('/media/logo.png')}}"/>
            <marquee>{{$page->banner_text}}</marquee>
            <div class="video-container">
            <video id="video_player" controls poster="{{ url('/media/icon_video.png')}}" 
            width="320" height="240" playsinline loop>
            @foreach($videos as $video)
                <source src="{{url('/storage/'.$video->video_url)}}" type="video/mp4">
            @endforeach    
            </video>
</div>
            <div>&nbsp;</div>
            <div class="banner-container">
            @foreach($images as $image)
             <div><img src="{{url('/storage/'.$image->image_url)}}"/></div>   
            @endforeach
            </div>
            </div>
        </div>
        
    </div>
    
    <!-- END Hero -->
@endsection
@section('js_after')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/js/plugins/slick-carousel/slick.min.js"></script>
<script>
$(document).ready(function(){
    var video = document.getElementById('video_player');
    video.load();
    video.play();
    $('.banner-container').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 2000,
    });
    $('.logo').click(function(){
        window.location="{{url('/')}}";
    });
});
</script>
@endsection
