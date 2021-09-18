@section('page-title')
    Ready Stock
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Ready Stock</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Ready Stock List</a></li>
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
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Manager Name</th>
                                        <th class="border-bottom-0">Party Supplier</th>
                                        <th class="border-bottom-0">Bar Code</th>
                                        <th class="border-bottom-0">Old Weight</th>
                                        <th class="border-bottom-0">New Weight</th>
                                        {{-- <th>Package</th> --}}
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
    echo count($ready_stock1);
@endphp --}}
                                    @foreach ($ready_stock as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->Manager->m_name }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->s_id }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->d_barcode }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->d_wt }}
                                            </td>
                                            <td>
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->shape_id }}
                                            </td>
                                            <td>
                                                {{ $value->Diamond->price }}
                                            </td>
                                            <td>
                                                <form action="{{ route('ready_stock.destroy', $value->r_id) }}"
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

    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>


@endsection
@include('app')
