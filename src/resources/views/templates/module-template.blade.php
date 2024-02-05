@if ( $modules_template = get_field( 'modules', $module['module_id'] ) )

    @foreach ( $modules_template as $module )

        @include( 'modules.' . $module['acf_fc_layout'] )

    @endforeach
    
@endif