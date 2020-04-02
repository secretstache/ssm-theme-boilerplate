@if( $template['option_status'] )

	<section {!! $id !!} {!! $classes !!} {!! $style !!} >

        @if( $template['option_include_template_header'] )

			@include( 'partials.template-header', [ 'headline' => $template['option_template_headline'], 'subheadline' => $template['option_template_subheadline'] ] )

        @endif

        @if( !empty( $template['columns'] ) )

            <div class="grid-container">

                <div class="grid-x grid-margin-x {{ "align-" . $template['option_x_alignment'] . " align-" . $template['option_y_alignment'] . " has-" . count( $template['columns'] ) . "-cols" }} ">

                    @foreach( $template['columns'] as $key => $column )

						@php
							$width = ($columns_width != null) ? explode( '_', $columns_width )[$key] : 12 / count( $template['columns'] );
							$width = ( count( $template['columns'] ) == 1 && $width == 10 ) ? 12 : $width;

							$medium_order_class = ( $key == 1 && $template['columns'][0]['option_mobile_sort_order'] == 'medium-order-1' ) ? 'medium-order-2' : $column['option_mobile_sort_order'];

							$id = ( $column['option_html_id'] ) ? 'id="' . $column['option_html_id'] . '"' : '';
							$custom_classes = ( $column['option_html_classes'] ) ? " " . $column['option_html_classes'] : '';
							$column_i = $key+1;
						@endphp

                        <div {!! $id !!} class="cell small-11 medium-{{ $width . ' i-' . $column_i }} {{ $medium_order_class }}{{ $custom_classes }}" >

                            <div class="inner">

                                @php
                                    // die(var_dump( $column['modules'] ));
                                @endphp

								@if( !empty( $column['modules'] ) )

									@include( 'switches.modules', ['modules' => $column['modules']] )

								@endif

							</div>

                        </div>

                    @endforeach

				</div>

            </div>

        @endif

    </section>

@endif
