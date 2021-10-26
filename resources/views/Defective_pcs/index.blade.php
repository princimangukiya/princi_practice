@extends('app')
@section('page-title')
    Defective Pcs
@endsection
@section('content')
    <link href="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css') }}" />
    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" />
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Defective Pcs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Defective Pcs</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Defective Pcs List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Defective_Pcs.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                    Add Defective Diamond
                </a>

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
                    <div class="card-title">Defective_Pcs Diamond Data</div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class=" table-responsive">
                            <table id="Daimond_Tabel" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Bar Code</th>
                                        <th class="border-bottom-0">Resone</th>
                                        <th class="border-bottom-0">Bill_Date</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diamond as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->d_barcode }}
                                                @if ($value->from_where == 4)
                                                    <span class="badge badge-gradient-success">Sell</span>
                                                @elseif($value->from_where == 3)
                                                    <span class="badge badge-gradient-info">Ready</span>
                                                @elseif($value->from_where == 2)
                                                    <span class="badge badge-gradient-warning">Working</span>
                                                @else
                                                    <span class="badge badge-gradient-primary">Purchase</span>
                                                @endif

                                            </td>
                                            <td>{{ $value->resone }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                                            <td class="align-middle"
                                                style="display: flex; align-items: center;justify-content: space-evenly;">
                                                <a href="{{ route('Defective_Pcs.edit', ['id' => $value->df_id]) }}"
                                                    style="margin-right: 5px;">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a>
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-danger diaDeleteBtn" data-toggle="modal"
                                                        id="smallButton" data-target="#smallModal"
                                                        data-href="{{ route('Defective_Pcs.destroy', $value->df_id) }}">Delete
                                                        <i class="fe fe-trash-2"></i></button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($diamond->isEmpty())

                            @else
                                <div class="modal fade" id="smallModal" tabindex="{{ $key + 1 }}" role="dialog"
                                    aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal d-block pos-static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Message Preview</h6><button
                                                        aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Are You Sure To Delete Defective Diamond ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="diaDeleteModalForm" method="post">
                                                        @csrf
                                                        <button class="btn btn-indigo" type="submit" value='success alert'
                                                            id='click'>Delete
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
