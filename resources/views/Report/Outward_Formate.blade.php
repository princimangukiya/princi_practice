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
    <title>Bill Report</title>
    <style>
        td {
            padding: .50px .75rem !important;
            vertical-align: middle !important;
            font-size: 12px;
            border: 1px solid black;
        }

        .box-title {
            font-weight: bold;
        }

        .heading-row td {
            font-weight: bold;
            text-align: center;
        }

        .total-row td {}

        .v-row td {}

        @media print {
            button .print-btn {
                display: none;
            }
        }

    </style>
</head>

<body>
    <div class="container-fluid" style="padding: 10px;  text-transform: uppercase;">
        <div id="bill-display" style="border: 1px solid black;">
            <!-- ----- HEADER ---- -->
            <table class="table table-bordered" style="border: 1px solid black;">
                <tr>
                    <td colspan="7" rowspan="3" class="text-center" style="border-bottom: 1px solid blue;">
                        <div>
                            @php
                                $c_id = session()->get('c_id');
                            @endphp
                            @if ($c_id == 1)
                                <br><br><img style="width:600px; height: 100px;"
                                    src="../public/assets/images/logo/vmJewel.jpg" alt="logo"><br><br>
                            @else
                                <br><br><img style="width:600px; height: 100px;"
                                    src="../public/assets/images/logo/ekJewel.JPG" alt="logo"><br><br>
                            @endif

                        </div>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>

                <tr>
                    <td colspan="7" class="text-center">

                        <p>{{ $company_detail['c_adress'] }}<br>Mo.{{ $company_detail['c_mobile'] }} | Email
                            :{{ $company_detail['c_email'] }}<br><b>GSTIN
                                :{{ $company_detail['c_gstin'] }}</b><br>Date:{{ date('d-m-Y', strtotime($start_date)) }}
                            &nbsp; To:
                            {{ date('d-m-Y', strtotime($end_date)) }}<br>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="6">
                        <div> &nbsp;</div>
                    </td>
                </tr>
                <!-- ----- BODY ---- -->
                <tr>
                    <td colspan="7" class="text-center">
                        To,<u>
                            @if ($s_name->isEmpty())
                                All Manager Jangad Report

                            @else
                                {{ $s_name[0]['s_name'] }}
                            @endif
                        </u>
                        , Date:<u>{{ date('d-m-Y', strtotime($date)) }}</u>
                        <br>Through:<u>______________________________</u> Mobile:<u>__________________________</u>
                        <br><b style="font-size: 9px;">Please recevie the following pollished good on approval & or for
                            asortment or
                            for
                            processing
                            to sale</b>
                        </p>
                    </td>
                </tr>
                <tr class=" heading-row v-row ">
                    <td class="border-bottom-0">#</td>
                    @if ($s_name->isEmpty())
                        <td class="border-bottom-0">Company Name</td>
                    @endif
                    <td class="border-bottom-0">Barcode Id</td>
                    <td class="border-bottom-0">Pcs</td>
                    <td class="border-bottom-0">Rough Crt</td>
                    <td class="border-bottom-0">Polish Crt</td>
                    <td class="border-bottom-0">Dif Pcs</td>
                    @if ($s_name->isEmpty())
                    @else
                        <td class="border-bottom-0"></td>
                    @endif
                </tr>

                @php
                    $count = 0;
                @endphp
                @foreach ($inward as $key => $value)
                    <tr class="v-row">
                        {{-- @if ($value->s_id == 8) --}}

                        @php
                            $count = $count + 1;
                        @endphp

                        <td>
                            {{ $key + 1 }}
                        </td>
                        @if ($s_name->isEmpty())
                            <td>
                                {{ $value->s_name }}
                            </td>
                        @endif
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
                            {{ $value->d_wt }}
                        </td>
                        <td>
                            {{ $value->d_n_wt }}
                        </td>

                        @if ($value->status == 0)
                            <td>RR</td>

                        @else
                            <td></td>
                        @endif

                        @if ($s_name->isEmpty())
                        @else
                            <td>

                            </td>
                        @endif

                    </tr>

                @endforeach
                <!-- ----- FOOTER ---- -->

                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="3" rowspan="4">
                        <div class="text-left">
                            Received the above goods as per conditions<br><br><br><br><br><br>Through Signature
                            Receiver's Signature
                        </div>
                    </td>
                    <td colspan="4" rowspan="4">
                        <div class="text-right">
                            @php
                                $c_name = session()->get('c_name');
                            @endphp
                            For, {{ $c_name }}<br><br><br><br><br><br>Authorise
                            Signature
                        </div>
                    </td>
                </tr>

                <tr></tr>
                <tr></tr>
                <tr></tr>
            </table>
        </div>
    </div>
</body>

</html>
