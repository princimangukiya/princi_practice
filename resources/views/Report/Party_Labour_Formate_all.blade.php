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
    <title>Party Labour</title>
    <style>
        @page {
            margin: 20px 20px;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 4.5cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 0cm;
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
            height: 0.5cm;
        }

        .tabel_style {
            text-align: center;
        }

        .invoice {
            width: 100%;
        }

        p {
            margin: 0px !important;
            padding: 0% !important;
            font-size: 14px;
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
    @php
        $c_id = session()->get('c_id');
        $c_name = App\Models\CompanyDetail::where('c_id', $c_id)->first();
    @endphp
    <!-- Define header and footer blocks before your content -->
    <header style="padding: 15px 0px; 15px; 0px;">
        <div style="display: flex">
            <p class="text-left">Page Of 1 Of 2</p>
            <p class="text-right">Print Date : {{ $today_date }}</p>

            <div class="text-center">

                <p style="font-size:24px;"><b>{{ $c_name['c_name'] }}</b></p>

                <p style="padding:0 25% !important;font-size:12px; ">{{ $c_name['c_address'] }}</p>
                <p><b>Party Labour Sizewise Summary</b></p>
                From Date: {{ date('d-m-Y', strtotime($start_date)) }} To {{ date('d-m-Y', strtotime($end_date)) }}
            </div>
        </div>
    </header>

    <footer>
        <p class="text-center" style="background: lightcyan"> <b>{{ $c_name['c_name'] }}</b></p>
    </footer>
    <main>
        <div class="row tabel_style">
            <div class="col-12 invoice">
                <div class="card1">
                    <table id="Party_Tabel" class="table table-bordered text-wrap key-buttons">
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
                                        <br><br><b> &nbsp;Total :-</b>

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
    </main>
</body>

</html>
