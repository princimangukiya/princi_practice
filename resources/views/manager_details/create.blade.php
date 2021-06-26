@section('content')
<!--/app header-->	
@php
   
   
    $avatar="T3_Admin_Design/assets/images/users/2.jpg";

@endphp
<!--Page header-->

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Add Manager Details</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Manager List</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Manager</a></li>
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
<form  action="{{ route('manager.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add New Manager Details</div>
            </div>
            
            <div class="card-body">
                
                <div class="card-title font-weight-bold">Manager info:</div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Manager Name </label>
                            <input id="m_name" type="text" name="m_name" class="form-control" value="{{ old('m_name') }}" placeholder="Enter Manager Name">
                            @error('m_name')
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
                            <label class="form-label">Manager Address</label>
                            <input id="m_address" type="text" name="m_address" class="form-control" value="{{ old('m_address') }}" placeholder="Enter Manager Address" required>
                            @error('m_address')
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
                            <label class="form-label">Manager Phone No.</label>
                            <input placeholder="Enter Manager Phone No." class="form-control" id="m_phone" type="text" name="m_phone"  value="{{ old('m_phone') }}"  required>
                            @error('m_phone')
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
                            <label class="form-label">Manager Email ID</label>
                            <input placeholder="Enter Manager Email Id" class="form-control" id="m_email" type="text" name="m_email"  value="{{ old('m_email') }}"  required>
                            @error('m_email')
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