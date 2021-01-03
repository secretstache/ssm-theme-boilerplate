@if( !post_password_required() )

    @if( $data['headline'] )

        @php

            $args = array(
				"option_background"	=> $data['option_background'],
				"option_background_image" => $data['option_background_image'],
				"option_background_color" => $data['option_background_color'],
				"option_html_classes" => $data['option_html_classes'],
				"option_html_id" => $data['option_html_id'],
			);

            $classes = $builder->getCustomClasses( 'hero-unit', '', '', $args );
            $id = $builder->getCustomID( $args );
            $style = ( $data['option_background'] == 'image' && !is_null( $data['option_background_image'] ) ) ? ' style="background-image: url(' . $data['option_background_image']['url'] . ')" ' : '';
        
        @endphp

        @include( 'templates.hero-unit', ['classes' => $classes, 'id' => $id, 'style' => $style, 'headline' => $data['headline'], 'subheadline' => $data['subheadline'] ] )

    @endif

	@if( $data['templates'] )

		@include( 'switches.templates', ['templates' => $data['templates'] ] )

    @endif
    
@else 

    @include( 'partials.password-form' )

@endif