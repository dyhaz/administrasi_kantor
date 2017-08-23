@if(Auth::user())

    @if(Auth::user()->hasRole('ka_seksi_pengujian_dan_pengendalian_mutu'))
        {!! $sidebar_ka_seksi_pengujian_dan_pengendalian_mutu !!}
    @endif

    @if(Auth::user()->hasRole('ka_subbag_tu'))
        {!! $sidebar_ka_subbag_tu !!}
    @endif

    @if(Auth::user()->hasRole('staf_subbag_tu'))
        {!! $sidebar_staf_subbag_tu !!}
    @endif

    @if(Auth::user()->hasRole('ka_subbag_tu'))
        {!! $sidebar_ka_subbag_tu !!}
    @endif

    @if(Auth::user()->hasRole('ka_upt'))
        {!! $sidebar_ka_upt !!}
    @endif

@endif