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
    <title>Party Labour Formate</title>
    <style>
        td {
            padding: 0px .75rem !important;
            vertical-align: middle !important;
            font-size: 11px;
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
    {{-- <button class="btn btn-default .print-btn" onclick="jsvascript:window.print()">Print Invoice</button> --}}
    <div class="container-fluid" style="padding: 10px;  text-transform: uppercase; width:575px; height:750px;">

        <div id="bill-display" style="border: 1px solid black;">
            <!-- ----- HEADER ---- -->
            <table class="table table-bordered" style="border: 1px solid black;">
                <tr>
                    @php
                        $c_id = session()->get('c_name');
                    @endphp
                    <td colspan="8" rowspan="1" class="text-center"><b
                            style="font-size: 24px;;">{{ $c_id }}</b></td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1" style="text-align: center;"><b>Manufacturing Jobwork of Rough
                            Diamond</b></td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1" style="text-align: center;"><b>{{ $company_detail['c_adress'] }}</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1">GST NO. :-{{ $company_detail['c_gstin'] }}</td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1">PAN :- {{ $company_detail['c_pan'] }}</td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1">State :- {{ $company_detail['c_state'] }}</td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1" class="box-title" style="text-align: center;">TAX INVOICE</td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5" rowspan="4">
                        <div class="box-title">To,</div>
                        <div class="box-content title-name">Name :- {{ $s_name[0]['s_name'] }}</div>
                        <div class="box-content title-name">Address :- {{ $s_name[0]['s_address'] }}</div>
                        <div class="box-content title-name">GSTIN :- {{ $s_name[0]['s_gst'] }}</div>
                        <div class="box-content title-name">PAN :- AALFR9869B</div>
                        <div class="box-content title-name">State :- GUJARAT CODE : 24</div>
                    </td>
                    <td colspan="3" rowspan="4">
                        <div class="box-content title-name">Bill No. :- 4</div>
                        <div class="box-content title-name">Bill Dt. :- {{ date('d-m-Y', strtotime($today_date)) }}
                        </div>
                        <div class="box-content title-name">Reverse Charge(Y/N) :- </div>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>

                <!-- ----- BODY ---- -->
                <tr class="heading-row v-row">
                    <td colspan="1">SR No.</td>
                    <td colspan="2">Particulars</td>
                    <td colspan="1">HSN/ <br>SAC Code</td>
                    <td colspan="1">Rough Mfgd<br> Crt/ Pcs.</td>
                    <td colspan="1">Polish Pcs.</td>
                    <td colspan="1">Rate Per <br>Crt/Pcs.</td>
                    <td colspan="1">Total amount</td>
                </tr>
                @foreach ($supplier as $d)
                    <tr class="v-row">
                        <td colspan="1" class="text-center">
                            1
                        </td>
                        @php
                            $s_id = $d->s_id;
                        @endphp
                        <td colspan="2" class="text-center">
                            <br><br>
                            @foreach ($rates[$s_id] as $item)
                                {{ $item }}<br>
                            @endforeach
                            <br><b>Job Work Charges of Diamond</b><br>
                            {{ date('d-m-Y', strtotime($start_date)) }} To
                            {{ date('d-m-Y', strtotime($end_date)) }}
                        </td>
                        <td colspan="1" class="text-center">
                            9988
                        </td>
                        @php
                            $total_item = 0;
                        @endphp
                        <td colspan="1" class="text-center">
                            @foreach ($issueCuts[$s_id] as $item)
                                {{ $item }}<br>
                                @php
                                    $total_item = $total_item + $item;
                                @endphp
                            @endforeach
                            <br><br><b>{{ $total_item }}</b>
                        </td>
                        {{-- <td>
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
                        </td> --}}
                        <td colspan="1" class="text-center">
                            @php
                                $total_item = 0;
                            @endphp
                            @foreach ($counts[$s_id] as $item)
                                {{ $item }}<br>
                                @php
                                    $total_item = $total_item + $item;
                                @endphp
                            @endforeach
                            <br><br><b>{{ $total_item }}</b>

                        </td>

                        <td colspan="1" class="text-center">
                            @php
                                $total_item = 0;
                            @endphp
                            @foreach ($price[$s_id] as $item)
                                {{ $item }} <br>
                                @php
                                    $total_item = $total_item + $item;
                                @endphp
                            @endforeach
                            <br><br><b>{{ $total_item }}</b>
                        </td>
                        <td colspan="1" class="text-center">
                            @php
                                $total_price = 0;
                            @endphp
                            @foreach ($labour[$s_id] as $item)
                                {{ $item }} <br>
                                @php
                                    $total_price = $total_price + $item;
                                @endphp
                            @endforeach
                            <br><br><b>{{ $total_price }}</b>
                        </td>

                    </tr>
                @endforeach
                <tr>
                    <td colspan="1" rowspan="6">&nbsp;</td>
                    <td colspan="2" rowspan="6">&nbsp;</td>
                    <td colspan="1" rowspan="6">&nbsp;</td>
                    <td colspan="2" class="text-center">Taxable Value
                    </td>
                    <td colspan="1" class="text-center">&nbsp;</td>
                    <td colspan="1" class="text-center">{{ $total_price }}</td>

                </tr>
                <tr>
                    <td colspan="2" class="text-center">CGST
                    </td>
                    <td colspan="1" class="text-center">0.75% </td>
                    @php
                        $newprice = $total_price * ((100 - 0.75) / 100);
                        $cgst = $total_price - $newprice;
                    @endphp
                    <td colspan="1" class="text-center">{{ $cgst }}
                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="text-center">SGST
                    </td>
                    <td colspan="1" class="text-center">0.75%</td>
                    @php
                        $newprice = $total_price * ((100 - 0.75) / 100);
                        $sgst = $total_price - $newprice;
                    @endphp
                    <td colspan="1" class="text-center">{{ $sgst }}
                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="text-center">IGST
                    </td>
                    <td colspan="1" class="text-center">&nbsp;</td>
                    <td colspan="1" class="text-center">&nbsp;</td>

                </tr>
                <tr>
                    <td colspan="2" class="text-center">&nbsp;</td>
                    <td colspan="1" class="text-center">&nbsp;</td>
                    <td colspan="1" class="text-center">&nbsp;</td>

                </tr>
                <tr>
                    <td colspan="2" class="text-center">GRAND TOTAL
                    </td>
                    <td colspan="1" class="text-center">&nbsp;</td>
                    @php
                        $newprice = $total_price + $cgst + $sgst;
                    @endphp
                    <td colspan="1" class="text-center">{{ $newprice }}</td>
                </tr>
                <!-- ----- FOOTER ---- -->
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="box-content">Amount Chargeable(in words)</div>

                    </td>
                    <td colspan="6">
                        @php
                            $newprice = intval($newprice);
                            $get_amount = AmountInWords($newprice);
                            // echo $get_amount;
                        @endphp
                        <div class="box-content">{{ $get_amount }} ONLY
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div class="box-content">SUBJECT TO SURAT JURISDICTION</div>
                    </td>
                    <td colspan="4" rowspan="3">
                        <div class="text-right">For, {{ $c_id }}<br><br><br><br><br><br>Authorise Signature
                        </div>
                    </td>

                </tr>
                <tr>
                    <td colspan="4">
                        <div class="box-content">Bank Detail</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div class="box-content title-name">BANK :- Kotak Mahindra Bank (KMB)</div>
                        <div class="box-content title-name">BRANCH :- Katargam Avalon, Surat</div>
                        <div class="box-content title-name">A/C NO. :- 9879752799*</div>
                        <div class="box-content title-name">IFSC CODE :- KKBK0002868</div>
                        <div class="box-content"> MICR:-</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="7" class="text-left"><br><br>Receiver Signature and Stamp<br>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    @php
        // Create a function for converting the amount in words
        function AmountInWords(float $amount)
        {
            $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
            // Check if there is any number after decimal
            $amt_hundred = null;
            $count_length = strlen($num);
            $x = 0;
            $string = [];
            $change_words = [0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'];
            $here_digits = ['', 'Hundred', 'Thousand', 'Lakh', 'Crore'];
            while ($x < $count_length) {
                $get_divider = $x == 2 ? 10 : 100;
                $amount = floor($num % $get_divider);
                $num = floor($num / $get_divider);
                $x += $get_divider == 10 ? 1 : 2;
                if ($amount) {
                    $add_plural = ($counter = count($string)) && $amount > 9 ? 's' : null;
                    $amt_hundred = $counter == 1 && $string[0] ? ' and ' : null;
                    $string[] =
                        $amount < 21
                            ? $change_words[$amount] .
                                ' ' .
                                $here_digits[$counter] .
                                $add_plural .
                                ' 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ' .
                                $amt_hundred
                            : $change_words[floor($amount / 10) * 10] .
                                ' ' .
                                $change_words[$amount % 10] .
                                ' 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ' .
                                $here_digits[$counter] .
                                $add_plural .
                                ' ' .
                                $amt_hundred;
                } else {
                    $string[] = null;
                }
            }
            $implode_to_Rupees = implode('', array_reverse($string));
            $get_paise =
                $amount_after_decimal > 0
                    ? 'And ' .
                        ($change_words[$amount_after_decimal / 10] .
                            " 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           " .
                            $change_words[$amount_after_decimal % 10]) .
                        ' Paise'
                    : '';
            return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
        }
        
    @endphp
</body>

</html>
