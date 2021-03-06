@extends('backstage.counter.layouts.master')
<head>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }

        ::selection {
            background-color: #eee;
        }

        ::-moz-selection {
            background-color: #eee;
        }

        body {
            font-size: 16px;
            background-color: #269686;
        }

        .theatre {
            margin: 20px auto;
            width: 100%;
            max-width: 1500px;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px 30px;
            box-shadow: 0px 0px 17px -4px #000;
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 9.09%;
            height: 60px;
            padding: 5px;
            position: relative;
        }

        .seat:nth-child(5) {
            margin-right: 9.09%;
        }

        .seat input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }

        .seat input[type="checkbox"]:checked + label {
            background: #bada55;
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
            animation-duration: 300ms;
            animation-fill-mode: both;
        }

        .seat input[type="checkbox"]:disabled + label {
            background: #ddd;
            text-indent: -9999px;
            overflow: hidden;
        }

        .seat input[type="checkbox"]:disabled + label:after {
            content: "X";
            text-indent: 0;
            position: absolute;
            top: 4px;
            left: 50%;
            transform: translate(-50%, 0%);
        }

        .seat input[type="checkbox"]:disabled + label:hover {
            box-shadow: none;
            cursor: not-allowed;
        }

        .seat label {
            display: block;
            position: relative;
            width: 100%;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            line-height: 1.5rem;
            padding: 4px 0;
            color: #fff;
            background: #26a69a;
            border-radius: 2px;
            animation-duration: 300ms;
            animation-fill-mode: both;
            transition-duration: 300ms;
        }

        .seat label:hover {
            cursor: pointer;
            box-shadow: 0px 0 7px 3px #ccc;
        }

        @-webkit-keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        .rubberBand {
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
        }
    </style>
</head>
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體">新增訂位_Booking</font>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <font color="#000000" size="5px" face="微軟正黑體">Step3->選擇身分</font>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
             aria-valuemax="100">75%
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 justify-content-center" style="text-align:center">
            <form class="col-md-6" role="form" style="text-align:right;"
                  action="{{ route('restaurant.member.check',Auth::user()->restaurant_id) }}">
                {{ csrf_field() }}
                <input class="form-control col-md-6 hidden" type="text" name="people" value="{{$people}}">
                @foreach($checks as $check)
                    <input class="form-control col-md-6 hidden" type="text" name="table[]" value="{{$check}}">
                @endforeach
                <button type="submit"
                        style="text-decoration:none; width:300px;height:300px; margin-top: 20px; margin-right: 20px;"
                        class="btn btn-primary">會員<br>member
                </button>
            </form>


            <form class="col-md-6" method="POST" style="text-align:left;"
                  action="{{ route('restaurant.customer.check',Auth::user()->restaurant_id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input class="form-control col-md-6 hidden" type="text" name="people" value="{{$people}}">
                @foreach($checks as $check)
                    <input class="form-control col-md-6 hidden" type="text" name="table[]" value="{{$check}}">
                @endforeach
                <input type="hidden" name="decide" value="<? echo $_SESSION['decide']; ?>">
                <button type="submit"
                        style="text-decoration:none; width:300px;height:300px; margin-top: 20px; margin-right: 20px;"
                        class="btn btn-primary">非會員<br>non-member
                </button>
            </form>
        </div>
    </div>


    <div class="row">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>

@endsection
