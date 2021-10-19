 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
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

     <div class="row">


         <div class="col-xl-9 col-lg-8">
             <div class="card">
                 <div class="card-header" style="justify-content: space-between;">
                     <div class="card-title">Add New Rate Details</div>
                     <div class="text-right">
                         <button type="button" style="float: right;" name="action" class="btn  btn-primary"
                             onclick="hideShowWeight()">Add Weight Category</button>
                     </div>
                 </div>
                 <form action="{{ route('rate_master.rates_store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body" style="display: none;" id="myDIV">
                         <div class="card-title font-weight-bold">Weight Category info:</div>
                         <div class="row">
                             <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                     <label class="form-label">Add Weight Category :-</label>
                                     <input placeholder="Enter Your Weight Category" class="form-control" id="price"
                                         type="text" name="Rates" value="{{ old('Rates') }}" required>
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
                         <div class="card-footer text-right">
                             <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                             <a href="/rate_master/create" class="btn btn-danger">Cancle</a>
                         </div>
                     </div>
                 </form>


                 <form action="{{ route('rate_master.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">

                         <div class="card-title font-weight-bold">Rate info:</div>
                         <div class="row">
                             @php
                                 $c_id = session()->get('c_id');
                                 $rate = App\Models\supplier_details::where([['c_id', $c_id], ['status', 1]])->get();
                                 // echo $rate;
                             @endphp
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="form-label">packet Supplier</label>
                                     <select id="s_id" name="s_id" required class="form-control select2">
                                         <optgroup label="Supplier">
                                             <option value="" disabled selected>Choose Supplier</option>
                                             @if (count($rate) > 0)
                                                 @foreach ($rate as $value)
                                                     <option value="{{ $value->s_id }}">{{ $value->s_name }}
                                                     </option>
                                                     {{-- <option value="ALOK IMPEX">ALOK IMPEX </option> --}}

                                                 @endforeach
                                             @endif
                                         </optgroup>
                                     </select>
                                     @error('Rate_id')
                                         <small class="errorTxt1">
                                             <div id="title-error" class="error" style="margin-left:3rem">
                                                 {{ $message }}
                                             </div>
                                         </small>
                                     @enderror
                                 </div>
                             </div>
                             @php
                                 $rates = App\Models\rate::get();
                             @endphp
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <h4><label class="form-label">Select Rate :-</label></h4>
                                     <select id="r_id" name="r_id" required class="form-control select2">
                                         <optgroup label="Rate">
                                             <option value="" disabled selected>Choose Rate</option>
                                             @if (count($rates) > 0)
                                                 @foreach ($rates as $value)
                                                     <option value="{{ $value->r_id }}">{{ $value->wt_category }}
                                                     </option>
                                                     {{-- <option value="ALOK IMPEX">ALOK IMPEX </option> --}}

                                                 @endforeach
                                             @endif
                                         </optgroup>
                                     </select>
                                     @error('Rate_id')
                                         <small class="errorTxt1">
                                             <div id="title-error" class="error" style="margin-left:3rem">
                                                 {{ $message }}
                                             </div>
                                         </small>
                                     @enderror
                                 </div>
                             </div>
                         </div>
                         <div class="col-sm-6 col-md-6">
                             <div class="form-group">
                                 <label class="form-label">Labour :-</label>
                                 <input placeholder="Enter Your price" class="form-control inputField" id="price"
                                     type="text" name="price" value="{{ old('price') }}" required>
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
                     <div class="card-footer text-right">
                         <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                         <a href="/rate_master" class="btn btn-danger">Cancle</a>
                     </div>
                 </form>
             </div>


         </div>
     </div>
     </div>
     <!-- End Row-->

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

         // Add Categoriey to form 
         function hideShowWeight() {
             var x = document.getElementById('myDIV');
             if (x.style.display === 'block') {
                 x.style.display = 'none';
             } else {
                 x.style.display = 'block';
             }
         }



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
