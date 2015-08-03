@include('layouts.partials.header')

<div class="container">
    @include('layouts.partials.nav-bar')

    {{-- Session messages --}}
    @foreach(['success', 'info', 'warning', 'error'] as $type)
        @if(Session::has($type))
            @include('layouts.partials.message', ['message' => Session::get($type), 'type' => $type])
        @endif
    @endforeach

    {{ $content }}
</div>

@include('layouts.partials.footer')
