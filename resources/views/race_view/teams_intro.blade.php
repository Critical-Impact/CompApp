<!DOCTYPE html>
<html lang="en" style="background:#00ff00;">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <meta name="viewport" content="" />

    <!-- Metro 4 -->

    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css" />

    <link rel="stylesheet" href="style2.css" />


    <title>Dog View - Race # {{ $race->race_no }} - Heat #{{ $heat }}</title>

    <style>

        body {
            padding-top: 0px;
        }



        @media screen and (min-width: 992px) {
            .hero-desc {
                text-align: left;
                margin-left: 70px;
                margin-top: 0;
            }
        }

        @media screen and (min-width: 640px) {
            .login-form {
                width: 500px;
            }
        }

        .container {
            max-width: 1200px;
        }

        .record {
            background-color: rgb(255, 204, 1);
            margin-bottom: 7px;

            font-size: 1.5em;


        }

        .record [class*=cell] {
            padding-top: 7px;
            padding-bottom: 7px;
            font-weight: 600;
            text-align: center;
            font-size:1.0rem;
        }

        .record-small {

            margin-bottom: 5px;
            margin-top: 19px;
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */

        }

        .team_two {
            color: rgb(162, 217, 203);
            background-color: rgb(1, 0, 64);
        }
        .team_one {
            background-color: rgb(255, 204, 1);
            color: black;
        }

        .record-small [class*=cell] {
            padding-top: 3px;
            padding-bottom: 3px;
            font-weight: 600;
            text-align: center;

        }


        .teamlogo {
            padding-bottom: 8px;

            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);

        }

        .teamlogo img {
            width: 165px;
            height:166px;
        }


        .divlogo {
            padding-bottom: 8px;
            background-color: black;
            padding: 15px 15px 8px 15px;
            padding: 10px 5px 5px 5px;
        }

        .divlogo img {
            width: 165px;
        }


        .divlogo p {
            margin-top: 0;
            font-size: 24px;
            color: rgb(255, 204, 1);
            font-weight: 600;
        }

    </style>
</head>
<body style="background:#00ff00;">
<main>
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

<footer></footer>
</body>
</html>
