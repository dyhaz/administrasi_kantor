<li>
    @if($group->shouldShowHeading())
        <a href="javascript:void(0);">
            <i class="icon-user-md"></i>{{ $group->getName() }}</a>
    @endif
    <ul class="sub-menu">
        @foreach($items as $item)
            {!! $item !!}
        @endforeach
    </ul>
</li>