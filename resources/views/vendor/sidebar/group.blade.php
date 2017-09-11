<li>
    @if($group->shouldShowHeading())
        <a href="javascript:void(0);">
            <i class="icon-th-list"></i>{{ $group->getName() }}</a>
    @endif
    <ul class="sub-menu">
        @foreach($items as $item)
            {!! $item !!}
        @endforeach
    </ul>
</li>