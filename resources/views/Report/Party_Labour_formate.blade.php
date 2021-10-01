<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Party Labour</title>
    <style>
        @font-face {
            font-family: myguj-font;
            src: url(Gujrati-Saral-1.ttf) format(truetype);
            font-weight: normal;
            font-style: normal;
        }

        .myguj {
            font-family: myguj-font;
        }

        .tabel_style {
            text-align: center;
            margin: 2% 2%;
        }

        .invoice {
            width: 100%;
            padding: 1%;
            border: 1px solid black;
        }

        .textstyle {
            align-items: center;
        }

    </style>
</head>



<body style="margin: 0; padding: 0; background-color:#eaeced " bgcolor="#eaeced">
    <div class="row tabel_style">
        <div class="col-12 invoice">
            <!--div-->
            <div class="card1">
                <div class="textstyle">
                    <h6 class="myguj">|| શ્રી ગણેશાય નામ: ||</h6>
                </div>
                @if ($s_name->isEmpty())
                    <h3>All Party Labour Report</h3>

                @else
                    <h3>{{ $s_name[0]['s_name'] }}</h3>
                @endif

                <div class="card-body">
                    <div class="___class_+?17___">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="border: 1px solid black;">
                                    <tr style="border: 1px solid black;">
                                        <th class="border-bottom-0" style="border: 1px solid black;">Sizedesc</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Pcs</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Issue Cts.</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Out Cts.</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Type</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Rate</th>
                                        <th class="border-bottom-0" style="border: 1px solid black;">Labour</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid black;">


                                    @foreach ($Pay_labour as $d)
                                        <tr style="border: 1px solid black;">
                                            @php
                                                
                                                $s_id = $d->s_id;
                                                $sell_stock = App\Models\sell_stock::where('s_id', $s_id)->get();
                                                $daimond = App\Models\D_Purchase::where('s_id', $s_id)->get();
                                                $json_data = App\Models\rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
                                                $json_data = $json_data[0]['json_price'];
                                                $json_decoded = json_decode($json_data);
                                            @endphp
                                            <td style="border: 1px solid black;">
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
                                            <td style="border: 1px solid black;">
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
                                            <td style="border: 1px solid black;">
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
                                            <td style="border: 1px solid black;">
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
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;">
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
                                            <td style="border: 1px solid black;">
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
                {{-- <div class="card-footer">
                    <div class="footer-left">
                        <p>Received the above goods as per conditions</p><br><br><br>
                        <p>Through Signature Receiver's Signature</p>
                    </div>
                    <div class="footer-right">
                        <p class="pr-2">For Vm Jewel</p><br><br><br>
                        <p class="pr-2">Proprietor / Auth Signature</p>
                    </div>
                </div> --}}
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
