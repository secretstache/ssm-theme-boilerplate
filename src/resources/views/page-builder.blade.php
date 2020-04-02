@if( !post_password_required() )

    @if( $data['headline'] )

        @php $classes = $builder->getCustomClasses( "template", 'hero-unit', '', $template ); @endphp

        @include( 'templates.hero-unit', ['classes' => $classes, 'headline' => $data['headline'], 'subheadline' => $data['subheadline'] ] )

    @endif

	@if( $data['templates'] )

		@include( 'switches.templates', ['templates' => $data['templates']->toArray() ] )

	@endif

@endif