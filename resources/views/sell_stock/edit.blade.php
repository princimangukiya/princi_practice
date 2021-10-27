 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         $c_id = session()->get('c_id');
         $manager = App\Models\Manager_Details::where('c_id', $c_id)->get();
     @endphp
     <!--Page header-->

     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Edit Sell Stock Details</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/sell-stock"><i class="fe fe-layers mr-2 fs-14"></i>Sell Stock</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="/sell-stock">Sell Stock List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Edit Sell Stock</a></li>
             </ol>
         </div>
     </div>
     <!--End Page header-->
     <form action="{{ route('sell_stock.update', $Diamond->sell_id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
             <div class="col-xl-9 col-lg-8">
                 <div class="card">
                     <div class="card-header">
                         <div class="card-title">Edit Sell Stock Details</div>
                     </div>

                     <div class="card-body">

                         <div class="card-title font-weight-bold">Manager info:</div>
                         @php
                             $c_id = session()->get('c_id');
                             $supplier = App\Models\supplier_details::where('c_id', $c_id)->get();
                         @endphp
                         <div class="row" style="padding: 20px;">
                             <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                     <label class="form-label">Enter Date </label>
                                     <input placeholder="Enter Date:-" class="form-control" id="Date" type="date"
                                         name="bill_date" value="{{ $Diamond->return_date }}" required>
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
                                                     <option value="{{ $value->s_id }}"
                                                         {{ $Diamond_purchase->s_id == $value->s_id ? 'selected="selected"' : '' }}>
                                                         {{ $value->s_name }}</option>
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
                                         value="{{ $Diamond_purchase->d_barcode }}" placeholder="Enter Bar Code"
                                         autofocus>
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

                     </div>
                     <div class="card-footer text-right">
                         <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                         <a href="/sell-stock" class="btn btn-danger">Cancle</a>
                     </div>

                 </div>
             </div>
         </div>
         <!-- End Row-->
     </form>

     <script>
         var currentBoxNumber = 0;
         $(".inputField").keyup(function(event) {
             if (event.keyCode == 13) {
                 textboxes = $("input.inputField");
                 currentBoxNumber = textboxes.index(this);
                 console.log(textboxes.index(this));
                 if (textboxes[currentBoxNumber + 0] != null) {
                     nextBox = textboxes[currentBoxNumber + 0];
                     nextBox.focus();
                     nextBox.select();
                     event.preventDefault();
                     return false;
                 } else {
                     addData();
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
     </script>
 @endsection
