<div {!! $id !!} {!! $classes !!} >

    <div class="responsive-embed widescreen">

        @php $oembed = preg_replace('/src="(.+?)"/', 'src="$1&rel=0"', $video); @endphp

        {!! $oembed !!}

    </div>

</div>