@section('page-title')
    Rate Master
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Rate Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Rate Master List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('rate_master.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add
                    Rate </a>

            </div>
        </div>
    </div>
    <!--End Page header-->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Rates Details</div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        @php
                                            $rate = App\Models\rate::get();
                                            // echo $rate;
                                        @endphp
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Company Name</th>
                                        @foreach ($rate as $value)
                                            <th class="border-bottom-0">{{ $value->wt_category }}</th>
                                        @endforeach
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // echo $rates;
                                    @endphp

                                    @foreach ($rates as $key => $value)
                                        <tr>

                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            @php
                                                // echo $supplier_name[1]['s_name'];
                                            @endphp
                                            @foreach ($supplier_name as $key => $item)
                                                @if ($value->s_id == $item->s_id)
                                                    <td>
                                                        {{ $item->s_name }}
                                                    </td>
                                                @endif

                                            @endforeach
                                            @php
                                                $decoded_data = json_decode($value['json_price'], true);
                                                $decoded_data = $decoded_data[0];
                                                $data = json_decode(showData($decoded_data, $rate));
                                            @endphp
                                            @foreach ($data as $item)
                                                <td>{{ $item }}</td>
                                            @endforeach
                                            <td class="align-middle"
                                                style="display: flex; align-items: center;justify-content: space-evenly;">
                                                <a href="{{ route('rate_master.edit', ['id' => $value->Rate_id]) }}">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a>
                                                {{-- <form action="{{ route('rate_master.destroy', $value->Rate_id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                        <button class="btn btn-sm btn-danger"><i
                                                                class="fe fe-trash-2"></i></button>
                                                    </div>
                                                </form> --}}
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

    </div>
    </div><!-- end app-content-->
    </div>
    @php
    function showData($decoded_data, $p_rate)
    {
        $price = [];
        for ($i = 0; $i < count($p_rate); $i++) {
            $token = 0;
            foreach ($decoded_data as $key => $rate) {
                if ($p_rate[$i]['r_id'] == $key) {
                    array_push($price, $rate);
                    $token = 1;
                }
            }

            if ($token == 0) {
                array_push($price, '-');
            }
        }

        return json_encode($price);
    }
    @endphp
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>



@endsection
@include('app')
