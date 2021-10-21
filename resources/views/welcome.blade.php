<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="VM Jewels Billing & Inventory Management System" name="description">
    <meta content="VM Jewels Private Limited" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="vm jewels,  EKLINGJI GEMS, VM JEWELS,  EKLINGJI GEMS, Inventory Management System, VM Jewels Billing, VM Jewels Billing & Inventory Management System," />

    <!-- Title -->
    <title>VM Jewels Billing & Inventory Management System</title>

    <!--Favicon -->
    <link rel="icon" href="{{ asset('assets\images\company_logo\vmjewels.jpeg') }}" type="image/x-icon" />
    <!--Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .c_main {
            margin: 160px auto;
        }

        .c_child {
            display: flex;
            justify-content: center;
            margin: 0px 20px;
        }

        .leftCard,
        .rightCard {
            margin: 0px 20px;
        }

        .card-title111 {
            color: darkcyan;
            font-weight: 700;
        }

        .card-title111:hover {}

        .btn111 {
            background: #0c4d7b;
            color: white;
        }

        .btn111:hover {
            background: #ffffff;
            color: #0c4d7b;
            text-decoration: none;
            border: 2px #0c4d7b solid;
        }

        .fa-arrow-right111 {
            padding-left: 10px;
        }

        @media only screen and (max-width: 600px) {
            .c_main {
                margin: 40px 40px;
            }

            .c_child {
                display: block;
            }

            .leftCard,
            .rightCard {
                margin: 20px auto;
            }

        }

    </style>
</head>

<body style="background: lavenderblush;">

    <div class="c_main">
        <div class="c_child">
            <a href="/VMJEWEL">
                <div class="leftCard">
                    <div class="card" style="width: 18rem;">
                        <img src="assets\images\company_logo\vmjewels.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title card-title111">VM JEWELS</h5>
                            </center>

                            <center> <a href="/VMJEWEL" class="btn btn111">Explore<i
                                        class="fa fa-arrow-right fa-arrow-right111" aria-hidden="true"></i></a></center>

                        </div>
                    </div>
                </div>
            </a>
            <a href="/EKLINGJI">
                <div class="rightCard">
                    <div class="card" style="width: 18rem;">
                        <img src="assets\images\company_logo\Eklingi_jewel.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title card-title111 "> EKLINGJI GEMS</h5>
                            </center>

                            <center><a href="/EKLINGJI" class="btn btn111">Explore<i
                                        class="fa fa-arrow-right fa-arrow-right111" aria-hidden="true"></i></a>
                            </center>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
