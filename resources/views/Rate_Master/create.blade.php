@section('content')
    <!--/app header-->
    @php

    $avatar = 'T3_Admin_Design/assets/images/users/2.jpg';

    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Add Rate Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Rate List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Rate</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <div id="result"></div>
    <form action="{{ route('rate_master.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">


            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Rate Details</div>

                    </div>

                    <div class="card-body">

                        <div class="card-title font-weight-bold">Rate info:</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4><label class="form-label">Select Company :-</label></h4>
                                    <select id="c_id" name="c_id" required class="form-control select2">
                                        <optgroup label="Company">
                                            <option value="" disabled selected>Choose Company</option>
                                            {{-- @if (count($supplier) > 0) --}}
                                            {{-- @foreach ($supplier as $value) --}}
                                            <option value="ALOKEMPEX">ALOKEMPEX</option>
                                            {{-- @endforeach --}}
                                            {{-- @endif --}}
                                        </optgroup>
                                    </select>
                                    @error('s_id')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4><label class="form-label">Select Rate :-</label></h4>
                                    <select id="Rate" name="Rate1" required class="form-control select2">
                                        <optgroup label="Rate">
                                            <option value="" disabled selected>Choose Rate</option>
                                            <option value="0.010-0.209">0.010-0.209</option>
                                            <option value="0.210-0.409">0.210-0.409</option>
                                            <option value="0.410-5.000">0.410-5.000</option>
                                        </optgroup>
                                    </select>
                                    @error('s_id')
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
                                    <label class="form-label">Labour :-</label>
                                    <input placeholder="Enter Your price" class="form-control" id="price" type="text"
                                        name="price" value="{{ old('price') }}" required>
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

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                        <a href="/supplier" class="btn btn-danger">Cancle</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>
    <script src="{{ asset('T3_Admin_Design/assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('T3_Admin_Design/assets/js/jquery.js') }}"></script>

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
@include('app')
