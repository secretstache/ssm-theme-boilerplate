@if( !post_password_required() )

    @if( $data['headline'] )

        @php

            $template = array(
				"option_background"	=> $data['option_background'],
				"option_background_image" => $data['option_background_image'],
				"option_background_color" => $data['option_background_color'],
				"option_html_classes" => $data['option_html_classes'],
				"option_html_id" => $data['option_html_id'],
			);

            $classes = $builder->getCustomClasses( "template", 'hero-unit', '', $template );
            $id = $builder->getCustomID( $template );
            $style = ( $template['option_background'] == 'image' && !is_null( $template['option_background_image'] ) ) ? ' style="background-image: url(' . $template['option_background_image']['url'] . ')" ' : '';
        
        @endphp

        @include( 'templates.hero-unit', ['classes' => $classes, 'id' => $id, 'style' => $style, 'template' => $template, 'headline' => $data['headline'], 'subheadline' => $data['subheadline'] ] )

    @endif

	@if( $data['templates'] )

		@include( 'switches.templates', ['templates' => $data['templates']->toArray() ] )

	@endif

@endif