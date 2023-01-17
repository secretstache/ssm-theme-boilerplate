@if( $template['option_status'] && $template['template_id'] )

    @if ( $template['template_id'] )

        @php $content_block_template = get_field( 'templates', $template['template_id'] ); @endphp

        @include( 'switches.templates', [ 'templates' => $content_block_template, 'template_page_id' => $template['template_id']->ID ] )
        
    @endif
    
@endif