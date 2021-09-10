@section('page-title')
    Rate Master
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Party_Labour Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Party_Labour List</a></li>
            </ol>
        </div>



        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Party_Labour.genratePDF') }}" class="btn btn-info"><i class="fa fa-download mr-1"></i>
                    Downloade PDF </a>

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
                    <div class="card-title">Party_Labour Details</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5" style="padding-right: 50px;">
                            @php
                                $rate = App\Models\supplier_details::get();
                            @endphp
                            <div class="form-group">
                                <h4><label class="form-label">Select Company :-</label></h4>
                                <select id="s_id" name="s_id" required class="form-control select2">
                                    <optgroup label="Company">
                                        <option value="" disabled selected>Choose Company</option>
                                        @if (count($rate) > 0)
                                            @foreach ($rate as $value)
                                                <option value="{{ $value->s_id }}">{{ $value->s_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('s_id')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" style="display: flex;">
                            <div class="col-md-6">
                                <form class="form-inline" style="padding-right: 50px;">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content: end;">Select Start
                                                Date:- </label></h4>
                                        <input type="date" id="Start_date" name="Start_date">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" style="padding-left: 50px;">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content: end;">Select End
                                                Date:- </label></h4>
                                        <input type="date" id="End_date" name="End_date">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @php
                    echo $Pay_Labour;
                @endphp --}}
                <div class="card-body">
                    <div>

                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">Sizedesc</th>
                                        <th class="border-bottom-0">Pcs</th>
                                        <th class="border-bottom-0">Issue Cts.</th>
                                        <th class="border-bottom-0">Out Cts.</th>
                                        <th class="border-bottom-0">Type</th>
                                        <th class="border-bottom-0">Rate</th>
                                        <th class="border-bottom-0">Labour</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($Pay_Labour as $d)
                                        <td>
                                            <b>{{$d->s_name}}</b> 
                                            @foreach ($Pay_labour as $r)
                                                <tr>
                                                    <td>
                                                        {{$r->Rates}}
                                                    </td>
                                                </tr>
                                                {{-- <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td>
                                                <td>
                                                    {{$r->pcs}}
                                                </td> --}}
                                            @endforeach
                                        @endforeach
                                        </td>

                                        {{-- <td>
                                            425
                                        </td>
                                        <td>
                                            1008894
                                        </td>
                                        <td>
                                            એમરલ
                                        </td>
                                        <td>
                                            0.194
                                        </td>
                                        <td>
                                            0.180
                                        </td>
                                        <td>
                                            23
                                        </td> --}}

                                    </tr>
                                   
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
