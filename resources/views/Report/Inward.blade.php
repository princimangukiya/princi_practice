@section('page-title')
    Rate Master
@endsection

@section('content')
    <style>
        td.dataTables_empty {
            display: none;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Inward Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Inward List</a></li>
            </ol>
        </div>



        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Inward.genratePDF') }}" class="btn btn-info"><i class="fa fa-download mr-1"></i>
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
                    <div class="card-title">Inward Details</div>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('Inward.search_data') }}" method="post">
                        @csrf --}}
                    <div class="row">
                        <div class="col-md-5" style="padding-right: 50px;">
                            @php
                                $c_id = session()->get('c_id');
                                $rate = App\Models\supplier_details::where('c_id', $c_id)->get();
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
                        <div class="col-md-5" style="display: flex;">
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="Start_date" name="Start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="End_date" name="End_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding: 15px;">
                            <button type="submit" id="addData" name="addData" onClick="addData()"
                                class="btn  btn-primary">Serch</button>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Company Name</th>
                                        <th class="border-bottom-0">Barcode_Id</th>
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Old_Weight</th>
                                        <th class="border-bottom-0">New_Weight</th>
                                        <th class="border-bottom-0">Buy_date</th>
                                        {{-- <th>Package</th> --}}
                                        {{-- <th class="border-bottom-0">0.210-0.409</th>
                                        <th class="border-bottom-0">0.410-5.000</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="showPurchaseTh">
                                    @foreach ($inward as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->s_name }}
                                            </td>
                                            <td>
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td>
                                                {{ $value->shape_name }}
                                            </td>
                                            <td>
                                                {{ $value->d_wt }}
                                            </td>
                                            <td>
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->bill_date)) }}
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

    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>
    <script>
        // var id, mytable;
        $(document).ready(function() {
            mytable = $('#example').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
        });


        function addData() {
            var s_id = $('#s_id').val();
            var Start_date = $('#Start_date').val();
            var End_date = $('#End_date').val();

            var mytable = $('#example').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
            mytable.clear().draw();
            // alert(barcode);
            // alert(m_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{{ route('Inward.search_data') }}',
                data: {
                    's_id': s_id,
                    'Start_date': Start_date,
                    'End_date': End_date,
                },
                dataType: 'json',
                success: function(response_msg) {
                    // alert(response_msg.success);
                    console.log(response_msg);
                    // if (response_msg.data == null) {
                    //     alert('controller Succesfully Called !!!!!');
                    // }
                    if (response_msg.success) {

                        // $("#p_gst_id").val(bill_no);
                        const length = Object.keys(response_msg.success).length;
                        // console.log(response_msg.success.length);
                        // $('#example tbody').empty();

                        response_msg.success.forEach(success => {

                            $("#example").append(
                                '<tr>' +
                                '<td>' + success.d_id + '</td>' +
                                '<td>' + success.s_name + '</td>' +
                                '<td>' + success.d_barcode + '</td>' +
                                '<td>' + success.shape_name + '</td>' +
                                '<td>' + success.d_wt + '</td>' +
                                '<td>' + success.d_n_wt + '</td>' +
                                '<td>' + moment(success.bill_date).format('DD-MM-YYYY') + '</td>' +
                                '</tr>'
                            );

                        });
                        console.log(response_msg.success.length);
                    }

                }
            });
            // alert('hii');
        }
    </script>
@endsection
@include('app')
