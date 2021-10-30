 @extends('app')
 @section('content')
     <!--/app header-->
     @php
         
         $avatar = 'assets/images/users/2.jpg';
         
     @endphp
     <!--Page header-->

     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Edit Rates Details</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/rate-master"><i class="fe fe-layers mr-2 fs-14"></i>Rate Master</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="/rate-master">Rates List</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Edit Rates</a></li>
             </ol>
         </div>
     </div>
     <!--End Page header-->

     <form action="{{ route('rate_master.update', $rate_master->Rate_id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">

             <div class="col-xl-9 col-lg-8">
                 <div class="card">
                     <div class="card-header">
                         <div class="card-title">Edit Rate Details</div>
                     </div>

                     <div class="card-body">
                         <div class="___class_+?14___">
                             <div class="table-responsive">
                                 <div class="card-title font-weight-bold">Rate info:</div>
                                 <div class="row">
                                     @php
                                         $c_id = session()->get('c_id');
                                         $rate = App\Models\supplier_details::where('c_id', $c_id)->get();
                                     @endphp
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h4><label class="form-label">Select Company :-</label></h4>
                                             <select id="c_id" name="c_id" required class="form-control select2 inputField">
                                                 <optgroup label="Company">
                                                     <option value="" disabled selected>Choose Company</option>
                                                     @if (count($rate) > 0)
                                                         @foreach ($rate as $value)
                                                             <option value="{{ $value->s_id }}"
                                                                 {{ $rate_master->s_id == $value->s_id ? 'selected="selected"' : '' }}>
                                                                 {{ $value->s_name }}
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
                                         $c_id = Session()->get('c_id');
                                         $rates = App\Models\rate::where('c_id', $c_id)->get();
                                     @endphp
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h4><label class="form-label">Select Weight Category :-</label></h4>
                                             <select id="r_id" name="r_id" required class="form-control select2 inputField">
                                                 <optgroup label="Rate" value="{{ $rate_master->r_id }}">
                                                     <option value="" disabled selected>Select Weight Category</option>
                                                     @if (count($rates) > 0)
                                                         @foreach ($rates as $value)
                                                             <option value="{{ $value->r_id }}">
                                                                 {{ $value->wt_category }}
                                                             </option>
                                                         @endforeach
                                                     @endif
                                                 </optgroup>
                                             </select>
                                             @error('r_id')
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
                                             <label class="form-label">Price :-</label>
                                             <input placeholder="Enter Price " class="form-control inputField" id="s_gst"
                                                 type="text" name="Price" value="{{ $rate_master->json_Price }}">
                                             @error('s_gst')
                                                 <small class="errorTxt1">
                                                     <div id="title-error" class="error" style="margin-left:3rem">
                                                         {{ $message }}
                                                     </div>
                                                 </small>
                                             @enderror
                                         </div>
                                     </div>
                                     @php
                                         $price = json_decode($price);
                                         //  echo $rates;
                                     @endphp
                                     {{-- @if ($rate_master->rate_cat_pcs == null) --}}
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h4><label class="form-label">Select Weight Category for Rate Count
                                                     With Pcs:-</label></h4>
                                             <select id="r_id" name="rate_cat_pcs" required
                                                 class="form-control select2 inputField">
                                                 <optgroup label="Rate" value="">
                                                     <option value="" disabled selected>Select Weight Category</option>

                                                     @foreach ($price[0] as $key => $value)
                                                         @php
                                                             $r_id = $key;
                                                             foreach ($rates as $item) {
                                                                 if ($item->r_id == $key) {
                                                                     $wt_category = $item->wt_category;
                                                                 }
                                                             }
                                                         @endphp
                                                         <option value="{{ $r_id }}"
                                                             {{ $rate_master->rate_cat_pcs == $r_id ? 'selected="selected"' : '' }}>
                                                             {{ $wt_category }}
                                                         </option>
                                                     @endforeach
                                                     <option value="0">None Of Above</option>
                                                 </optgroup>
                                             </select>
                                             @error('r_id')
                                                 <small class="errorTxt1">
                                                     <div id="title-error" class="error" style="margin-left:3rem">
                                                         {{ $message }}
                                                     </div>
                                                 </small>
                                             @enderror
                                         </div>
                                     </div>
                                     {{-- @endif --}}
                                 </div>

                             </div>
                             <div class="card-footer text-right">
                                 <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                                 <a href="/rate-master" class="btn btn-danger">Cancle</a>
                             </div>

                         </div>
                     </div>
                 </div>
                 <!-- End Row-->
             </div>
         </div>
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
     </script>

 @endsection
