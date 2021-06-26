
@section('page-title')
Supplier Details
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Manager Details</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Manager</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Manager Details List</a></li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="btn btn-list">
            <a href="{{ route('manager.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add Manager </a>
            
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
                <div class="card-title">Manager Details</div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered text-nowrap key-buttons">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Manager Name</th>
                                    <th class="border-bottom-0">Manager Address</th>
                                    {{-- <th>Package</th>--}}
                                    <th class="border-bottom-0">Manager Phone No.</th>                                    
                                    <th class="border-bottom-0">Manager EmailID</th>                                    
                                    <th class="border-bottom-0">Action</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager as $key=>$value)
                                            <tr>
                                                
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $value->m_name }}
                                                </td>
                                                <td>
                                                    {{ $value->m_address }}
                                                </td>
                                                <td>
                                                    {{ $value->m_phone }}
                                                </td>
                                                <td>
                                                    {{ $value->m_email }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('manager.edit',['id'=>$value->m_id]) }}">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i class="fe fe-edit-2"></i></button>
                                                    </div>
                                                    </a>
                                                    
                                                    <form action="{{ route('manager.destroy', $value->m_id)}}" method="post">
                                                        @csrf
                                                        <div class="btn-group align-top">
                                                            <button class="btn btn-sm btn-danger" >Delete</button>
                                                            <button class="btn btn-sm btn-danger"><i class="fe fe-trash-2"></i></button>
                                                        </div>
                                                    </form>
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

