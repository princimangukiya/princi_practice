<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('T3_Admin_Design/assets/js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('T3_Admin_Design/media/css/jquery.dataTables.min.css')}}">
    <script src="{{asset('T3_Admin_Design/media/js/jquery.dataTables.min.js')}}"></script>

    <title> Barcode Scanning </title>
</head>

<body>

    <table id="tblItems" class="table-responsive">
        <thead>
            <tr>
                <th>Id</th>
                <th>Packet Name</th>
                <th>Weight</th>

            </tr>
        </thead>
    </table>

    <div id="result"></div>
    <div id="camera"></div>

    <script src="{{asset('T3_Admin_Design/assets/js/quagga.min.js')}}"></script>

    <script>
        var id;
        var mytable
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera') // Or '#yourElement' (optional)
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            console.log(data.codeResult.code);
            id = data.codeResult.code;
            document.querySelector('#result').innerText = data.codeResult.code;

            mytable.row.add([id, 'pkt1', '10.5']);
            mytable.draw();
        });

        $(document).ready(function() {
            mytable = $('#tblItems').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip'
            });
            // mytable.row.add([id, 'pkt1', '10.5']);
            // mytable.draw();
        });
    </script>

</body>

</html>