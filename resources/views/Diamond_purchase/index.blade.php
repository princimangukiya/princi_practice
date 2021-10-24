 @extends('app')
 @section('page-title')
     Diamond Purchase
 @endsection
 @section('content')
     <link href="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css') }}" />
     <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" />
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Diamond Purchase</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Diamond</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Diamond Purchase List</a></li>
             </ol>
         </div>
         <div class="page-rightheader">
             <div class="btn btn-list">
                 <a href="{{ route('diamond.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add
                     New
                     Diamond </a>

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
                     <div class="card-title">Diamond Purchase Data</div>
                 </div>
                 <div class="card-body">
                     <div class="">
                         <div class=" table-responsive">
                             <table id="Daimond_Tabel" class="table table-bordered text-wrap key-buttons">
                                 <thead>
                                     <tr>
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Party Name</th>
                                         <th class="border-bottom-0">Bar Code</th>
                                         <th class="border-bottom-0">Weight</th>

                                         <th class="border-bottom-0">Shape</th>
                                         <th class="border-bottom-0">Bill_Date</th>
                                         <th class="border-bottom-0">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($diamond as $key => $value)
                                         <tr>
                                             @if ($value->isReturn != null)
                                                 <td style="background-color: #74c69d;">
                                                     {{ $key + 1 }}
                                                 </td>
                                             @elseif($value->isReady != null)
                                                 <td style="background-color: #ADD8E6;">
                                                     {{ $key + 1 }}
                                                 </td>
                                             @elseif( $value->doReady != null)
                                                 <td style="background-color: #eae2b7;">
                                                     {{ $key + 1 }}
                                                 </td>
                                             @else
                                                 <td>
                                                     {{ $key + 1 }}
                                                 </td>
                                             @endif
                                             <td>
                                                 {{ $value->supplier->s_name }}
                                             </td>
                                             @if ($value->isReturn != null)
                                                 <td style="background-color: #74c69d;">
                                                     {{ $value->d_barcode }}
                                                 </td>
                                             @elseif($value->isReady != null)
                                                 <td style="background-color: #ADD8E6;">
                                                     {{ $value->d_barcode }}
                                                 </td>
                                             @elseif($value->doReady != null)
                                                 <td style="background-color: #eae2b7;">
                                                     {{ $value->d_barcode }}
                                                 </td>
                                             @else
                                                 <td>
                                                     {{ $value->d_barcode }}
                                                 </td>
                                             @endif
                                             <td>
                                                 {{ $value->d_wt }}
                                             </td>
                                             <td>
                                                 {{ $value->shapeDate->shape_name }}
                                             </td>
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                             </td>
                                             @if (empty($value->doReady))
                                                 <td class="text-center">
                                                     <a href="{{ route('diamond.edit', ['id' => $value->d_id]) }}"
                                                         style="margin-right: 5px;">
                                                         <div class="btn-group align-top">
                                                             <button class="btn btn-sm btn-success" type="button">Edit <i
                                                                     class="fe fe-edit-2"></i></button>
                                                         </div>
                                                     </a>
                                                     <div class="btn-group align-top" style="margin-left: 5px;">
                                                         <button class="btn btn-sm btn-danger diaDeleteBtn"
                                                             data-toggle="modal" data-target="#smallModal"
                                                             data-href="{{ route('diamond.destroy', $value->d_id) }}">Delete
                                                             <i class="fe fe-trash-2"></i></button>
                                                     </div>
                                                 </td>
                                             @else
                                                 @if ($value->isReturn != null)
                                                     <td class="text-center">
                                                         <a href="/sell-stock">
                                                             <button class="btn btn-sm btn-info" type="button">View <i
                                                                     class="zmdi zmdi-eye"></i></button></a>
                                                     </td>
                                                 @elseif($value->isReady != null)
                                                     <td class="text-center">
                                                         <a href="/ready-stock">
                                                             <button class="btn btn-sm btn-info" type="button">View <i
                                                                     class="zmdi zmdi-eye"></i></button></a>
                                                     </td>
                                                 @elseif( $value->doReady != null)
                                                     <td class="text-center">
                                                         <a href="/working-stock">
                                                             <button class="btn btn-sm btn-info" type="button">View <i
                                                                     class="zmdi zmdi-eye"></i></button></a>
                                                     </td>
                                                 @endif
                                             @endif

                                         </tr>
                                     @endforeach
                                     @if (!$diamond->isEmpty())
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
                                                             <h6>Are You Sure To permanent Delete Diamond ?</h6>
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
     <script>
         $(document).ready(function() {
             DaimondTabel = $('#Daimond_Tabel').DataTable({
                 "autoWidth": false,
                 "info": true,
                 "paging": true,
                 "lengthChange": false,
                 "sDom": 'lfrtip',
                 "ordering": true,
                 "searching": true,
                 "pageLength": 50,
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
     {{-- <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
     <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script> --}}
     {{-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --}}

 @endsection
