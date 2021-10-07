@section('page-title')
    Supplier Details
@endsection

@section('content')
    <style>
        .table-responsive {
            width: 100%;
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
                        <table id="example" class="table table-bordered text-wrap key-buttons">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Supplier Name</th>
                                    <th class="border-bottom-0" style="width: 20%;">Supplier Address</th>
                                    {{-- <th>Package</th> --}}
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

                                            <form action="{{ route('supplier.destroy', $value->s_id) }}" method="post">
                                                @csrf
                                                <div class="btn-group align-top" style="margin-left: 5px;">
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                    <button class="btn btn-sm btn-danger"><i
                                                            class="fe fe-trash-2"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
    <script>
        // $('#example').DataTable({
        //     "autoWidth": true,
        // });
    </script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> -->


@endsection
@include('app')
