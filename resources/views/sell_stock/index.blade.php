@section('page-title')
    Sell Stock
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Sell Stock</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Sell Stock List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('sell_stock.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                    Sell Diamond </a>

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
                    <div class="card-title">Sell Stock Data</div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class=" table-responsive">
                            <table id="example" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Supplier Name</th>
                                        <th class="border-bottom-0">Bar Code</th>
                                        <th class="border-bottom-0">Weight</th>
                                        {{-- <th>Package</th> --}}
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sell_stock as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->Supplier->s_name }}
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
                                                <a href="{{ route('sell_stock.edit', ['id' => $value->sell_id]) }}"
                                                    style="margin-right: 5px;">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a>
                                                <form action="{{ route('sell_stock.destroy', $value->sell_id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                        <button class="btn btn-sm btn-danger"><i
                                                                class="fe fe-trash-2"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                            {{-- <td>
                                                    <a href="{{ route('user.edit',['id'=>$user->id]) }}"><i class="fa fa-pencil">Edit</i></a>
                                                    <a href="{{ route('user.view',['id'=>$user->id]) }}"><i class="zmdi zmdi-eye">View</i></a>
                                                </td> --}}
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

    </div>
    </div><!-- end app-content-->
    </div>

    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> -->


@endsection
@include('app')
