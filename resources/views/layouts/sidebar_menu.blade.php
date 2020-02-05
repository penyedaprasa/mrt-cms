@foreach($parents as $parent)
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"

    @if($parent->route!='')
    href="{{route($parent->route)}}"
    @else
    href="{{url($parent->url)}}"
    @endif
    >
        <i class="nav-main-link-icon {{$parent->icon}}"></i>
        <span class="nav-main-link-name">{{$parent->title}}</span>
    </a>
    <ul class="nav-main-submenu">
        {!! Helper::sidebar_submenu($parent->id) !!}        

    </ul>
</li>
@endforeach
