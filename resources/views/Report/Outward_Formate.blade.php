<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Bill Formate</title>
    <style>
        .tabel_style {
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            margin: 2% 2%;
        }

        .invoice {
            width: 700px;
            padding: 1%;
            border: 1px solid black;
        }

        .logo {
            width: 100%;
            border-bottom: 2px solid blue;
        }

        .address {
            width: 100%;
            margin: 1%;
        }

        h6 {
            color: blue;
        }

        .card-header {
            border: 1px solid black;
        }

        .card-body {
            padding: 0%;
            padding-top: 1%;
        }

        .tr {
            text-align: center;
        }

        .card-body-header {
            border-bottom: 2px solid black;
        }

        .Description-body {
            margin: 0%;
        }


        .card-footer {
            width: 100%;
            padding: 0%;
            padding-top: 1%;
        }

        .footer-left {
            width: 45%;
            border: 1px solid black;
            float: left;
        }

        .footer-right {
            width: 45%;
            border: 1px solid black;
            float: right;
            text-align: right;
        }

        td {
            boder: 1px solid black;
        }

        tr {
            border: 1px solid black;
        }

    </style>
</head>



<body style="margin: 0; padding: 0; background-color:#eaeced " bgcolor="#eaeced">
    <div class="row tabel_style">
        <div class="col-12 invoice">
            <!--div-->
            <div class="card1">
                <div class="card-header-outer">
                    <div class="card-header">
                        <div class="card-title logo">
                            <h6>|| શ્રી ગણેશાય નામ: ||</h6>

                            <img src="logo11.png" alt="">
                        </div>
                        <div class="address-style">
                            <p class="address">4th Floor,Plot No. 39/40, Gopinath Complex, Kapur Vadi,Khodiyar
                                Vadi, Khodiyar Nagar Road Varchha Road, Surat.</p>
                            <p class="address"> Mo.98797 52760 | Email : vmjewel1001@gmail.com</p>
                            <p class="address"><b>GSTIN : 24AMKPP522GH1ZZ</b></p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div style="border: 1px solid royalblue">
                        <div class="card-body-header">
                            <p style="margin-bottom: 0%; display:flex; justify-content:space-around; flex-wrap:wrap;">
                                To, @if ($s_name->isEmpty())
                                    <h3>All Party Jangad Report</h3>

                                @else
                                    <h3>{{ $s_name[0]['s_name'] }}</h3>
                                @endif
                                Date:-{{ date('d-m-Y', strtotime($date)) }}
                            </p>
                            <br>
                            <p style="margin-top: 0%;">
                                Through_______________________________________Mobile______________________</p>
                            <p class="Description-body">Please recevie the following pollished good on approval & or for
                                asortment or for processing to sale</p>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Barcode_Id</th>
                                        <th class="border-bottom-0">Pcs</th>
                                        <th class="border-bottom-0">Weight</th>
                                        <th class="border-bottom-0">per(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($inward as $key => $value)
                                        <tr>
                                            {{-- @if ($value->s_id == 8) --}}

                                            @php
                                                $count = $count + 1;
                                            @endphp

                                            <td>
                                                {{ $key + 1 }}
                                            </td>

                                            <td>
                                                {{ $value->d_barcode }}
                                            </td>

                                            <td>
                                                @php
                                                    if (empty($value->d_pc)) {
                                                        echo 1;
                                                    } else {
                                                        echo $value->d_pc;
                                                    }
                                                @endphp
                                                {{-- {{ $value->d_pc }} --}}
                                            </td>
                                            {{-- <td>
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                            <td>
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td>
                                                {{ $value->price }}
                                            </td>


                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="footer-left">
                        <p>Received the above goods as per conditions</p><br><br><br>
                        <p>Through Signature Receiver's Signature</p>
                    </div>
                    <div class="footer-right">
                        <p class="pr-2">For Vm Jewel</p><br><br><br><br>
                        <p class="pr-2">Proprietor / Auth Signature</p>
                    </div>
                </div>

            </div>
            <!--/div-->
        </div>
    </div>
</body>

</html>
