@if ($breadcrumbs)
<ul id="breadcrumbs" class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
    @if (!$breadcrumb->last)
    <li>
        @if(strpos($breadcrumb->url, 'home') !== false)
            <i class="icon-home"></i>
        @endif
        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
    </li>
    @else
    <li class="current">
        @if(strpos(strtolower($breadcrumb->title), 'home') !== false)
            <i class="icon-home"></i>
        @endif
        {{ $breadcrumb->title }}
    </li>
    @endif
    @endforeach
</ul>
@endif