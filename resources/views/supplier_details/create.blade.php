@section('content')
<!--/app header-->
@php

$avatar = 'T3_Admin_Design/assets/images/users/2.jpg';

@endphp
<!--Page header-->

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Add Supplier Details</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Supplier List</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Supplier</a></li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div id="result"></div>
-->
<form  action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">

        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Supplier Details</div>

                </div>

                <div class="card-body">

                    <div class="card-title font-weight-bold">Supplier info:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Supplier Name </label>
                                <input id="s_name" type="text" name="s_name" class="form-control" value="{{ old('s_name') }}" placeholder="Enter Supplier Name" autofocus required>
                                @error('s_name')
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
                                <label class="form-label">Supplier Address</label>
                                <input id="s_address" type="text" name="s_address" class="form-control" value="{{ old('s_address') }}" placeholder="Enter Supplier Address" required>
                                @error('s_address')
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
                                <label class="form-label">Supplier Gst :-</label>
                                <input placeholder="Enter Supplier Gst" class="form-control" id="s_gst" type="text" name="s_gst" value="{{ old('s_gst') }}" required>
                                @error('s_gst')
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
                    <a href="#" class="btn btn-danger">Cancle</a>
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
       
        // $("#addSupplierForm").submit(function(e) {
          
        //     var sName = $('#s_name').val();
        //     var sAddress = $('#s_address').val();
        //     var sGst = $('#s_gst').val();
           
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: 'POST',
        //         url: '{{route('supplier.store')}}',
        //         data: {
        //             's_name': sName,
        //             's_address': sAddress,
        //             's_gst': sGst
        //         },
        //         dataType: 'json',
        //         success: function(response_msg) {
        //             // alert(response_msg.success);
        //             if (response_msg.success == 200) {
        //                 alert("GST Number Already Exist!");
        //                 //location.reload();
        //             } else if (response_msg.success == true) {
        //                 window.location.replace('/supplier');
        //             } else {
        //                 alert('Please, Fill all the fields!');
        //             }

        //         }
        //     });
        // });
    });
</script>
@endsection
@include('app')