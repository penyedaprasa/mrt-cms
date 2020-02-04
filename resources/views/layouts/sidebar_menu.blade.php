<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"

    @if($parent->route!='')
    href="{{route($parent->route)}}"
    @else
    href="{{url($parent->url)}}"
    @endif
    >
        <i class="nav-main-link-icon fa fa-train"></i>
        <span class="nav-main-link-name">{{$parent->title}}</span>
    </a>
    <ul class="nav-main-submenu">

        <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('dashboard/train') ? ' active' : '' }}" href="{{route('train.index')}}">
                <span class="nav-main-link-name">List</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('dashboard/train/create') ? ' active' : '' }}" href="{{route('train.create')}}">
                <span class="nav-main-link-name">Create</span>
            </a>
        </li>

    </ul>
</li>
