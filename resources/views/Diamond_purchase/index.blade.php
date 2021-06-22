
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
            <a href="{{ route('diamond.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add New User </a>
            
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
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered text-nowrap key-buttons">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Bar Code</th>
                                    <th class="border-bottom-0">Wt</th>
                                    {{-- <th>Package</th>--}}
                                    <th class="border-bottom-0">Col</th>
                                    <th class="border-bottom-0">Pc</th>
                                    <th class="border-bottom-0">Shape</th>
                                    <th class="border-bottom-0">Cla</th>
                                    <th class="border-bottom-0">Exp pr</th>
                                    <th class="border-bottom-0">Exp</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diamond as $key=>$value)
                                            <tr>
                                                
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $value->d_barcode }}
                                                </td>
                                                <td>
                                                    {{ $value->d_wt }}
                                                </td>
                                                <td>
                                                    {{ $value->d_col }}
                                                </td>
                                                <td>
                                                    {{ $value->d_pc }}
                                                </td>
                                                <td>
                                                    {{ $value->d_shape }}
                                                </td>
                                                <td>
                                                   $ {{ $value->d_cla }}
                                                </td>
                                                <td>
                                                    {{ $value->d_exp_pr }}
                                                </td>
                                                <td>
                                                    {{ $value->d_exp }}
                                                </td>
                                                
                                               {{-- <td>
                                                    <a href="{{ route('user.edit',['id'=>$user->id]) }}"><i class="fa fa-pencil">Edit</i></a>
                                                    <a href="{{ route('user.view',['id'=>$user->id]) }}"><i class="zmdi zmdi-eye">View</i></a>
                                                </td>--}}
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
<script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js')}}"></script>


@endsection
@include('app')

