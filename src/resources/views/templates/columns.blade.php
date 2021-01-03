@if( $template['option_status'] )

	<section {!! $id !!} {!! $classes !!} {!! $style !!} >

        @if( $template['include_template_header'] )

			@include( 'partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_subheadline'] ] )

        @endif

        @if( !empty( $template['columns'] ) )

            <div class="grid-container">

                <div class="grid-x grid-margin-x {{ "align-" . $template['option_x_alignment'] . " align-" . $template['option_y_alignment'] . " has-" . count( $template['columns'] ) . "-cols" }} ">

                    @foreach( $template['columns'] as $key => $column )

						@php
							$width = ($columns_width != null) ? explode( '_', $columns_width )[$key] : 12 / count( $template['columns'] );
							$width = ( count( $template['columns'] ) == 1 && $width == 10 ) ? 12 : $width;

							$id = ( $column['option_html_id'] ) ? 'id="' . $column['option_html_id'] . '"' : '';
							$custom_classes = ( $column['option_html_classes'] ) ? " " . $column['option_html_classes'] : '';
							$column_i = $key+1;
							$columns_mobile_order = explode( '_', $template['option_columns_mobile_order'] );
						@endphp

                        <div {!! $id !!} class="cell small-11 medium-{{ $width }} medium-order-{!! $column_i !!} small-order-{!! $columns_mobile_order[$key] ?: 1 !!} {{ $custom_classes }}" >

                            <div class="inner">

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
