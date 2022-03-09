<main class="dogs-view">
    <div class="container-fluid p-4 p-20-md flex-justify-center">
        <div class="container">
            <div class="row">
                <div class="cell-5" style="">
                    <div class="img-container text-center teamlogo">
                        <img id="company-logo-left-img" width="80px" height="80px" src="{{ url($race->team_one->club->url) }}" />
                    </div>
                </div>

                <div class="cell-2" style="">
                    <div class="img-container text-center divlogo">
                        <img id="company-logo-left-img" width="80px" height="80px" src="{{ url($race->competition->logo_url) }}" />

                        <p>
                            Race {{ $race->race_no  }} <br />
                            Division {{ $race->division }}
                        </p>
                    </div>
                </div>

                <div class="cell-5" style="">
                    <div class="img-container text-center teamlogo">
                        <img id="company-logo-left-img" src="{{ url($race->team_two->club->url) }}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="cell-md-5">
                    <div class="row record team_one">
                        <div class="cell-12" style="background-color: {{ $race->team_one->club->color_one }};color: {{ $race->team_one->club->color_two }};"><div>{{ $race->team_one->name }}</div></div>
                    </div>
                    @php /** @var App\Models\Dog $dog */ @endphp
                    @if (count($race->team_one->dogs) === 0)
                        <div class="row record team_one" style="background-color: {{ $race->team_one->club->color_one }};color: {{ $race->team_one->club->color_two }};">
                            <div class="cell-12"><div>No dogs entered.</div></div>
                        </div>
                    @endif
                    @foreach ($race->team_one->dogs as $dog)
                        <div class="row record team_one" style="background-color: {{ $race->team_one->club->color_one }};color: {{ $race->team_one->club->color_two }};">
                            <div class="cell-2" ><div>{{ $dog->crn }}</div></div>
                            <div class="cell-2"><div>{{ $dog->name }}</div></div>
                            <div class="cell-5"><div>{{ $dog->breed }}</div></div>
                            <div class="cell-3"><div>{{ $dog->title }}</div></div>
                        </div>
                    @endforeach
                </div>

                <div class="cell-md-5 offset-2">
                    <div class="row record team_two">
                        <div class="cell-12" style="background-color: {{ $race->team_two->club->color_one }};color: {{ $race->team_two->club->color_two }};"><div>{{ $race->team_two->name }}</div></div>
                    </div>
                    @php /** @var App\Models\Dog $dog */ @endphp
                    @if (count($race->team_two->dogs) === 0)
                        <div class="row record team_two" style="background-color: {{ $race->team_two->club->color_one }};color: {{ $race->team_two->club->color_two }};">
                            <div class="cell-12"><div>No dogs entered.</div></div>
                        </div>
                    @endif
                    @foreach ($race->team_two->dogs as $dog)
                        <div class="row record team_two" style="background-color: {{ $race->team_two->club->color_one }};color: {{ $race->team_two->club->color_two }};">
                            <div class="cell-2" ><div>{{ $dog->crn }}</div></div>
                            <div class="cell-2"><div>{{ $dog->name }}</div></div>
                            <div class="cell-5"><div>{{ $dog->breed }}</div></div>
                            <div class="cell-3"><div>{{ $dog->title }}</div></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row flex-align-end">
                <div class="cell-md-5">
                    <div class="row record-small flex-align-end team_one" style="background-color: {{ $race->team_one->club->color_one }};color: {{ $race->team_one->club->color_two }};">
                        <div class="cell-5"><div>Seed time: {{ $race->team_one->seed_time }}</div></div>
                        <div class="cell-7"><div>Best time this Comp: {{ $race->best_time_team_one() }}</div></div>
                    </div>
                </div>

                <div class="cell-md-5 offset-2">
                    <div class="row record-small team_two" style="background-color: {{ $race->team_two->club->color_one }};color: {{ $race->team_two->club->color_two }};">
                        <div class="cell-5"><div>Seed time: {{ $race->team_two->seed_time }}</div></div>
                        <div class="cell-7"><div>Best time this Comp: {{ $race->best_time_team_two() }}</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
