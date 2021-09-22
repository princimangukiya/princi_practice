<!DOCTYPE html>
<html>

<head>
    <title>Inward Report</title>
</head>

<body>
    <h1>All InWard Data Report</h1>
    <p>22/09/2021</p>
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Inward Details</div>
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
                                        <th class="border-bottom-0" style="border: 1px solid black">Buy_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inward as $key => $value)
                                        <tr style="border: 1px solid black">
                                            <td style="border: 1px solid black">
                                                {{ $key + 1 }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->s_name }}
                                            </td>
                                            <td style="border: 1px solid black">
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td style="border: 1px solid black">
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
