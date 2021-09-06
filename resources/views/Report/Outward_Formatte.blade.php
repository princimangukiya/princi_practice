<!DOCTYPE html>
<html>

<head>
    <title>Outward Report</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
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
                                        {{-- <th>Package</th> --}}
                                        {{-- <th class="border-bottom-0">0.210-0.409</th>
                                        <th class="border-bottom-0">0.410-5.000</th> --}}

                                        <th class="border-bottom-0" style="border: 1px solid black">Sell_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border: 1px solid black">
                                        <td style="border: 1px solid black">
                                            1
                                        </td>
                                        <td style="border: 1px solid black">
                                            ALOK IMPEX
                                        </td>
                                        <td style="border: 1px solid black">
                                            1008894
                                        </td>
                                        <td style="border: 1px solid black">
                                            એમરલ
                                        </td>
                                        <td style="border: 1px solid black">
                                            0.194
                                        </td>
                                        <td style="border: 1px solid black">
                                            0.180
                                        </td>
                                        <td style="border: 1px solid black">
                                            23
                                        </td>
                                        <td style="border: 1px solid black">
                                            2021-08-29
                                        </td>
                                        <td style="border: 1px solid black">
                                            2021-09-05
                                        </td>

                                    </tr>
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
