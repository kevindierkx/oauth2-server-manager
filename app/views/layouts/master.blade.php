@include('layouts.partials.header')

<div class="container">
	@include('layouts.partials.nav-bar')

	{{ $content }}
</div>

@include('layouts.partials.footer')
