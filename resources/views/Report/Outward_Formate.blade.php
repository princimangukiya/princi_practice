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
    <div class="container-fluid" style="padding: 10px;  text-transform: uppercase;">
        <div id="bill-display" style="border: 1px solid black;">
            <!-- ----- HEADER ---- -->
            <table class="table table-bordered" style="border: 1px solid black;">
                <tr>
                    <td colspan="7" rowspan="3" class="text-center" style="border-bottom: 1px solid blue;">
                        <div>
                            <br><br><img style="width:600px; height: 100px;"
                                src="../public/assets/images/logo/vmJewel.jpg" alt="logo"><br><br>
                        </div>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>

                <tr>
                    <td colspan="7" class="text-center">
                        <p>4th Floor,Plot No. 39/40, Gopinath Complex, Kapur Vadi,Khodiyar Vadi, Khodiyar Nagar Road
                            Varchha Road, Surat. <br>Mo.98797 52760 | Email : vmjewel1001@gmail.com <br><b>GSTIN :
                                24AMKPP522GH1ZZ</b>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <div> &nbsp;</div>
                    </td>
                </tr>

                <tr></tr>
                <tr></tr>
                <!-- ----- BODY ---- -->
                <tr>
                    <td colspan="7" class="text-center">
                        <p style="width: 100%;">To,<u>kikani jems</u> , Date:<u>24-08-2021</u>
                            <br>Through:<u>&nbsp;</u> Mobile:<u>&nbsp;</u>
                            <br><b>Please recevie the following pollished good on approval & or for asortment or
                                for
                                processing
                                to sale</b>
                        </p>
                    </td>
                </tr>
                <tr class=" heading-row v-row ">
                    <td>SR No.</td>
                    <td>Particulars</td>
                    <td>HSN/ <br>SAC Code</td>
                    <td>Rough Mfgd<br> Crt/ Pcs.</td>
                    <td>Polish Pcs.</td>
                    <td>Rate Per <br>Crt/Pcs.</td>
                    <td>Total amount</td>
                </tr>
                <tr class=" v-row ">
                    <td class=" text-center "></td>
                    <td class=" text-center ">Job Work Charges of Diamond<br> 01/05/2021 TO 31/05/2021</td>
                    <td class=" text-center ">9988</td>
                    <td class=" text-center ">435.9</td>
                    <td class=" text-center ">777</td>
                    <td class=" text-center ">1,500.00</td>
                    <td class=" text-center ">653,850.00</td>
                </tr>
                <!-- ----- FOOTER ---- -->
                <tr>
                    <td colspan=" 7 ">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="3">
                        <div class="text-left">
                            <br>Received the above goods as per conditions<br><br><br><br><br><br>Through Signature
                            Receiver's Signature<br>&nbsp;
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=" 4 " rowspan="3">
                        <div class=" text-right ">
                            <br>For, EKLINGJI GEMS<br><br><br><br><br><br>Authorise Signature<br>&nbsp;
                        </div>
                    </td>

                </tr>
            </table>
        </div>
        <!-- <button class=" btn btn-default .print-btn " onclick=" jsvascript:window.print() ">Print Invoice</button> -->
    </div>
</body>

</html>
