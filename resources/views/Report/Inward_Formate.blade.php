<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Inward</title>
    <style>
        /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 10px 10px;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            padding: 10px;
        }

        .tabel_style {
            text-align: center;
        }

        .invoice {
            width: 100%;
        }

        .textstyle {
            align-items: center;
        }

        td {
            margin: 1px !important;
            padding: 3px 3px 3px 6px !important;
            border-right: 1px solid lightgrey;
        }

        th {
            margin: 1px !important;
            padding: 3px 3px 3px 6px !important;
            border-right: 1px solid lightgrey;
        }

    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header class="text-center" style="padding-top: 15px;">
        <img class="imgresponsive" src="../public/assets/images/logo/vmJewel.jpg" width="50%" height="50%" />
    </header>

    <footer>
        <div style="display: flex;">
            <div class="text-left" style="border: 1px solid lightgrey;">
                Received the above goods as per conditions<br><br>Through Signature
                Receiver's Signature
            </div>
            <div class="text-right" style="border: 1px solid lightgrey;">
                @php
                    $c_name = session()->get('c_name');
                @endphp
                For, {{ $c_name }}<br><br>Authorise
                Signature
            </div>
        </div>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div class="row tabel_style">
            <div class="col-12 invoice">
                <!--div-->
                <div class="card1">
                    {{-- <div class="textstyle">
                        <h6 class="myguj">|| શ્રી ગણેશાય નામ: ||</h6>
                    </div> --}}
                    @if (empty($s_name))
                        <h3>All Inward Company Report</h3>

                    @else
                        <h3>{{ $s_name['s_name'] }}</h3>
                    @endif

                    <p>Date:-{{ date('d-m-Y', strtotime($today_date)) }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="border-left: 1px solid lightgrey">#</th>
                                @if (empty($s_name))
                                    <th>Company Name
                                    </th>
                                @endif
                                <th>Barcode Id</th>
                                <th>Old Weight</th>
                                <th">Buy Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($inward as $key => $value)
                                {{-- @if ($value->s_id == 8) --}}

                                @php
                                    $count = $count + 1;
                                @endphp
                                <tr>
                                    <td style="border-left: 1px solid lightgrey">
                                        {{ $count }}
                                    </td>
                                    @if (empty($s_name))
                                        <td>
                                            {{ $value->s_name }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ $value->d_barcode }}
                                    </td>
                                    {{-- <td class="myguj" style="border: 1px solid lightgrey">
                                                    {{ $value->shape_name }}
                                                </td> --}}
                                    <td>
                                        {{ $value->d_wt }}
                                    </td>
                                    {{-- <td style="border: 1px solid lightgrey">
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                    <td>
                                        {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            @foreach ($inward as $key => $value)
                                {{-- @if ($value->s_id == 8) --}}

                                @php
                                    $count = $count + 1;
                                @endphp
                                <tr>
                                    <td style="border-left: 1px solid lightgrey">
                                        {{ $count }}
                                    </td>
                                    @if (empty($s_name))
                                        <td>
                                            {{ $value->s_name }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ $value->d_barcode }}
                                    </td>
                                    {{-- <td class="myguj" style="border: 1px solid lightgrey">
                                                    {{ $value->shape_name }}
                                                </td> --}}
                                    <td>
                                        {{ $value->d_wt }}
                                    </td>
                                    {{-- <td style="border: 1px solid lightgrey">
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                    <td>
                                        {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @php
                                    $i++;
                                @endphp


                            @endforeach
                            @foreach ($inward as $key => $value)
                                {{-- @if ($value->s_id == 8) --}}

                                @php
                                    $count = $count + 1;
                                @endphp
                                <tr>
                                    <td style="border-left: 1px solid lightgrey">
                                        {{ $count }}
                                    </td>
                                    @if (empty($s_name))
                                        <td>
                                            {{ $value->s_name }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ $value->d_barcode }}
                                    </td>
                                    {{-- <td class="myguj" style="border: 1px solid lightgrey">
                                                    {{ $value->shape_name }}
                                                </td> --}}
                                    <td>
                                        {{ $value->d_wt }}
                                    </td>
                                    {{-- <td style="border: 1px solid lightgrey">
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                    <td>
                                        {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @php
                                    $i++;
                                @endphp


                            @endforeach
                            @foreach ($inward as $key => $value)
                                {{-- @if ($value->s_id == 8) --}}

                                @php
                                    $count = $count + 1;
                                @endphp
                                <tr>
                                    <td style="border-left: 1px solid lightgrey">
                                        {{ $count }}
                                    </td>
                                    @if (empty($s_name))
                                        <td>
                                            {{ $value->s_name }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ $value->d_barcode }}
                                    </td>
                                    {{-- <td class="myguj" style="border: 1px solid lightgrey">
                                                    {{ $value->shape_name }}
                                                </td> --}}
                                    <td>
                                        {{ $value->d_wt }}
                                    </td>
                                    {{-- <td style="border: 1px solid lightgrey">
                                                    {{ $value->d_n_wt }}
                                                </td> --}}
                                    <td>
                                        {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @php
                                    $i++;
                                @endphp


                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
</body>

</html>
