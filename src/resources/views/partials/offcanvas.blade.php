<div class="off-canvas offcanvas-scale align-center-middle" id="offCanvas" data-off-canvas data-transition="overlap">

    @php wp_nav_menu( $builder->getMenuArgs('offcanvas') ); @endphp

	<button class="close-button off-canvas-close" data-toggle="offCanvas">
		<img src="@asset('images/x.svg')" alt="close">
    </button>

</div>