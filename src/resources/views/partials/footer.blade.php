<footer class="site-footer">

	@if( !$is_landing_page )

		<div class="grid-container">

			<div class="grid-x grid-margin-x">

				<div class="cell small-11 medium-4">

					@if ( $logo = get_field( 'brand_logo', 'options' ) )

						<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="editable-svg logo">
						
					@endif

				</div>

			</div>

		</div>

	@endif

	<div class="bottom">

		<div class="grid-container">

			<div class="grid-x grid-margin-x align-justify align-center">

				@if ( $copyright = get_field('footer_copyright', 'options') )

					<div class="cell shrink">{!! wpautop( $copyright ) !!}</div>

				@endif

				@if ( !$is_landing_page )

					<div class="cell shrink">

						<div class="socials">

							<ul>

								@if ( $facebook = get_field('facebook', 'options') )
									<li><a target="_blank" class="facebook" href="{{ $facebook }}"></a></li>
								@endif

								@if ( $twitter = get_field('twitter', 'options') )
									<li><a target="_blank" class="twitter" href="{{ $twitter }}"></a></li>
								@endif

								@if ( $instagram = get_field('instagram', 'options') )
									<li><a target="_blank" class="instagram" href="{{ $instagram }}"><i class="fab fa-instagram"></i></a></li>
								@endif

							</ul>

						</div>

					</div>

				@endif

			</div>

		</div>

	</div>

</footer>