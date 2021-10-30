 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
     @endphp
     <!--Page header-->

     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Add Supplier Details</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/supplier"><i class="fe fe-layers mr-2 fs-14"></i>Supplier</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="/supplier">Supplier List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Add Supplier</a></li>
             </ol>
         </div>
     </div>
     <!--End Page header-->

     <div id="result"></div>
     {{-- <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row"> --}}


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
                             <input id="s_name" type="text" name="s_name" class="form-control inputField"
                                 value="{{ old('s_name') }}" placeholder="Enter Supplier Name" autofocus>
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
                             <label class="form-label">Supplier Gst </label>
                             <input placeholder="Enter Supplier Gst" class="form-control inputField" id="s_gst" type="text"
                                 name="s_gst" value="{{ old('s_gst') }}" style="text-transform:uppercase" required>
                             @error('s_gst')
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
                             <label class="form-label">Supplier Phone No. </label>
                             <input id="s_Phone" type="text" name="s_phone" class="form-control inputField"
                                 value="{{ old('s_phone') }}" placeholder="Enter Supplier Phone No." autofocus>
                             @error('s_phone')
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
                             <label class="form-label">Supplier Email </label>
                             <input placeholder="Enter Supplier Email" class="form-control inputField" id="s_Email"
                                 type="text" name="s_email" value="{{ old('s_email') }}" required>
                             @error('s_email')
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
                             <textarea id="s_address" type="text" name="s_address" class="form-control mb-4 inputField"
                                 rows="3" value="{{ old('s_address') }}" placeholder="Enter Supplier Address" required
                                 style="margin-top: 0px; margin-bottom: 16px; height: 81px;"></textarea>
                             {{-- <input id="s_address" type="text" name="s_address" class="form-control inputField"
                                        value="{{ old('s_address') }}" placeholder="Enter Supplier Address" required> --}}
                             @error('s_address')
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
                 <button type="submit" onclick="addSupplier()" name="action" class="btn  btn-primary">Submit</button>
                 <a href="/supplier" class="btn btn-danger">Cancle</a>
             </div>

         </div>
     </div>
     </div>
     <!-- End Row-->
     {{-- </form> --}}

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
                     addSupplier();
                 }
             }
         });

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

         function addSupplier() {
             //  alert("calling");
             var sName = $('#s_name').val();
             var sAddress = $('#s_address').val();
             var sGst = $('#s_gst').val();
             var sphone = $('#s_Phone').val();
             var semail = $('#s_Email').val();
             //  var mEmail = $('#m_email').val();
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 type: 'POST',
                 url: '{{ route('supplier.store') }}',
                 data: {
                     's_name': sName,
                     's_address': sAddress,
                     's_gst': sGst,
                     's_phone': sphone,
                     's_email': semail
                 },
                 dataType: 'json',
                 success: function(response_msg) {
                     //  alert(response_msg.success);
                     if (response_msg.success == 200) {
                         window.location.replace('/rate-master/create');
                     } else if (response_msg.success == 312) {
                         var msg = "S_GST No. Already Exits..!!";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 408) {
                         var msg = "Something Went Wrong!!";
                         var type = "error";
                         alertShow(msg, type);
                     } else {
                         var msg = "<b>Please,</b> Fill all the fields!";
                         var type = "error";
                         alertShow(msg, type);
                         //  alert("");
                     }

                 }
             });
         }
     </script>
 @endsection
