 @extends('app')
 @section('page-title')
     Rate Master
 @endsection

 @section('content')
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Rate Master</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Rate Master</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Rate Master List</a></li>
             </ol>
         </div>
         <div class="page-rightheader">
             <div class="btn btn-list">
                 <a href="{{ route('rate_master.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                     Add
                     Rate </a>

             </div>
         </div>
     </div>
     <!--End Page header-->
     <div class="row">
         <div class="col-12">
             <!--div-->
             <div class="card">
                 <div class="card-header">
                     <div class="card-title">Rates Details</div>
                 </div>
                 <div class="card-body">
                     <div>
                         <div class="table-responsive">
                             <table id="rate_Master" class="table table-bordered text-nowrap key-buttons">
                                 <thead>
                                     <tr>
                                         @php
                                             $c_id = session()->get('c_id');
                                             $rate = App\Models\rate::where('c_id', $c_id)->get();
                                             // echo $rate;
                                         @endphp
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Action</th>
                                         <th class="border-bottom-0">Company Name</th>
                                         @foreach ($rate as $value)
                                             <th class="border-bottom-0">{{ $value->wt_category }}</th>
                                         @endforeach

                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                         // echo $rates;
                                     @endphp

                                     @foreach ($rates as $key => $value)
                                         <tr>
                                             <td>
                                                 {{ $key + 1 }}
                                             </td>
                                             <td class="align-middle"
                                                 style="display: flex; align-items: center;justify-content: space-evenly;">
                                                 <a href="{{ route('rate_master.edit', ['id' => $value->Rate_id]) }}">
                                                     <div class="btn-group align-top">
                                                         <button class="btn btn-sm btn-success" type="button"
                                                             data-toggle="modal"
                                                             data-target="#user-form-modal">Edit</button>
                                                         <button class="btn btn-sm btn-success" type="button"><i
                                                                 class="fe fe-edit-2"></i></button>
                                                     </div>
                                                 </a>
                                                 <div class="btn-group align-top">
                                                     <button class="btn btn-sm btn-danger diaDeleteBtn" data-toggle="modal"
                                                         id="smallButton" data-target="#smallModal"
                                                         data-href="{{ route('rate_master.destroy', $value->Rate_id) }}">Delete
                                                         <i class="fe fe-trash-2"></i></button>
                                                 </div>
                                                 {{-- <form action="{{ route('rate_master.destroy', $value->Rate_id) }}"
                                                     method="post">
                                                     @csrf
                                                     <div class="btn-group align-top">
                                                         <button class="btn btn-sm btn-danger">Delete</button>
                                                         <button class="btn btn-sm btn-danger"><i
                                                                 class="fe fe-trash-2"></i></button>
                                                     </div>
                                                 </form> --}}
                                             </td>
                                             @foreach ($supplier_name as $key => $item)
                                                 @if ($value->s_id == $item->s_id)
                                                     <td>
                                                         {{ $item->s_name }}
                                                         @if ($value->rate_cat_pcs == null)
                                                             {{-- <button class="btn btn-secondary" data-placement="top"
                                                                 data-toggle="tooltip-primary" title="Tooltip on top"
                                                                 type="button">Hover me</button> --}}
                                                             <button class="btn" data-placement="top"
                                                                 data-toggle="tooltip"
                                                                 title="Not Selected Weight Category For Rate Count With Pics."
                                                                 type="button"><i class="fa fa-warning"
                                                                     style="color: red"></i></button>
                                                             <div class="tooltip bs-tooltip-top" role="tooltip">
                                                                 <div class="arrow"></div>
                                                                 <div class="tooltip-inner">

                                                                 </div>
                                                             </div>

                                                         @endif
                                                     </td>
                                                 @endif

                                             @endforeach
                                             @php
                                                 $decoded_data = json_decode($value['json_price'], true);
                                                 $decoded_data = $decoded_data[0];
                                                 $data = json_decode(showData($decoded_data, $rate));
                                                 $count = 0;
                                                 $RateWt = 0;
                                                 if ($value->rate_cat_pcs != null) {
                                                     foreach ($rate as $wtCat) {
                                                         if ($value->rate_cat_pcs == $wtCat->r_id) {
                                                             break;
                                                         }
                                                         $RateWt = $count + 1;
                                                         $count = $RateWt;
                                                     }
                                                 }
                                             @endphp
                                             @foreach ($data as $key => $item)
                                                 <td>{{ $item }}
                                                     @if ($value->rate_cat_pcs != null)
                                                         @if ($key == $count)
                                                             <span class="badge badge-pill badge-danger mt-2">Pcs</span>
                                                         @endif
                                                     @endif
                                                 </td>
                                             @endforeach


                                         </tr>
                                     @endforeach
                                     @if (!$rates->isEmpty())
                                         <div class="modal fade" id="smallModal" tabindex="{{ $key + 1 }}"
                                             role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                             <div class="modal d-block pos-static">
                                                 <div class="modal-dialog" role="document">
                                                     <div class="modal-content modal-content-demo">
                                                         <div class="modal-header">
                                                             <h6 class="modal-title">Message Preview</h6><button
                                                                 aria-label="Close" class="close"
                                                                 data-dismiss="modal" type="button"><span
                                                                     aria-hidden="true">&times;</span></button>
                                                         </div>
                                                         <form id="diaDeleteModalForm" method="post">
                                                             @csrf
                                                             <div class="modal-body">

                                                                 <h6>Are You Sure To Delete Weight Category price ?</h6>
                                                                 <div style="display: flex;">
                                                                     <div class="col-6">
                                                                         <label class="form-label">Supplier Name</label>
                                                                         <select id="s_id" name="s_id" required
                                                                             class="form-control select2">
                                                                             <optgroup label="Supplier">
                                                                                 <option value="" disabled selected>Choose
                                                                                     Supplier
                                                                                 </option>
                                                                                 @if (count($supplier_name) > 0)
                                                                                     @foreach ($supplier_name as $value)
                                                                                         <option
                                                                                             value="{{ $value->s_id }}">
                                                                                             {{ $value->s_name }}
                                                                                         </option>
                                                                                     @endforeach
                                                                                 @endif
                                                                             </optgroup>
                                                                         </select>
                                                                     </div>
                                                                     <div class="col-6">
                                                                         <h4><label class="form-label">Select Weight
                                                                                 Categorey
                                                                             </label></h4>
                                                                         <select id="r_id" name="r_id" required
                                                                             class="form-control select2">
                                                                             <optgroup label="Rate">
                                                                                 <option value="" disabled selected>Choose
                                                                                     Weight
                                                                                     Category</option>
                                                                                 @if (count($rate) > 0)
                                                                                     @foreach ($rate as $value)
                                                                                         <option
                                                                                             value="{{ $value->r_id }}">
                                                                                             {{ $value->wt_category }}
                                                                                         </option>
                                                                                     @endforeach
                                                                                 @endif
                                                                             </optgroup>
                                                                         </select>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="modal-footer">
                                                                 <form id="diaDeleteModalForm" method="post">
                                                                     @csrf
                                                                     <button class="btn btn-indigo" type="submit"
                                                                         value='success alert' id='click'>Delete
                                                                         Weight Category</button>
                                                                     <button class="btn btn-secondary" type="button"
                                                                         data-dismiss="modal">Close</button>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>

                                         </div>
                                     @endif
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
             <!--/div-->


         </div>
     </div>
     <!-- /Row -->

     </div>
     </div><!-- end app-content-->
     </div>
     @php
         function showData($decoded_data, $p_rate)
         {
             $price = [];
             for ($i = 0; $i < count($p_rate); $i++) {
                 $token = 0;
                 foreach ($decoded_data as $key => $rate) {
                     if ($p_rate[$i]['r_id'] == $key) {
                         array_push($price, $rate);
                         $token = 1;
                     }
                 }
         
                 if ($token == 0) {
                     array_push($price, '-');
                 }
             }
         
             return json_encode($price);
         }
     @endphp
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
     {{-- <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --> --}}
     <script>
         $(document).ready(function() {
             $('[data-toggle="tooltip-primary"]').tooltip();
         });
         $(document).ready(function() {
             RateTabel = $('#rate_Master').DataTable({
                 "autoWidth": false,
                 "info": true,
                 "paging": true,
                 "lengthChange": false,
                 "pageLength": 50,
                 "sDom": 'lfrtip',
                 "ordering": true,
                 "searching": true,
             });
         });
         $(".diaDeleteBtn").on('click', function() {
             var deleteUrl = $(this).data("href");
             //  alert(deleteUrl);
             $('#diaDeleteModalForm').attr('action', deleteUrl);
         });
     </script>



 @endsection
