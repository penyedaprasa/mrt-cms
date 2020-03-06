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
            <marquee>
            @foreach($texts as $text) 
            {{$text->banner}}
            @endforeach
</marquee>
            <div class="banner-container">
            @foreach($banners as $banner)
             <div><img src="{{url('/storage/'.$banner->image)}}"/></div>   
            @endforeach
            </div>
            <div>&nbsp;</div>
            <div class="menu-container">
                
            @foreach($menus as $menu)
             <a class="menu-item" href="{{url($menu->action_url)}}"><img class="menu-img" src="{{url('/storage/'.$menu->image)}}"/></a>   
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
    $('.banner-container').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 2000,
    });
});
</script>
@endsection
