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
    <title>Bill Formate</title>
    <style>
        .tabel_style {
            text-align: center;
            margin: 2% 2%;
        }
        
        .invoice {
            width: 700px;
            padding: 1%;
            border: 1px solid black;
        }
        
        .logo {
            width: 100%;
            border-bottom: 2px solid blue;
        }
        
        .address {
            width: 100%;
            margin: 1%;
        }
        
        h6 {
            color: blue;
        }
        
        .card-header {
            border: 1px solid black;
        }
        
        .card-body {
            padding: 0%;
            padding-top: 1%;
        }
        
        .tr {
            text-align: center;
        }
        
        .card-body-header {
            border-bottom: 2px solid black;
        }
        
        .Description-body {
            margin: 0%;
        }
        
        .card-footer {
            width: 100%;
            padding: 0%;
            padding-top: 1%;
        }
        
        .footer-left {
            width: 45%;
            border: 1px solid black;
            float: left;
        }
        
        .footer-right {
            width: 45%;
            border: 1px solid black;
            float: right;
            text-align: right;
        }
    </style>
</head>



<body style="margin: 0; padding: 0; background-color:#eaeced " bgcolor="#eaeced">
    <div class="row tabel_style">
        <div class="col-12 invoice">
            <!--div-->
            <div class="card1">
                <div class="card-header-outer">
                    <div class="card-header">
                        <div class="card-title logo">
                            <h6>|| શ્રી ગણેશાય નામ: ||</h6>

                            <img src="logo11.png" alt="">
                        </div>
                        <div class="address-style">
                            <p class="address">4th Floor,Plot No. 39/40, Gopinath Complex, Kapur Vadi,Khodiyar Vadi, Khodiyar Nagar Road Varchha Road, Surat.</p>
                            <p class="address"> Mo.98797 52760 | Email : vmjewel1001@gmail.com</p>
                            <p class="address"><b>GSTIN : 24AMKPP522GH1ZZ</b></p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div style="border: 1px solid black">
                        <div class="card-body-header">
                            <p style="margin-bottom: 0%;">
                                To,___________________________________________________Date________________</p>
                            <br>
                            <p style="margin-top: 0%;">
                                Through_______________________________________Mobile______________________</p>
                            <p class="Description-body">Please recevie the following pollished good on approval & or for asortment or for processing to sale</p>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="">No.</th>
                                        <th class="">Barcode_Id</th>
                                        <th class="">Pcs</th>
                                        <th class="">Weight</th>
                                        <th class="">Per(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            ALOK IMPEX
                                        </td>
                                        <td>
                                            10
                                        </td>
                                        <td>
                                            0.12
                                        </td>
                                        <td>
                                            0.06
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="footer-left">
                        <p>Received the above goods as per conditions</p><br><br><br>
                        <p>Through Signature Receiver's Signature</p>
                    </div>
                    <div class="footer-right">
                        <p class="pr-2">For Vm Jewel</p><br><br><br>
                        <p class="pr-2">Proprietor / Auth Signature</p>
                    </div>
                </div>
            </div>
            <!--/div-->


        </div>
    </div>
</body>

</html>