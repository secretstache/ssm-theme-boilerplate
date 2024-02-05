@if( $modules )

    @foreach( $modules as $module )

        @if ( $module['acf_fc_layout'] == 'module-template' )

            @include( 'templates.module-template', [ 'module' => $module ] )
            
        @else 

            @include( 'modules.' . $module['acf_fc_layout'] )

        @endif

    @endforeach

@endif