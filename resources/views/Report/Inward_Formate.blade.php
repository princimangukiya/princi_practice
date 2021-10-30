<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <title>Inward</title>
    <style>
        @page {
            margin: 20px 20px;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 4.5cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 2cm;
            font-family: 'Poppins', sans-serif;
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
            padding: 3px 3px 3px 15px !important;
            border: 1px solid lightgrey;
        }

        th {
            margin: 1px !important;
            padding: 3px 3px 3px 15px !important;
            border-right: 1px solid lightgrey;
            background-color: lightcyan;
        }

    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header style="padding: 15px 0px; 15px; 0px;">
        <div style="display: flex;">
            <div class="text-left">
                @php
                    $c_id = session()->get('c_id');
                @endphp
                <b>
                    @if (empty($s_name))
                        <h3>All Inward Company Report</h3>
                </b><br><br>
            @else
                <h3>{{ $s_name['s_name'] }}</h3>
                </b>Phone no.: {{ $s_name['s_phone'] }}<br>
                Email: {{ $s_name['s_email'] }}<br>
                @endif
                Date: From {{ date('d-m-Y', strtotime($start_date)) }} To
                {{ date('d-m-Y', strtotime($end_date)) }}
            </div>
            <div class="text-right">

                @if ($c_id == 1)
                    <img class="imgresponsive" src="{{ assets('assets/images/logo/vmJewel.jpg') }}" width=" 35%"
                        height="40%" />
                @else
                    <img class="imgresponsive" src="{{ assets('assets/images/logo/ekJewel.JPG') }}" width="35%"
                        height="40%" />
                @endif

                <p>Date: {{ date('d-m-Y', strtotime($today_date)) }}</p>
            </div>
            <p class="text-center" style="padding-top: 110px; font-size:24px !important;">Inward Report
            </p>
        </div>

    </header>

    <footer>

        <div style="display: flex;">
            <div class="text-left" style="border: 1px solid lightgrey; padding:0px 10px;">
                Received the above goods as per conditions<br><br>Through Signature
                Receiver's Signature
            </div>
            <div class="text-right" style="border: 1px solid lightgrey; padding:0px 10px;">
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
                <div class="card1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="border-left: 1px solid lightgrey">#</th>
                                @if (empty($s_name))
                                    <th>Company Name
                                    </th>
                                @endif
                                <th>Barcode Id</th>
                                <th>Rough Weight</th>
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
                                    <td>
                                        {{ $value->d_wt }}
                                    </td <td>
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
