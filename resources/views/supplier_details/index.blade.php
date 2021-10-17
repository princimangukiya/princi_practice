@include('header_css')
@extends('app')
@section('page-title')
    Supplier Details
@endsection

@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            display: flex;
            height: 17px;
            margin: 0;
            align-items: center;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 17px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Supplier Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Supplier</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Supplier Details List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('supplier.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add
                    Supplier </a>

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
                    <div class="card-title">Supplier Details</div>
                </div>
                <div class="card-body">
                    <div class=" table-responsive">
                        <table id="Supplier" class="table table-bordered text-wrap key-buttons">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Supplier Name</th>
                                    <th class="border-bottom-0" style="width: 20%;">Supplier Address</th>
                                    {{-- <th>Package</th> --}}
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Supplier Gst No.</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier as $key => $value)
                                    <tr>

                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $value->s_name }}
                                        </td>
                                        <td>
                                            {{ $value->s_address }}
                                        </td>
                                        <td>
                                            {{ $value->s_gst }}
                                        </td>
                                        <td>
                                            @if ($value->status == 1)
                                                <p>Active</p>
                                            @else
                                                <p>In-Active</p>
                                            @endif
                                        </td>
                                        <td class="align-middle"
                                            style="display: flex; align-items: center;justify-content: space-evenly;">
                                            <a href="{{ route('supplier.edit', ['id' => $value->s_id]) }}"
                                                style="margin-right: 5px;">
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-success" type="button" data-toggle="modal"
                                                        data-target="#user-form-modal">Edit</button>
                                                    <button class="btn btn-sm btn-success" type="button"><i
                                                            class="fe fe-edit-2"></i></button>
                                                </div>
                                            </a>

                                            {{-- <form action="{{ route('supplier.destroy', $value->s_id) }}" method="post">
                                                @csrf
                                                <div class="btn-group align-top" style="margin-left: 5px;">
                                                    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                        data-attr="{{ route('supplier.destroy', $value->s_id) }}"
                                                        title="Delete Supplier">
                                                        <button class="btn btn-sm btn-danger">Delete <i
                                                                class="fe fe-trash-2"></i></button></a>
                                                </div>
                                            </form> --}}
                                            @php
                                                $url = '/supplier/edit-data/' . $value->s_id;
                                                // echo $value->m_id;
                                            @endphp
                                            @if ($value->status == 0)
                                                <a href="javascript:;" data-toggle="tooltip"
                                                    data-isactive="{{ $value->status }}" data-id="{{ $value->s_id }}"
                                                    data-original-title="edit" data-href="{{ url($url) }}"
                                                    class="btn btn-icon btn-hover-primary btn-sm ml-2 edit"><label
                                                        class="custom-switch"><input type="checkbox"
                                                            name="custom-switch-checkbox" class="custom-switch-input"><span
                                                            class="custom-switch-indicator"></span></label></a>
                                            @else
                                                <a href="javascript:;" data-toggle="tooltip"
                                                    data-isactive="{{ $value->status }}" data-id="{{ $value->s_id }}"
                                                    data-original-title="edit" data-href="{{ url($url) }}"
                                                    class="btn btn-icon btn-hover-primary btn-sm ml-2 edit"><label
                                                        class="custom-switch"><input type="checkbox"
                                                            name="custom-switch-checkbox" class="custom-switch-input"
                                                            checked><span
                                                            class="custom-switch-indicator"></span></label></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- <div class="modal fade" id="smallModal" tabindex="{{ $key + 1 }}" role="dialog"
                            aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal d-block pos-static">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Message Preview</h6><button aria-label="Close"
                                                class="close" data-dismiss="modal" type="button"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">

                                            <h6>Are You Sure To Delete Supplier?</h6>
                                            {{-- <div style="display: flex;">
                                                    <p style="color: red;">Note:- </p>
                                                    <p> This Diamond Show To Diamond Purchase</p>
                                                </div> --}
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('supplier.destroy', $value->s_id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-indigo" type="submit">Delete
                                                    Supplier</button>
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

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
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --> --}}
    <script>
        //  alert(id);
        $('body').on('click', '.edit', function() {
            // if (confirm("Are you sure you want to edit this?")) {
            var user_url = $(this).data('href');
            var isActive = $(this).data('isactive');
            var s_id = $(this).data('id');
            // alert(s_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: user_url,
                type: 'GET',
                dataType: 'json',
                data: {
                    // "_token": "{{ csrf_token() }}",
                    // "_method": "post",
                    'isActive': isActive,
                    's_id': s_id
                },
                success: function(response) {
                    if (response.success) {
                        // alert(response.responseText);
                        location.reload(true);
                    } else {
                        // alert(response.responseText);
                    }
                },
            });
            // }
        });
        $(document).ready(function() {
            SupplierTabel = $('#Supplier').DataTable({
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
    </script>
@endsection
@include('footer_js')
