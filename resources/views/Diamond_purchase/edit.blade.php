 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
     @endphp
     <!--Page header-->
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Add Diamond packet</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="#">User List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="#">Add User</a></li>
             </ol>
         </div>
     </div>
     <form action="{{ route('diamond.update', $Diamond->d_id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">

             <div class="col-xl-12 col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="card-title">Add New Diamond Packet</div>

                     </div>

                     <div class="card-body">
                         @php
                             $c_id = session()->get('c_id');
                             $supplier1 = App\Models\supplier_details::where('c_id', $c_id)->get();
                         @endphp
                         <div class="card-title font-weight-bold">Packet info:</div>
                         <div class="row">
                             <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                     <label class="form-label">Enter Bill Date :-</label>
                                     <input placeholder="Enter Date:-" class="form-control" id="bill_date" type="date"
                                         name="bill_date" value="{{ $Diamond->bill_date }}" required>
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
                                                     <option value="{{ $value->s_id }}"
                                                         {{ $Diamond->s_id == $value->s_id ? 'selected="selected"' : '' }}
                                                         {{ $value->status == 0 ? 'disabled="disabled"' : '' }}>
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
                                         value="{{ $Diamond->d_barcode }}" placeholder="Enter Bar Code" autofocus>
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
                                     <label class="form-label">Packet Weight :-</label>
                                     <input placeholder="Enter Packet Wt" class="form-control inputField" id="d_wt"
                                         type="text" name="d_wt" value="{{ $Diamond->d_wt }}" required autofocus>
                                     @error('d_wt')
                                         <small class="errorTxt1">
                                             <div id="title-error" class="error" style="margin-left:3rem">
                                                 {{ $message }}
                                             </div>
                                         </small>
                                     @enderror
                                 </div>
                             </div>
                             @php
                                 $shape = App\Models\Diamond_Shape::get();
                             @endphp
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="form-label">Packet Shape</label>
                                     <select id="shape_id" name="shape_id" required class="form-control select2">
                                         <optgroup label="Shapes">
                                             <option value="" disabled selected>Choose Diamond Shape</option>
                                             @if (count($shape) > 0)
                                                 @foreach ($shape as $shapevalue)
                                                     <option value="{{ $shapevalue->shape_id }}"
                                                         {{ $Diamond->shape_id == $shapevalue->shape_id ? 'selected="selected"' : '' }}>
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
                         </div>
                         <div class="card-footer text-right">
                             <button type="submit" id="addData" name="addData" onClick="addData()"
                                 class="btn  btn-primary">Submit</button>
                             <a href="/diamond" class="btn btn-danger">Cancle</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End Row-->
     </form>
     <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.js') }}"></script>

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
