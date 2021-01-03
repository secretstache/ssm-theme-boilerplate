<div {!! $id !!} {!! $classes !!}>

    @if ( $form_id )

        @php echo do_shortcode('[gravityform id=' . $form_id . ' title=false description=false ajax=true ]') @endphp

    @endif

</div>