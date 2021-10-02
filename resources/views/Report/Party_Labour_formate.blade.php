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

        tr {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
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


                                    @foreach ($supplier as $d)
                                        <tr>
                                            @php
                                                $s_id = $d->s_id;
                                                
                                            @endphp
                                            <td>
                                                <b>{{ $d->s_name }}</b>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($rates[$s_id] as $item)
                                                    <br>{{ $item }}
                                                @endforeach
                                                <br><br><b> &nbsp;Total Party:-</b>

                                            </td>
                                            {{-- <td style="display: flex; justify-content:center; "> --}}
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($counts[$s_id] as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>

                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($issueCuts[$s_id] as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($outCuts[$s_id] as $item)
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
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($price[$s_id] as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($labour[$s_id] as $item)
                                                    <br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>

                                        </tr>

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


        </div>
    </div>
</body>

</html>
