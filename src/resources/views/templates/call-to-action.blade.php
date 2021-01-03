@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!} {!! $style !!}>

        @if ( $template["option_background"] == "image" || $template["option_background"] == "video" )
            <div class="overlay"></div>
        @endif

        <div class="grid-container">

            <div class="grid-x grid-margin-x align-center">

                <div class="cell small-11 medium-12">

                    <div class="inner">

                        <div class="content">

                            @if ( $headline = $template['headline'] )

                                <h2 class="headline">{!! $headline !!}</h2>

                            @endif

                            @if ( $subheadline = $template['subheadline'] )

                                <h3 class="subheadline">{!! $subheadline !!}</h3>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endif
