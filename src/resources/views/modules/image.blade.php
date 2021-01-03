<picture {!! $id !!} {!! $classes !!} >

    @if ( $add_image_link )

        @if ( $source == 'internal' && $module['option_image_link_page_id'] )

            <a href="{!! get_permalink( $module['option_image_link_page_id'] ) !!}">

        @elseif( $source == 'custom' && $module['option_image_link_url'] )

            <a href="{!! $module['option_image_link_url'] !!}" target="_blank">
        
        @endif
    
    @endif
            
        <source media="(min-width: 768px)" srcset="{!! $src !!}" alt="{!! $alt !!}" />

        @if( $src_mobile )
            <source media="(min-width: 320px)" srcset="{!! $src_mobile !!}" alt="{!! $alt !!}">
        @endif

        <img src="{!! $src !!}" alt="{!! $alt !!}" />

    @if ( $add_image_link )
        </a>
    @endif

</picture>

