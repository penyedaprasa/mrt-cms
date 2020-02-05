@foreach($menus as $menu)    
    <li class="nav-main-item">
            <a class="nav-main-link" 
            title="{{$menu->tooltip}}"
            @if($menu->route!='')
            href="{{route($menu->route)}}"
            @else
            href="{{url($menu->url)}}"
            @endif
            
            >
                <span class="nav-main-link-name"><i class="{{$menu->icon}}"></i> {{$menu->title}}</span>
            </a>
    </li>
@endforeach    