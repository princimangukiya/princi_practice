 @extends('app')
 @section('content')

     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
     @endphp
     <style>
         .hidden {
             display: none;
         }

     </style>
     <!--Page header-->
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Add Diamond Packet</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/diamond"><i class="fe fe-layers mr-2 fs-14"></i>Diamond</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="/diamond">Diamond Purchase List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Add Diamond</a></li>
             </ol>
         </div>
         <a href="/rate-master/create">
             <button id="rateMaster" class="btn  btn-primary hidden" style="float: right;">Enter Rate</button></a>
     </div>

     <!--End Page header-->
     <!--/div-->


     <div class="row">
         <div class="col-xl-12 col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <div class="card-title">Add New Diamond Packet</div>

                 </div>

                 <div class="card-body">
                     @php
                         $c_id = session()->get('c_id');
                         $supplier1 = App\Models\supplier_details::where([['c_id', $c_id], ['status', 1]])->get();
                     @endphp
                     <div class="card-title font-weight-bold">Packet info:</div>
                     <div class="row">
                         <div class="col-sm-6 col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Enter Bill Date</label>
                                 <input placeholder="Enter Date:-" class="form-control" id="Bill_date" type="date"
                                     name="bill_date" value="" required>
                                 @error('bill_date')
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
                                 <label class="form-label">Packet Supplier</label>
                                 <select id="s_id" name="s_name" required class="form-control select2">
                                     <optgroup label="Supplier">
                                         <option value="" disabled selected>Choose Supplier</option>
                                         @if (count($supplier1) > 0)
                                             @foreach ($supplier1 as $value)
                                                 <option value="{{ $value->s_id }}">{{ $value->s_name }}</option>
                                             @endforeach
                                         @endif
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
                                 <label class="form-label">BarCode Value</label>
                                 <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                                     value="{{ old('bar_code') }}" placeholder="Enter Bar Code" autofocus>
                                 @error('bar_code')
                                     <small class="errorTxt1">
                                         <div id="title-error" class="error" style="margin-left:3rem">
                                             {{ $message }}
                                         </div>
                                     </small>
                                 @enderror
                             </div>
                         </div>
                         @php
                             $shape = App\Models\Diamond_Shape::all();
                         @endphp
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Packet Shape</label>
                                 <select id="shape_id" name="shape_id" required class="form-control select2">
                                     <optgroup label="Shapes">
                                         <option value="" disabled selected>Choose Diamond Shape</option>
                                         @if (count($shape) > 0)
                                             @foreach ($shape as $shapevalue)
                                                 <option value="{{ $shapevalue->shape_id }}">
                                                     {{ $shapevalue->shape_name }}
                                                 </option>
                                             @endforeach
                                         @endif
                                     </optgroup>
                                 </select>
                                 @error('shape_id')
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
                                 <label class="form-label">Packet Weight </label>
                                 <input placeholder="Enter Packet Wt" class="form-control inputField" id="d_wt" type="text"
                                     name="d_wt" value="0." required>
                                 @error('d_wt')
                                     <small class="errorTxt1">
                                         <div id="title-error" class="error" style="margin-left:3rem">
                                             {{ $message }}
                                         </div>
                                     </small>
                                 @enderror
                             </div>
                         </div>
                     </div>
                     {{-- @php
                         $time = Carbon\Carbon::now();
                         //  echo $time;
                     @endphp
                     <input class="form-control" id="time" type="hidden" name="d_wt" value="{{ $time }}"
                         required> --}}
                     <div class="card-footer text-right">
                         <button type="submit" id="addData" name="addData" onClick="addData()"
                             class="btn  btn-primary">Submit</button>
                         <a href="/diamond" class="btn btn-danger">Cancle</a>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End Row-->
         <div class="col-xl-12 col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <div class="card-title">Diamond Purchase Data</div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                             <thead>
                                 <tr>
                                     {{-- <th class="border-bottom-0">#</th> --}}
                                     <th class="border-bottom-0">Party Name</th>
                                     <th class="border-bottom-0">Bar Code</th>
                                     <th class="border-bottom-0">Weight</th>
                                     {{-- <th>Package</th> --}}
                                     <th class="border-bottom-0">Shape</th>
                                     <th class="border-bottom-0">Buy Date</th>
                                     <th class="border-bottom-0">Hidden Date</th>
                                     {{-- <th class="border-bottom-0">Action</th> --}}


                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
         var id, mytable;
         $(document).ready(function() {
             mytable = $('#tblItemShow').DataTable({
                 "paging": true,
                 "lengthChange": false,
                 "searching": true,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
                 "sDom": 'lfrtip',

                 columnDefs: [{
                     className: "hide",
                     "targets": [0]
                 }, ],
                 "order": [
                     [5, "desc"]
                 ]
             });
             mytable.columns(5).visible(false);
         });

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

         //FUNCTION FOR DIAMOND ADD
         function addData() {
             // alert(id);
             var barcode = $('#bar_code').val();
             var weight = $('#d_wt').val();
             var shape = $('#shape_id').val();
             var s_id = $('#s_id').val();
             var bill_date = $('#Bill_date').val();
             var shapevalue = $('#shape_id').find(":selected").text();
             var partyName = $('#s_id').find(":selected").text();
             var c_id = '{{ Session::get('c_id') }}';
             var today = new Date();
             //  alert(today);
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 type: 'POST',
                 url: '{{ route('diamond.store') }}',
                 data: {
                     'bar_code': barcode,
                     'd_wt': weight,
                     'shape_id': shape,
                     's_id': s_id,
                     'bill_date': bill_date
                 },
                 dataType: 'json',

                 success: function(response_msg) {
                     //  alert(response_msg.success);
                     if (response_msg.success == 312) {
                         var msg = "<b></b> Barcode already exist";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 200) {

                         mytable.row.add([partyName, barcode, weight, shapevalue, bill_date, today]);
                         mytable.draw();
                         $('#bar_code').val('');
                         $('#d_wt').val('0.');
                         $('#bill_date').focus();
                         var msg = "<b>Success:</b> Well done Diamond Added Successfully";
                         var type = "success";
                         alertShow(msg, type);
                     } else if (response_msg.success == 311) {
                         var msg = "<b>Please :</b> First Enter Rates in Rate Master!";
                         var type = "error";
                         alertShow(msg, type);
                         document.getElementById("rateMaster").classList.remove('hidden');
                     } else if (response_msg.success == 320) {
                         var msg = "<b>Daimond :</b>Already Assign Other Supplier!";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 408) {
                         var msg = "Something Went Wrong !!";
                         var type = "error";
                         alertShow(msg, type);
                     } else {
                         var msg = "<b>Please :</b> Fill all the fields!";
                         var type = "error";
                         alertShow(msg, type);
                     }

                 }
             });
         }
     </script>

 @endsection
