@section('page-title')
    Diamond Purchase
@endsection
@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Diamond Purchase</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Purchase List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('diamond.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add New
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
                            <table id="example" class="table table-bordered text-wrap key-buttons">
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
                                            @if ($value->doReady != null && $value->isReady != null)
                                                <td style="background-color: #74c69d;">
                                                    {{ $key + 1 }}
                                                </td>
                                            @elseif($value->doReady != null)
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
                                            @if ($value->doReady != null && $value->isReady != null)
                                                <td style="background-color: #74c69d;">
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
                                            <td class="align-middle"
                                                style="display: flex; align-items: center;justify-content: space-evenly;">
                                                <a href="{{ route('diamond.edit', ['id' => $value->d_id]) }}"
                                                    style="margin-right: 5px;">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a>

                                                <form action="{{ route('diamond.destroy', $value->d_id) }}"
                                                    method="post">
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
            </div>
            <!--/div-->


        </div>
    </div>
    <!-- /Row -->


    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --}}

@endsection
@include('app')
