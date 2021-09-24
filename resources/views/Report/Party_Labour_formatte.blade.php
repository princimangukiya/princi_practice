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
                            <p style="margin-bottom: 0%;">
                                To,___________________________________________________Date________________</p>
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
                                        <th class="border-bottom-0">Sizedesc</th>
                                        <th class="border-bottom-0">Pcs</th>
                                        <th class="border-bottom-0">Issue Cts.</th>
                                        <th class="border-bottom-0">Out Cts.</th>
                                        <th class="border-bottom-0">Type</th>
                                        <th class="border-bottom-0">Rate</th>
                                        <th class="border-bottom-0">Labour</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($Pay_labour as $d)
                                        <tr>
                                            @php
                                                
                                                $s_id = $d->s_id;
                                                $sell_stock = App\Models\sell_stock::where('s_id', $s_id)->get();
                                                $daimond = App\Models\D_Purchase::where('s_id', $s_id)->get();
                                                $json_data = App\Models\rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
                                                $json_data = $json_data[0]['json_price'];
                                                $json_decoded = json_decode($json_data);
                                            @endphp
                                            <td>
                                                <b>{{ $d->s_name }}</b>
                                                @php
                                                    $rates = json_decode(showRate($json_decoded, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($rates as $item)
                                                    <br>{{ $item }}
                                                @endforeach
                                                <br><br><b> &nbsp;Total Party:-</b>

                                            </td>
                                            {{-- <td style="display: flex; justify-content:center; "> --}}
                                            <td>
                                                @php
                                                    $daimond_count = json_decode(daimondCount($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($daimond_count as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>

                                            </td>
                                            <td>
                                                @php
                                                    $issuCuts = json_decode(issuCuts($json_decoded, $sell_stock, $daimond, $s_id));
                                                    // var_dump($issuCuts);
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($issuCuts as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $outCuts = json_decode(outCuts($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($outCuts as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td></td>
                                            <td>
                                                @php
                                                    $price = json_decode(showPice($json_decoded, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($price as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $labour = json_decode(showLabour($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($labour as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>

                                        </tr>

                                        {{-- <td> Party Total:-</td> --}}
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

            @php
                function showRate($json_decoded, $s_id)
                {
                    $rate = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        array_push($rate, $wt_category);
                    }
                    return json_encode($rate);
                }
                function daimondCount($json_decoded, $sell_stock, $daimond, $s_id)
                {
                    $daimond_data = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        $count1 = 0;
                        foreach ($daimond as $r) {
                            if ($s_id == $r->s_id) {
                                foreach ($sell_stock as $value) {
                                    if ($value['d_id'] == $r->d_id) {
                                        $daimond_categorie_id = $r->d_wt_category;
                                        if ($r_id == $daimond_categorie_id) {
                                            $count1 = $count1 + 1;
                                        }
                                    }
                                }
                            }
                        }
                        array_push($daimond_data, $count1);
                    }
                    return json_encode($daimond_data);
                }
                function issuCuts($json_decoded, $sell_stock, $daimond, $s_id)
                {
                    $issueCuts = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        $total_weight = 0;
                        $d_weigth = 0;
                
                        foreach ($daimond as $r) {
                            if ($r->s_id == $s_id) {
                                foreach ($sell_stock as $value) {
                                    if ($value['d_id'] == $r->d_id) {
                                        $d_weight_categry = $r->d_wt_category;
                
                                        if ($r_id == $d_weight_categry) {
                                            $d_weight = $total_weight + $r->d_wt;
                                            $total_weight = $d_weight;
                                        }
                                    }
                                }
                            }
                        }
                        array_push($issueCuts, $total_weight);
                    }
                    return json_encode($issueCuts);
                }
                function outCuts($json_decoded, $sell_stock, $daimond, $s_id)
                {
                    $outCuts = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        $d_n_weight = 0;
                        $total_new_weight = 0;
                
                        foreach ($daimond as $r) {
                            if ($r->s_id == $s_id) {
                                foreach ($sell_stock as $value) {
                                    if ($value['d_id'] == $r->d_id) {
                                        $d_weight_categry = $r->d_wt_category;
                
                                        if ($r_id == $d_weight_categry) {
                                            $d_n_wt = $total_new_weight + $r->d_n_wt;
                                            $total_new_weight = $d_n_wt;
                                        }
                                    }
                                }
                            }
                        }
                        array_push($outCuts, $total_new_weight);
                    }
                    return json_encode($outCuts);
                }
                function showPice($json_decoded, $s_id)
                {
                    $price = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        $fetchPrice = $val;
                        array_push($price, $fetchPrice);
                    }
                    return json_encode($price);
                }
                
                function showLabour($json_decoded, $sell_stock, $daimond, $s_id)
                {
                    $labour = [];
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
                        $wt_category = $wt_category[0]['wt_category'];
                        $count1 = 0;
                        $price = 0;
                
                        foreach ($daimond as $r) {
                            if ($r->s_id == $s_id) {
                                foreach ($sell_stock as $value) {
                                    if ($value['d_id'] == $r->d_id) {
                                        $daimond_count = $r->d_wt_category;
                
                                        if ($r_id == $daimond_count) {
                                            $count1 = $price + $r->price;
                                            $price = $count1;
                                        }
                                    }
                                }
                            }
                        }
                        array_push($labour, $price);
                    }
                    return json_encode($labour);
                }
            @endphp
        </div>
    </div>
</body>

</html>
