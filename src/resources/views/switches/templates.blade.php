@php $column_index = 0; @endphp

@foreach( $templates as $template )

    @switch( $template['acf_fc_layout'] )

        @case('columns')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-columns', '', $template );
                $id = $builder->getCustomID( $template );
                $style = ( $template['option_background'] == 'image' && !is_null( $template['option_background_image'] ) ) ? ' style="background-image: url(' . $template['option_background_image']['url'] . ')" ' : '';
                $columns_width = $builder->getColumnsWidth( $column_index );

                $column_index++;

            @endphp

            @include( 'templates.columns', [ 'classes' => $classes, 'id' => $id, 'style' => $style, 'columns_width' => $columns_width ] )
            @break

        @case('call-to-action')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-cta', '', $template );
                $id = $builder->getCustomID( $template );
                $style = ( $template['option_background'] == 'image' && !is_null( $template['option_background_image'] ) ) ? ' style="background-image: url(' . $template['option_background_image']['url'] . ')" ' : '';

            @endphp

            @include( 'templates.call-to-action', [ 'classes' => $classes, 'id' => $id, 'style' => $style ] )
            @break

    @endswitch

@endforeach
