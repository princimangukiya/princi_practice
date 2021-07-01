
@section('page-title')
Dashboard
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Dashboard</a></li>
        </ol>
    </div>
    
</div>
<!--End Page header-->
                        <!-- Row -->

<script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js')}}"></script>


@endsection
@include('app')

