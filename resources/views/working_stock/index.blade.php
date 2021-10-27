 @extends('app')
 @section('page-title')
     Diamond Give
 @endsection

 @section('content')
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Working Stock</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Working Stock</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Working Stock List</a></li>
             </ol>
         </div>
         <div class="page-rightheader">
             <div class="btn btn-list">
                 <a href="{{ route('working_stock.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                     Give Diamond To Manager </a>

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
                     <div class="card-title">Working Stock Data</div>
                 </div>
                 <div class="card-body">
                     <div class="">
                         <div class=" table-responsive">
                             <table id="Working_Diamond" class="table table-bordered text-wrap key-buttons">
                                 <thead>
                                     <tr>
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Manager Name</th>
                                         <th class="border-bottom-0">Bar Code</th>
                                         <th class="border-bottom-0">Weight</th>
                                         {{-- <th>Package</th> --}}
                                         <th class="border-bottom-0">Shape</th>
                                         <th class="border-bottom-0">Date</th>
                                         <th class="border-bottom-0">Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($working_stock as $key => $value)
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
                                             @php
                                                 $shape = App\Models\Diamond_Shape::where('shape_id', $value->Diamond->shape_id)->first();
                                             @endphp
                                             <td>
                                                 {{ $shape->shape_name }}
                                             </td>
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                             </td>
                                             @if ($value->dif_pcs == 0)
                                                 <td class="text-center">
                                                     <a href="/defective-pcs">
                                                         <button class="btn btn-sm btn-info" type="button">View <i
                                                                 class="zmdi zmdi-eye"></i></button></a>
                                                 </td>
                                             @else
                                                 <td class="text-center"
                                                     style="display: flex; align-items: center;justify-content: space-evenly;">
                                                     <a href="{{ route('working_stock.edit', ['id' => $value->w_id]) }}"
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
                                                             data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                             data-href="{{ route('working_stock.destroy', $value->w_id) }}">Delete
                                                             <i class="fe fe-trash-2"></i></button>
                                                     </div>
                                                 </td>
                                             @endif
                                         </tr>

                                     @endforeach
                                     @if (!$working_stock->isEmpty())
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
                                                         <div class="modal-body">
                                                             <h6>Are You Sure To Delete Diamond ?</h6>
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
     </div>
     </div><!-- end app-content-->
     </div>

     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>

     <script>
         $(document).ready(function() {
             WorkingTabel = $('#Working_Diamond').DataTable({
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
