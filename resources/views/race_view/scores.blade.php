<!DOCTYPE html>
<html lang="en" style="background:#00ff00;">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <meta name="viewport" content="" />

    <!-- Metro 4 -->

    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css" />

    <link rel="stylesheet" href="style3.css" />

    <title>Race View - Race # {{ $race->race_no }} - Heat #{{ $heat }}</title>
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

        /*# sourceMappingURL=aistant.css.map */

        .container {
            max-width: 1400px;
        }

        .record {
            background-color: rgb(255, 204, 1);
            margin-bottom: 7px;

            font-size: 1.5em;
        }

        .record [class*="cell"] {
            padding-top: 7px;
            padding-bottom: 7px;
            font-weight: 600;
            text-align: center;
            word-break: break-all;
        }

        .record-small {
            margin-bottom: 5px;
            margin-top: 19px;
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */
        }

        .record-small [class*="cell"] {
            padding-top: 3px;
            padding-bottom: 3px;
            font-weight: 600;
            text-align: center;
        }

        .teamlogo {
            padding-bottom: 8px;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .teamlogo img {
            width: 165px;
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

        /* STYLE 2

        .footer_block {
              position: fixed;

          bottom: 0;


            display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        flex-flow: row nowrap;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        height: 56px;
        width: 90%;

        bottom: 0;








        } */

        .team_two {
            color: rgb(162, 217, 203);
            /*	background-color: rgb(1, 0, 64); */

            background-color: black;
            min-height: 80px;
        }

        .team_second_line {
            background-color: black;
            color: rgb(255, 204, 1);
            min-height: 40px;
        }

        #subline_one {
            margin-left: 10px;
            margin-bottom: 9px;
            font-size: 16px;
        }

        .subline_blocks {
            margin-bottom: 9px;
            font-size: 16px;

            text-align: center;
            width: 100%;
        }

        .count_num {
            width: 60px;

            font-size: 60px;
            margin: auto auto;
            display: block;
            position: relative;
            text-align: center;
            background-color: black;
            color: rgb(255, 204, 1);
        }

        .team_one {
            /*	background-color: rgb(255, 204, 1);
            color: black; */
            background-color: black;
            color: white;

            min-height: 80px;
        }

        .team_one_text {
            width: 100%;
            font-size: 20px;
            margin-bottom: 7px;
            color: white;
            line-height: 1.25em;
        }

        .team_two_text {
            width: 100%;
            font-size: 20px;
            margin-bottom: 7px;
            color: white;
            line-height: 1.25em;
            text-align: right;
        }

        main {
            height: 100%;
        }

        .botm-panel {
            position: fixed;
            width: 1400px;
            bottom: 0;
            margin-bottom: 50px;
        }

        #company-logo-left-img {
            height: 80px;
            width: 80px;
        }

        #company-logo-right-img {
            height: 80px;
            width: 80px;
        }

        .page4container {
            padding-left: 0;
            padding-right: 0;
        }

        .record-small2 {
            font-size: 1.2em;
            word-break: break-all;

            /* position: absolute; */
        }

        .record-small2 [class*="cell"] {
            font-weight: 600;
            text-align: center;
        }

    </style>
</head>
<body style="background:#00ff00;">
<main>
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

<footer></footer>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>
</html>
