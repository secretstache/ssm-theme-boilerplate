<div class="off-canvas-wrapper">

	@include('partials.offcanvas')

	<div class="off-canvas-content" data-off-canvas-content>
		
		@include('partials.header')

		<div class="container">

			<main class="content" id="main">
				@yield('content')
			</main>

		</div>

		@include('partials.footer')

	</div>

</div>