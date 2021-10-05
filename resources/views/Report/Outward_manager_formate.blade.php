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
                            {{-- <h6>|| શ્રી ગણેશાય નામ: ||</h6> --}}

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
                            <p style="margin-bottom: 0%; display:flex; justify-content:space-around; flex-wrap:nowrap;">
                                To, @if ($s_name->isEmpty())
                                    <h3>All Manager Jangad Report</h3>

                                @else
                                    <h3>{{ $s_name[0]['m_name'] }}</h3>
                                @endif
                                Date:-{{ date('d-m-Y', strtotime($date)) }}</p>
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
                                        <th class="border-bottom-0" style="border: 1px solid black">#</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Barcode_Id</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Pcs</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">per(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($outward_manager as $key => $value)

                                        {{-- @if ($value->s_id == 8) --}}

                                        @php
                                            $count = $count + 1;
                                        @endphp
                                        <tr style="border: 1px solid black">
                                            <td style="border: 1px solid black">
                                                {{ $key + 1 }}
                                            </td>
                                            {{-- <td style="border: 1px solid black">
                                                    @php
                                                        $s_id = $value->s_id;
                                                        $s_name = App\Models\supplier_details::where('s_id', $s_id)->get('s_name');
                                                        // echo $s_name;
                                                    @endphp
                                                    {{ $s_name[0]['s_name'] }}
                                                </td> --}}
                                            <td style="border: 1px solid black">
                                                {{ $value->d_barcode }}
                                            </td>
                                            {{-- <td style="border: 1px solid black">
                                                    @php
                                                        $shape_id = $value->shape_id;
                                                        $shape_name = App\Models\diamond_shape::where('shape_id', $shape_id)->get('shape_name');
                                                        // echo $s_name;
                                                    @endphp
                                                    {{ $shape_name[0]['shape_name'] }}
                                                </td> --}}
                                            {{-- <td style="border: 1px solid black">
                                                    {{ $value->d_wt }}
                                                </td> --}}
                                            <td style="border: 1px solid black">
                                                @php
                                                    if (empty($value->d_pc)) {
                                                        echo 1;
                                                    } else {
                                                        echo $value->d_pc;
                                                    }
                                                @endphp
                                                {{-- {{ $value->d_pc }} --}}
                                            </td>
                                            {{-- <td style="border: 1px solid black">
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                            <td style="border: 1px solid black">
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->price }}
                                            </td>
                                            {{-- <td style="border: 1px solid black">
                                                    {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                                </td>
                                                <td style="border: 1px solid black">
                                                    {{ date('d-m-Y', strtotime($value->updated_at)) }}
                                                </td> --}}

                                        </tr>
                                        {{-- @endif --}}
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
                        <p class="pr-2">For Vm Jewel</p><br><br><br>
                        <p class="pr-2">Proprietor / Auth Signature</p>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
</body>

</html>
