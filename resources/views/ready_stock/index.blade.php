 @extends('app')
 @section('page-title')
     Ready Stock
 @endsection

 @section('content')
     <style>
         .table {
             width: 100%;
             margin: 0 auto;
         }

     </style>
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Ready Stock</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Ready Stock List</a></li>
             </ol>
         </div>
         <div class="page-rightheader">
             <div class="btn btn-list">
                 <a href="{{ route('ready_stock.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                     Return Diamond From Manager </a>

             </div>
         </div>
     </div>
     <!--End Page header-->
     <!-- Row -->
     <div class="row">
         <div class="col-12">
             <!--div-->
             <div class="card">
                 <div class="card-header">
                     <div class="card-title">Ready Stock Data</div>
                 </div>
                 <div class="card-body">
                     <div class="___class_+?17___">
                         <div class="table-responsive">
                             <table id="Diamond_Data" class="table table-bordered text-wrap key-buttons">
                                 <thead>
                                     <tr>
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Manager Name</th>
                                         <th class="border-bottom-0">Party Supplier</th>
                                         <th class="border-bottom-0">Bar Code</th>
                                         <th class="border-bottom-0">Rough Weight</th>
                                         <th class="border-bottom-0">Polish Weight</th>
                                         {{-- <th>Package</th> --}}
                                         <th class="border-bottom-0">Shape</th>
                                         <th class="border-bottom-0">Price</th>
                                         <th class="border-bottom-0">Date</th>
                                         <th class="border-bottom-0">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($ready_stock as $key => $value)
                                         <tr>
                                             @if ($value->Diamond->status == 0)
                                                 <td style="background-color: #dc0441;">
                                                     {{ $key + 1 }}
                                                 </td>
                                             @else
                                                 <td>
                                                     {{ $key + 1 }}
                                                 </td>
                                             @endif
                                             <td>
                                                 {{ $value->Manager->m_name }}
                                             </td>
                                             <td>
                                                 @php
                                                     $s_name = App\Models\supplier_details::where('s_id', $value->Diamond->s_id)->first('s_name');
                                                 @endphp
                                                 {{ $s_name['s_name'] }}
                                             </td>
                                             @if ($value->Diamond->status == 0)
                                                 <td style="background-color: #dc0441;">
                                                     {{ $value->Diamond->d_barcode }}
                                                 </td>
                                             @else
                                                 <td>
                                                     {{ $value->Diamond->d_barcode }}
                                                 </td>
                                             @endif
                                             <td>
                                                 {{ $value->Diamond->d_wt }}
                                             </td>
                                             <td>
                                                 {{ $value->d_n_wt }}
                                             </td>
                                             <td>
                                                 @php
                                                     $shape_name = App\Models\Diamond_Shape::where('shape_id', $value->Diamond->shape_id)->first('shape_name');
                                                 @endphp
                                                 {{ $shape_name['shape_name'] }}
                                             </td>
                                             <td>
                                                 {{ $value->Diamond->price }}
                                             </td>
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->return_date)) }}
                                             </td>
                                             </td>
                                             @if ($value->dif_pcs == 0)
                                                 <td class="text-center">
                                                     <a href="/defective-pcs">
                                                         <button class="btn btn-sm btn-info" type="button">View <i
                                                                 class="zmdi zmdi-eye"></i></button></a>
                                                 </td>
                                             @else
                                                 <td class="align-middle"
                                                     style="display: flex; align-items: center;justify-content: space-evenly;">
                                                     <a href="{{ route('ready_stock.edit', ['id' => $value->r_id]) }}"
                                                         style="margin-right: 5px;">
                                                         <div class="btn-group align-top">
                                                             <button class="btn btn-sm btn-success" type="button"
                                                                 data-toggle="modal"
                                                                 data-target="#user-form-modal">Edit</button>
                                                             <button class="btn btn-sm btn-success" type="button"><i
                                                                     class="fe fe-edit-2"></i></button>
                                                         </div>
                                                     </a>
                                                     <div class="btn-group align-top">
                                                         <button class="btn btn-sm btn-danger diaDeleteBtn"
                                                             data-toggle="modal" id="smallButton"
                                                             data-id="{{ $value->r_id }}" data-target="#smallModal"
                                                             data-href="{{ route('ready_stock.destroy', $value->r_id) }}">Delete
                                                             <i class="fe fe-trash-2"></i></button>
                                                     </div>
                                                 </td>
                                             @endif
                                         </tr>
                                     @endforeach
                                     @if (!$ready_stock->isEmpty())
                                         <div class="modal fade" id="smallModal" role="dialog"
                                             aria-labelledby="smallModalLabel" aria-hidden="true">
                                             <div class="modal d-block pos-static">
                                                 <div class="modal-dialog" role="document">
                                                     <div class="modal-content modal-content-demo">
                                                         <div class="modal-header">
                                                             <h6 class="modal-title">Message Preview</h6><button
                                                                 aria-label="Close" class="close"
                                                                 data-dismiss="modal" type="button"><span
                                                                     aria-hidden="true">&times;</span></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <h6>Are You Sure To Delete Diamond {{ $value->r_id }}?</h6>

                                                         </div>
                                                         <div class="modal-footer">
                                                             <form id="diaDeleteModalForm" method="post">
                                                                 @csrf
                                                                 <button class="btn btn-indigo" type="submit"
                                                                     value='success alert' id='click'>Delete
                                                                     Diamond</button>
                                                                 <button class="btn btn-secondary" type="button"
                                                                     data-dismiss="modal">Close</button>
                                                             </form>
                                                         </div>
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
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>

     <script>
         $(document).ready(function() {
             DaimondTabel = $('#Diamond_Data').DataTable({
                 "autoWidth": false,
                 "info": true,
                 "paging": true,
                 "lengthChange": false,
                 "pageLength": 50,
                 "sDom": 'lfrtip',
                 "ordering": true,
                 "searching": true,
                 "order": [
                     [0, "desc"]
                 ]
             });
         });
         $(".diaDeleteBtn").on('click', function() {
             var deleteUrl = $(this).data("href");
             $('#diaDeleteModalForm').attr('action', deleteUrl);
         });
     </script>
 @endsection
