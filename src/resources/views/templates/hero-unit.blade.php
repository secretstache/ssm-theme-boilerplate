<section {!! $classes !!}>

    <div class="grid-container">

        <div class="grid-x grid-margin-x">

            <div class="cell small-12">

                @if ( $headline )
                    <h1 class="headline">{!! $headline !!}</h1>
                @endif

                @if ( $subheadline )
                    <h2 class="subheadline">{!! $subheadline !!}</h2>
                @endif
            
            </div>

        </div>

    </div>

</section>