<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Inward</title>
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
                    <h3>All Inward Report</h3>

                @else
                    <h3>{{ $s_name[0]['s_name'] }}</h3>
                @endif
                <p>Date :- {{ $today_date }}</p>

                <div class="card-body">
                    <div class="___class_+?17___">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0" style="border: 1px solid black">#</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Company Name</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Barcode_Id</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Shape</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Old_Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">New_Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Price</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Buy_date</th>
                                        {{-- <th>Package</th> --}}
                                        {{-- <th class="border-bottom-0">0.210-0.409</th>
                                        <th class="border-bottom-0">0.410-5.000</th> --}}

                                        <th class="border-bottom-0">Sell_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($inward as $key => $value)

                                        @if ($value->s_id == 8)

                                            @php
                                                $count = $count + 1;
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    @php
                                                        $s_id = $value->s_id;
                                                        $s_name = App\Models\supplier_details::where('s_id', $s_id)->get('s_name');
                                                        // echo $s_name;
                                                    @endphp
                                                    {{ $s_name[0]['s_name'] }}
                                                </td>
                                                <td>
                                                    {{ $value->d_barcode }}
                                                </td>
                                                <td>
                                                    @php
                                                        $shape_id = $value->shape_id;
                                                        $shape_name = App\Models\diamond_shape::where('shape_id', $shape_id)->get('shape_name');
                                                        // echo $s_name;
                                                    @endphp
                                                    {{ $shape_name[0]['shape_name'] }}
                                                </td>
                                                <td>
                                                    {{ $value->d_wt }}
                                                </td>
                                                <td>
                                                    {{ $value->d_n_wt }}
                                                </td>
                                                <td>
                                                    {{ $value->price }}
                                                </td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                                </td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($value->updated_at)) }}
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>

        </div>
    </div>
</body>

</html>
