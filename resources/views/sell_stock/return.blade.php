 @extends('app')
 @section('page-title')
     Sell Diamond
 @endsection

 @section('content')
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0"> Add Sell Diamond </h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/sell-stock"><i class="fe fe-layout mr-2 fs-14"></i>Sell Stock List</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page"><a href=""> Add Sell stock </a></li>
             </ol>
         </div>
     </div>
     <!--End Page header-->
     <!-- Row -->
     <div class="card">
         <div class="card-header">
             <div class="card-title">Sell Diamond</div>
         </div>
         @php
             $c_id = session()->get('c_id');
             $supplier = App\Models\supplier_details::where('c_id', $c_id)->get();
         @endphp
         <div class="row" style="padding: 20px;">
             <div class="col-sm-6 col-md-6">
                 <div class="form-group">
                     <label class="form-label">Enter Date </label>
                     <input placeholder="Enter Date:-" class="form-control" id="Date" type="date" name="date" value=""
                         required>
                     @error('date')
                         <small class="errorTxt1">
                             <div id="title-error" class="error" style="margin-left:3rem">
                                 {{ $message }}
                             </div>
                         </small>
                     @enderror
                 </div>
             </div>
             <div class="col-md-6 col-sm-6">
                 <div class="form-group">
                     <h4><label class="form-label">Select Company </label></h4>
                     <select id="s_id" name="s_id" required class="form-control select2">
                         <optgroup label="Company">
                             <option value="" disabled selected>Choose Company</option>
                             @if (count($supplier) > 0)
                                 @foreach ($supplier as $value)
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
                     <label class="form-label">BarCode Value </label>
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
         </div>
         <div class="card-footer text-right" style="padding-right: 10% ">
             <button id="addTOManager" name="addTOManager" onClick="addSellDia('hello')"
                 class="btn  btn-primary">Submit</button>
             <a href="/sell-stock" class="btn btn-danger">Cancle</a>
         </div>
     </div>
     <div class="card">
         <div class="card-header">
             <div class="card-title">Sell Diamond Details</div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                     <thead>
                         <tr>
                             <th class="border-bottom-0">Company Name</th>
                             <th class="border-bottom-0">Bar Code</th>
                             <th class="border-bottom-0">Date</th>
                         </tr>
                     </thead>
                 </table>
             </div>
         </div>
     </div>
     <!--/div-->

     <!-- /Row -->




     <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.js') }}"></script>

     <script>
         $(document).ready(function() {
             mytable = $('#tblItemShow').DataTable({
                 "paging": true,
                 "lengthChange": false,
                 "searching": true,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
                 "sDom": 'lfrtip'
             });
             // mytable.row.add([id, 'pkt1', '10.5']);
             // mytable.draw();
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
                     addSellDia();
                 }
             }
         });
     </script>
     <script>
         function addSellDia(id) {
             //  alert(id);
             var barcode = $('#bar_code').val();
             var s_id = $('#s_id').val();
             var supplier_name = $('#s_id').find(":selected").text();
             var date = $('#Date').val();
             var c_id = '{{ Session::get('c_id') }}';

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 type: 'POST',
                 url: '{{ route('sell_stock.store') }}',
                 data: {
                     'bar_code': barcode,
                     's_id': s_id,
                     'date': date
                 },
                 dataType: 'json',
                 success: function(response_msg) {
                     if (response_msg.success == 320) {
                         var msg = "<b>Please,</b> choose the right Supllier!!";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 200) {
                         mytable.row.add([supplier_name, barcode, date]);
                         mytable.draw();
                         $('#bar_code').val('');
                         $('#bar_code').focus();
                         var msg = "<b>Success:</b> Well done Diamond Added Successfully";
                         var type = "success";
                         alertShow(msg, type);
                     } else if (response_msg.success == 318) {
                         if (c_id == 1) {
                             $('#bar_code').focus();
                             var msg = "You can not assign EKLINGJI GEMS Barcode to VmJewles!!";
                             var type = "error";
                             alertShow(msg, type);
                         } else {
                             $('#bar_code').focus();
                             var msg = "You can not assign VmJewles Barcode to EKLINGJI GEMS!!";
                             var type = "error";
                             alertShow(msg, type);
                         }
                     } else if (response_msg.success == 314) {
                         var msg = "Your Barcode is not valid!!";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 322) {
                         var msg = "<b>This Diamond,</b> Is Added In Defective Piece !!";
                         var type = "error";
                         alertShow(msg, type);
                         $('#bar_code').focus();
                     } else if (response_msg.success == 408) {
                         var msg = "Something Went Wrong !!";
                         var type = "error";
                         alertShow(msg, type);
                     } else if (response_msg.success == 325) {
                         var msg = "Your Barcode Not Valid Please Check Sell Stock!!";
                         var type = "error";
                         alertShow(msg, type);
                     } else {
                         var msg = "Please, Fill all the fields!!";
                         var type = "error";
                         alertShow(msg, type);
                     }

                 }
             });
         }
     </script>

 @endsection
