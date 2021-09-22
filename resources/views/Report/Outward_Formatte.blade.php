<!DOCTYPE html>
<html>

<head>
    <title>Outward Report</title>
</head>

<body>
    <h1>All OutWard Data Report</h1>
    <p>22/09/2021</p>
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Outward Details</div>
                </div>
                <div class="card-body">
                    <div style="border: 1px solid black">
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
                                        <th class="border-bottom-0" style="border: 1px solid black">Sell_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inward as $key => $value)


                                        <tr>
                                            <td style="border: 1px solid black">
                                                {{ $key + 1 }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                @php
                                                    $s_id = $value->s_id;
                                                    $s_name = App\Models\supplier_details::where('s_id', $s_id)->get('s_name');
                                                    // echo $s_name;
                                                @endphp
                                                {{ $s_name[0]['s_name'] }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                @php
                                                    $shape_id = $value->shape_id;
                                                    $shape_name = App\Models\diamond_shape::where('shape_id', $shape_id)->get('shape_name');
                                                    // echo $s_name;
                                                @endphp
                                                {{ $shape_name[0]['shape_name'] }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->price }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ date('d-m-Y', strtotime($value->updated_at)) }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->


        </div>
    </div>
</body>

</html>
