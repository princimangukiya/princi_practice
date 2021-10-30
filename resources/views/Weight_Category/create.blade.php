@extends('app')
@section('content')
    <!--/app header-->
    @php

    $avatar = 'assets/images/users/2.jpg';

    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Add Weight Category Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/weight-category"><i class="fe fe-layers mr-2 fs-14"></i>Weight
                        Category</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/weight-category">Weight Category List</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Add Weight Category</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <div id="result"></div>

    <div class="row">


        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-header" style="justify-content: space-between;">
                    <div class="card-title">Add New Weight Category</div>
                </div>
                <form action="{{ route('rate_master.rates_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row" style="padding:20px;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Add First Range :-</label>
                                <input placeholder="Enter Your First Range" class="form-control" id="price" type="text"
                                    name="firstRange" value="0." required>
                                @error('price')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Add Last Range :-</label>
                                <input placeholder="Enter Your last Range" class="form-control" id="price" type="text"
                                    name="lastRange" value="0." required>
                                @error('price')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                        <a href="/rate-master/create" class="btn btn-danger">Cancle</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
    </div>
    <!-- End Row-->


    <script>
        var currentBoxNumber = 0;
        $(".inputField").keyup(function(event) {
            if (event.keyCode == 13) {
                textboxes = $("input.inputField");
                currentBoxNumber = textboxes.index(this);
                console.log(textboxes.index(this));
                if (textboxes[currentBoxNumber + 1] != null) {
                    nextBox = textboxes[currentBoxNumber + 1];
                    nextBox.focus();
                    nextBox.select();
                    event.preventDefault();
                    return false;
                } else {
                    addData();
                }
            }
        });

        // Add Categoriey to form 
        function hideShowWeight() {
            var x = document.getElementById('myDIV');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
        }



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
            $('#bar_code').val(id);
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
@endsection
