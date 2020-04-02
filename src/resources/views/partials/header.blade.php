<header class="site-header">

	<div class="grid-container">

		@php $alignment = $is_landing_page ? 'center' : 'justify'; @endphp

		<div class="grid-x grid-margin-x align-middle align-{{ $alignment }}">

			<div class="brand cell shrink">

				@php $link = $is_landing_page ? false : true; @endphp

				@if ($link)
					<a href="{{home_url()}}">
				@endif

					@if ($logo = get_field('brand_logo', 'options'))

						@if ($icon = get_field('brand_icon', 'options'))
							<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="logo show-for-medium">
							<img src="{{ $icon['url'] }}" alt="{{ $icon['alt'] }}" class="icon hide-for-medium">
						@else
							<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="logo">
						@endif

					@else
						<span class="site-title">{{ $siteName }}</span>
					@endif

				@if($link)
					</a>
				@endif

			</div>

			@if ( !$is_landing_page && has_nav_menu('primary_navigation') )

				<nav class="primary-navigation cell shrink">

					@php wp_nav_menu( $builder->getMenuArgs('primary_navigation') ); @endphp
					
					@include( 'partials.hamburger' )

				</nav>

			@endif

		</div>

	</div>
  
</header>