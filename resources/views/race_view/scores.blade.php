<main class="race-view">
    <div class="container page4container">
        <div class="botm-panel">
            <div class="row flex-align-end2 footer_block" style="height: 80px;">
                <div class="cell-md-1">
                    <div class="row record-small2 flex-align-end team_one">
                        <img id="company-logo-left-img" src="{{ url($race->team_one->club->url) }}" />
                    </div>
                </div>

                <div class="cell-md-4">
                    <div class="row record-small2 flex-align-end team_one">
                        <p class="team_one_text" style="">
                            <span style="font-size: 30px;">{{ $race->team_one->name }}</span> <br />
                            <span style="font-size: 16px;">{{ $race->team_one->club->name }}</span>
                        </p>
                    </div>
                </div>

                <div class="cell-md-2">
                    <div class="row record-small2 team_two">
                        <div class="count_num">{{ $race->team_one_points() }}</div>
                        <div><img id="company-logo-left-img" src="{{ url($race->competition->logo_url) }}" /></div>
                        <div class="count_num">{{ $race->team_two_points() }}</div>
                    </div>
                </div>

                <div class="cell-md-4">
                    <div class="row record-small2 flex-align-end team_one">
                        <p class="team_two_text" style="">
                            <span style="font-size: 30px;">{{ $race->team_two->name }}</span> <br />
                            <span style="font-size: 16px;">{{ $race->team_two->club->name }}</span>
                        </p>
                    </div>
                </div>

                <div class="cell-md-1">
                    <div class="row record-small2 flex-align-end team_second_line">
                        <div style="margin-left: auto; display: block;"><img id="company-logo-right-img" src="{{ url($race->team_two->club->url) }}" /></div>
                    </div>
                </div>
            </div>

            <div class="row flex-align-end2 footer_block" style="height: 30px;">
                <div class="cell-md-4">
                    <div class="row record-small2 flex-align-end team_second_line">
                        <p id="subline_one">{{ $race->competition->address }}</p>
                    </div>
                </div>

                <div class="cell-md-4">
                    <div class="row record-small2 flex-align-end team_second_line">
                        <p class="subline_blocks">Division {{ $race->division }}&nbsp;&nbsp; Race {{ $race->race_no }}&nbsp;&nbsp; Heat {{ $heat }}&nbsp;&nbsp;Best 3 of 5</p>
                    </div>
                </div>

                <div class="cell-md-4">
                    <div class="row record-small2 flex-align-end team_second_line">
                        <p style="width: 100%; font-size: 20px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
