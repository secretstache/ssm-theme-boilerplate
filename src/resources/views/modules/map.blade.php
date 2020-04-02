<div {!! $id !!} {!! $classes !!} >

    @if ( $physical_address = get_field('physical_address', 'options') )

        @if ($builder)

            <div id="map" style="position: relative; overflow: hidden;">
                <iframe class="gmap" src="https://www.google.com/maps?q=<?php echo $builder->getMapAddress( $physical_address ) ?>&output=embed"></iframe>
            </div>

            <p><a target="_blank" class="get-directions" href="https://maps.google.com/?q=<?php echo $builder->getMapAddress( $physical_address ) ?>">Get Directions</a></p>

        @endif

    @endif

</div>
