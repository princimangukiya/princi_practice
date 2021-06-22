@section('content')
<!--/app header-->	
@php
   
   
    $avatar="T3_Admin_Design/assets/images/users/2.jpg";

@endphp
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Add Diamond Packate</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">User List</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Add User</a></li>
        </ol>
    </div>
    {{--
    <div class="page-rightheader">
        <div class="btn btn-list">
            <a href="#" class="btn btn-info"><i class="fe fe-settings mr-1"></i> General Settings </a>
            <a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
            <a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
        </div>
    </div>
    --}}
</div>
<!--End Page header-->
<!--
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
-->
<form  action="{{ route('diamond.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-xl-3 col-lg-4">
            
            <div id="camera"></div>
        
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add New Diamond Packate</div>
            </div>
            
            <div class="card-body">
                
                <div class="card-title font-weight-bold">Packate info:</div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">BarCode Value </label>
                            <input id="bar_code" type="text" name="bar_code" class="form-control" value="{{ old('bar_code') }}" placeholder="Enter Bar Code">
                            @error('bar_code')
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
                            <label class="form-label">Diamond Packate Name</label>
                            <input id="packatename" type="text" name="packatename" class="form-control" value="{{ old('packatename') }}" placeholder="Enter Packate Name" required>
                            @error('packatename')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Packate Wt :-</label>
                            <input placeholder="Enter Packate Wt" class="form-control" id="d_wt" type="text" name="d_wt"  value="{{ old('d_wt') }}"  required>
                            @error('d_wt')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Packate Col :-</label>
                            <input type="text" id="d_col" class="form-control" placeholder="Enter Packate Col "  name="d_col"  value="{{ old('d_col') }}"  required>
                            @error('d_col')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Packate Pc</label>
                            <input id="d_pc" type="text" name="d_pc" class="form-control"  value="{{ old('d_pc') }}" placeholder="Enter Packate Pc"   required>
                            @error('d_pc')
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
                            <label class="form-label">Packate Shape</label>
                            <input id="d_shape" type="text" name="d_shape" class="form-control" value="{{ old('d_shape') }}" placeholder="Enter Packate Shape"  required>
                            @error('phone')
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
                            <label class="form-label">Packate Cla</label>
                            <input id="d_cla" type="text" name="d_cla" class="form-control" placeholder="Enter Packate Cla"  required>
                            @error('d_cla')
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
                            <label class="form-label">Packate Exp in Percentage</label>
                            <input id="d_exp_pr" type="text" name="d_exp_pr" class="form-control" placeholder="Enter Packate Exp in Percentage"  required>
                            @error('d_exp_pr')
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
                            <label class="form-label">Packate Exp</label>
                            <input id="d_exp" type="text" name="d_exp" class="form-control" placeholder="Enter Packate Exp"  required>
                            @error('d_exp')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                                </small>
                            @enderror
                        </div>
                    </div>
                                       
                </div>
                {{--
                <div class="card-title font-weight-bold mt-5">External Links:</div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Google</label>
                            <input type="text" class="form-control" placeholder="https://www.google.com/">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" placeholder="https://twitter.com/">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Pinterest</label>
                            <input type="text" class="form-control" placeholder="https://in.pinterest.com/">
                        </div>
                    </div>
                </div>
                <div class="card-title font-weight-bold mt-5">About:</div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">About Me</label>
                            <textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>
                        </div>
                    </div>
                </div>
                --}}
            </div>
            <div class="card-footer text-right">
                <button type="submit" name="action" class="btn  btn-primary" >Submit</button>
                <a href="#" class="btn btn-danger">Cancle</a>
            </div>
            
        </div>
    </div>
</div>
<!-- End Row-->
</form>
<script src="{{asset('T3_Admin_Design/assets/js/quagga.min.js')}}"></script>
<script src="{{asset('T3_Admin_Design/assets/js/jquery.js')}}"></script>

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