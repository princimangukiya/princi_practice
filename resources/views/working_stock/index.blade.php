@section('page-title')
    Diamond Give
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Working Stock</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Working Stock List</a></li>
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
                            <table id="example" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Manager Name</th>
                                        <th class="border-bottom-0">Bar Code</th>
                                        <th class="border-bottom-0">Weight</th>
                                        {{-- <th>Package</th> --}}
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($working_stock as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->Manager->m_name }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->d_barcode }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->d_wt }}
                                            </td>
                                            @php
                                                $shape = App\Models\Diamond_Shape::where('shape_id', $value->Diamond->shape_id)->first();
                                            @endphp
                                            <td>
                                                {{ $shape->shape_name }}
                                            </td>
                                            <td class="align-middle"
                                                style="display: flex; align-items: center;justify-content: space-evenly;">
                                                <a href="{{ route('working_stock.edit', ['id' => $value->w_id]) }}"
                                                    style="margin-right: 5px;">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a>



                                                <form action="{{ route('working_stock.destroy', $value->w_id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="btn-group align-top">
                                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                            data-attr="{{ route('working_stock.destroy', $value->w_id) }}"
                                                            title="Delete Project">
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                            <button class="btn btn-sm btn-danger"><i
                                                                    class="fe fe-trash-2"></i></button></a>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog"
                                            aria-labelledby="smallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="smallBody">
                                                        <form action="{{ route('working_stock.destroy', $value->w_id) }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <h5 class="text-center">Are you sure you want to
                                                                    delete Daimond ?</h5>
                                                                <div class="modal-footer"
                                                                    style="display: flex; flex-direction:no-wrap;">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Yes, Delete
                                                                        Project</button>
                                                                </div>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    </div>
    </div>
    </div><!-- end app-content-->
    </div>

    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> -->


@endsection
@include('app')
