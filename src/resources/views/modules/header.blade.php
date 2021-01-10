<header {!! $id !!} {!! $classes !!}>
    
    @if ($headline)
        <h2 class="headline">{!! $headline !!}</h2>
    @endif

	@if ($subheadline)
        <h3 class="subheadline">{!! $subheadline !!}</h3>
    @endif

</header>