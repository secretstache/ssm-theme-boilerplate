<div {!! $wrapper_id !!} {!! $wrapper_classes !!} >

	@if ( $buttons )

		@foreach ( $buttons as $button )

			<div class="button-wrap">

				@php
					$inner_classes = ( $button['option_html_classes'] ) ? " " . $button['option_html_classes'] : '';
					$inner_id = $builder->getCustomID( $button );
				@endphp

				@if ( $button['button_source'] == 'internal' )

					@if ( $button['button_label'] && $button['button_page_id'] )

						<a {!! $inner_id !!} class="button{!! $inner_classes !!}" href="{!! get_permalink( $button['button_page_id'] ) !!}" target="{!! $button['option_button_target'] !!}">{!! $button['button_label'] !!}</a>

					@endif

				@else

					@if ( $button['button_label'] && $button['button_url'] )

						<a {!! $inner_id !!} class="button{!! $inner_classes !!}" href="{!! $button['button_url'] !!}" target="{!! $button['option_button_target'] !!}">{!! $button['button_label'] !!}</a>

					@endif

				@endif

			</div>

		@endforeach

	@endif

</div>
