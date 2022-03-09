<!DOCTYPE html>
<html lang="en" style="background:#00ff00;">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <meta name="viewport" content="" />

    <!-- Metro 4 -->

    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <title>Race View - Race {{ $competition->name }}</title>
    <style>


        body {
            padding-top: 0px;
        }



        @media screen and (min-width: 992px) {
            .dogs-view .hero-desc {
                text-align: left;
                margin-left: 70px;
                margin-top: 0;
            }
        }

        @media screen and (min-width: 640px) {
            .dogs-view .login-form {
                width: 500px;
            }
        }

        .dogs-view .container {
            max-width: 1200px;
        }

        .dogs-view .record {
            background-color: rgb(255, 204, 1);
            margin-bottom: 7px;

            font-size: 1.5em;


        }

        .dogs-view .record [class*=cell] {
            padding-top: 7px;
            padding-bottom: 7px;
            font-weight: 600;
            text-align: center;
            font-size:1.0rem;
        }

        .dogs-view .record-small {

            margin-bottom: 5px;
            margin-top: 19px;
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */

        }

        .dogs-view .team_two {
            color: rgb(162, 217, 203);
            background-color: rgb(1, 0, 64);
        }
        .dogs-view .team_one {
            background-color: rgb(255, 204, 1);
            color: black;
        }

        .dogs-view .record-small [class*=cell] {
            padding-top: 3px;
            padding-bottom: 3px;
            font-weight: 600;
            text-align: center;

        }


        .dogs-view .teamlogo {
            padding-bottom: 8px;

            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);

        }

        .dogs-view .teamlogo img {
            width: 165px;
            height:166px;
        }


        .dogs-view .divlogo {
            padding-bottom: 8px;
            background-color: black;
            padding: 15px 15px 8px 15px;
            padding: 10px 5px 5px 5px;
        }

        .dogs-view .divlogo img {
            width: 165px;
        }


        .dogs-view .divlogo p {
            margin-top: 0;
            font-size: 24px;
            color: rgb(255, 204, 1);
            font-weight: 600;
        }


        body {
            padding-top: 0px;
        }

        @media screen and (min-width: 992px) {
            .race-view .hero-desc {
                text-align: left;
                margin-left: 70px;
                margin-top: 0;
            }
        }

        @media screen and (min-width: 640px) {
            .race-view .login-form {
                width: 500px;
            }
        }

        /*# sourceMappingURL=aistant.css.map */

        .race-view .container {
            max-width: 1400px;
        }

        .race-view .record {
            background-color: rgb(255, 204, 1);
            margin-bottom: 7px;

            font-size: 1.5em;
        }

        .race-view .record [class*="cell"] {
            padding-top: 7px;
            padding-bottom: 7px;
            font-weight: 600;
            text-align: center;
            word-break: break-all;
        }

        .race-view .record-small {
            margin-bottom: 5px;
            margin-top: 19px;
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */
        }

        .race-view .record-small [class*="cell"] {
            padding-top: 3px;
            padding-bottom: 3px;
            font-weight: 600;
            text-align: center;
        }

        .race-view .teamlogo {
            padding-bottom: 8px;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .race-view .teamlogo img {
            width: 165px;
        }

        .race-view .divlogo {
            padding-bottom: 8px;
            background-color: black;
            padding: 15px 15px 8px 15px;
            padding: 10px 5px 5px 5px;
        }

        .race-view .divlogo img {
            width: 165px;
        }

        .race-view .divlogo p {
            margin-top: 0;
            font-size: 24px;
            color: rgb(255, 204, 1);
            font-weight: 600;
        }

        .race-view .team_two {
            color: rgb(162, 217, 203);
            background-color: black;
            min-height: 80px;
        }

        .race-view .team_second_line {
            background-color: black;
            color: rgb(255, 204, 1);
            min-height: 40px;
        }

        .race-view #subline_one {
            margin-left: 10px;
            margin-bottom: 9px;
            font-size: 16px;
        }

        .race-view .subline_blocks {
            margin-bottom: 9px;
            font-size: 16px;

            text-align: center;
            width: 100%;
        }

        .race-view .count_num {
            width: 60px;

            font-size: 60px;
            margin: auto auto;
            display: block;
            position: relative;
            text-align: center;
            background-color: black;
            color: rgb(255, 204, 1);
        }

        .race-view .team_one {
            background-color: black;
            color: white;

            min-height: 80px;
        }

        .race-view .team_one_text {
            width: 100%;
            font-size: 20px;
            margin-bottom: 7px;
            color: white;
            line-height: 1.25em;
        }

        .race-view .team_two_text {
            width: 100%;
            font-size: 20px;
            margin-bottom: 7px;
            color: white;
            line-height: 1.25em;
            text-align: right;
        }

        .race-view main {
            height: 100%;
        }

        .race-view .botm-panel {
            position: fixed;
            width: 1400px;
            bottom: 0;
            margin-bottom: 50px;
        }

        .race-view #company-logo-left-img {
            height: 80px;
            width: 80px;
        }

        .race-view #company-logo-right-img {
            height: 80px;
            width: 80px;
        }

        .race-view .page4container {
            padding-left: 0;
            padding-right: 0;
        }

        .race-view .record-small2 {
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */
        }

        .race-view .record-small2 [class*="cell"] {
            font-weight: 600;
            text-align: center;
        }

    </style>
</head>
<body style="background:#00ff00;">
<div class="ajax">
    @if($competition->active_race_id && $competition->active_heat && $competition->active_screen)
        @if($competition->active_screen === "race_view")
            @include('race_view.scores', ['race' => $competition->active_race, 'heat' => $competition->active_heat, 'include_html' => false])
        @endif
        @if($competition->active_screen === "dog_view")
            @include('race_view.teams_intro', ['race' => $competition->active_race, 'heat' => $competition->active_heat, 'include_html' => false])
        @endif
        @if($competition->active_screen === "blank")
            @include('race_view.blank')
        @endif
    @endif
</div>
</body>
<footer></footer>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        var competitionId = {{ $competition->id }};
        var activeRaceId = {{ $competition->active_race_id }};
        var activeHeat = {{ $competition->active_heat }};
        var activeScreen = "{{ $competition->active_screen }}";

        function checkActivePage() {
            window.setTimeout(function () {
                $.get("{{ action([\App\Http\Controllers\RaceViewController::class, "competitionDetails"], ["competition" => $competition]) }}", {}, function (result) {
                        if (activeRaceId !== result.active_race_id || activeHeat !== result.active_heat || activeScreen !== result.active_screen) {
                            location.reload();
                        }
                        else {
                            checkActivePage();
                        }
                    }, 'json'
                )
            }, 500)
        }

        checkActivePage();

    })
</script>
</html>
