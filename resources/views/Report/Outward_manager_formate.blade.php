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
            <div class="card1">
                @if ($s_name->isEmpty())
                    <h3>All Manager Jangad Report</h3>

                @else
                    <h3>{{ $s_name[0]['m_name'] }}</h3>
                @endif
                <p>Date:-{{ date('d-m-Y', strtotime($date)) }}</p>

                <div class="card-body">
                    <div class="___class_+?17___">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0" style="border: 1px solid black">#</th>
                                        @if ($s_name->isEmpty())
                                            <th class="border-bottom-0" style="border: 1px solid black">Manager_Name
                                            </th>
                                        @endif
                                        <th class="border-bottom-0" style="border: 1px solid black">Barcode_Id</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Pcs</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">Weight</th>
                                        <th class="border-bottom-0" style="border: 1px solid black">per(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($outward_manager as $key => $value)
                                        @php
                                            $count = $count + 1;
                                        @endphp
                                        <tr style="border: 1px solid black">
                                            <td style="border: 1px solid black">
                                                {{ $key + 1 }}
                                            </td>
                                            @if ($s_name->isEmpty())
                                                <td style="border: 1px solid black">
                                                    {{ $value->m_name }}
                                                </td>
                                            @endif
                                            <td style="border: 1px solid black">
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                @if (empty($value->d_pc))
                                                    1
                                                @else
                                                    {{ $value->d_pc }}
                                                @endif
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->price }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
