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

                <p>Date:-{{ $today_date }}</p>

                <div class="card-body">
                    <div class="___class_+?17___">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0" style="border: 1px solid black">#</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Barcode_Id</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Shape</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Old_Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">New_Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Buy_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($inward as $key => $value)
                                        {{-- @if ($value->s_id == 8) --}}

                                        @php
                                            $count = $count + 1;
                                        @endphp
                                        <tr style="border: 1px solid black">
                                            <td style="border: 1px solid black">
                                                {{ $count }}
                                            </td>

                                            <td style="border: 1px solid black">
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td class="myguj" style="border: 1px solid black">
                                                {{ $value->shape_name }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                            </td>
                                        </tr>
                                        {{-- @endif --}}
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
