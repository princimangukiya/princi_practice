 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
     @endphp
     <!--Page header-->

     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Add Manager Details</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/manager"><i class="fe fe-layers mr-2 fs-14"></i>Manager</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="/manager">Manager List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Add Manager</a></li>
             </ol>
         </div>
     </div>
     <!--End Page header-->
     {{-- <form id="addManagerForm" action="{{ route('manager.store') }}" method="POST" enctype="multipart/form-data">
         @csrf --}}
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
                                 <input id="m_name" type="text" name="m_name" class="form-control inputField"
                                     value="{{ old('m_name') }}" placeholder="Enter Manager Name" autofocus required>
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
                                 <label class="form-label">Manager Phone No.</label>
                                 <input placeholder="Enter Manager Phone No." class="form-control inputField" id="m_phone"
                                     type="text" name="m_phone" value="{{ old('m_phone') }}" required>
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
                                 <input placeholder="Enter Manager Email Id" class="form-control inputField" id="m_email"
                                     type="text" name="m_email" value="{{ old('m_email') }}" required>
                                 @error('m_email')
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
                                 <textarea id="m_address" type="text" name="m_address" class="form-control mb-4 inputField"
                                     rows="3" value="{{ old('m_address') }}" placeholder="Enter Manager Address" required
                                     style="margin-top: 0px; margin-bottom: 16px; height: 81px;"></textarea>
                                 {{-- <input id="m_address" type="text" name="m_address" class="form-control inputField"
                                        value="{{ old('m_address') }}" placeholder="Enter Manager Address" required> --}}
                                 @error('m_address')
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
                     <button type="submit" name="action" class="btn  btn-primary" onclick="addManager()">Submit</button>
                     <a href="/manager" class="btn btn-danger">Cancle</a>
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
                     addManager();
                 }
             }
         });
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
             // mytable.row.add([id, 'pkt1', '10.5']);
             // mytable.draw();
         });

         function addManager() {
             //  alert("calling");
             var mName = $('#m_name').val();
             var mAddress = $('#m_address').val();
             var mPhone = $('#m_phone').val();
             var mEmail = $('#m_email').val();
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 type: 'POST',
                 url: '{{ route('manager.store') }}',
                 data: {
                     'm_name': mName,
                     'm_address': mAddress,
                     'm_phone': mPhone,
                     'm_email': mEmail
                 },
                 dataType: 'json',
                 success: function(response_msg) {
                     // alert(response_msg.success);
                     if (response_msg.success == 312) {
                         //  alert('Please,');
                         var msg = "Email ID Already Exits..!!";
                         var type = "error";
                         alertShow(msg, type);
                         //location.reload();
                     } else if (response_msg.success == 200) {
                         window.location.replace('/manager');
                     } else if (response_msg.success == 408) {
                         var msg = "Something Went Wrong !!";
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

         //  function addManager() {
         //      notif({
         //          msg: "<b>Success:</b> Well done Manager Added Successfully",
         //          type: "success"
         //      });
         //  }
     </script>
 @endsection
