@section('page-title')
Sell Diamond
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Sell Diamond </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Sell Diamond List</a></li>
        </ol>
    </div>
</div>
<!--End Page header-->
<!-- Row -->
<div class="card">
    <div class="card-header">
        <div class="card-title">Sell Diamond</div>
    </div>
    @php
    $supplier = App\Models\supplier_details::get();
@endphp
    <div class="col-md-6">
        <div class="form-group">
            <h4><label class="form-label">Select Company :-</label></h4>
            <select id="s_id" name="s_id" required class="form-control select2">
                <optgroup label="Company">
                    <option value="" disabled selected>Choose Company</option>
                    @if (count($supplier) > 0)
                    @foreach ($supplier as $value)
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

    <div class="card-body">
        <div class="table-responsive">
            <table id="tblItemShow" class="table table-bordered text-nowrap key-buttons">
                <thead>
                    <tr>
                        <th class="border-bottom-0">Company Name</th>
                        <th class="border-bottom-0">Bar Code</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!--/div-->

<!-- /Row -->
<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            <label class="form-label">BarCode Value </label>
            <input id="bar_code" type="text" name="bar_code" class="form-control" value="{{ old('bar_code') }}" placeholder="Enter Bar Code" autofocus>
            @error('bar_code')
            <small class="errorTxt1">
                <div id="title-error" class="error" style="margin-left:3rem">
                    {{ $message }}
                </div>
            </small>
            @enderror
        </div>
    </div>
    <button id="addTOManager" name="addTOManager" onClick="addTOManager('hello')" class="btn  btn-primary">Submit</button>



    <script src="{{asset('T3_Admin_Design/assets/js/quagga.min.js')}}"></script>
    <script src="{{asset('T3_Admin_Design/assets/js/jquery.js')}}"></script>

    <script>
        $(document).ready(function() {
            mytable = $('#tblItemShow').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip'
            });
            // mytable.row.add([id, 'pkt1', '10.5']);
            // mytable.draw();
        });
    </script>
    <script>
        function addTOManager(id) {
            //  alert(id);
            var barcode = $('#bar_code').val();
            var s_id = $('#s_id').val();
            var manager_name = $('#s_id').find(":selected").text();
            // alert(barcode);
            //  alert(s_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('sell_stock.store')}}',
                data: {
                    'bar_code': barcode,
                    's_id': s_id
                },
                dataType: 'json',
                success: function(response_msg) {
                    // alert(response_msg.success);
                    if (response_msg.success == 200) {
                        alert("Please, choose the right company!");
                        //location.reload();
                    } else if (response_msg.success == true) {
                        mytable.row.add([manager_name, barcode]);
                        mytable.draw();
                        $('#bar_code').val('');
                        $('#bar_code').focus();
                    } else if(response_msg.success == 403){
                        alert('Something Went Wrong!');
                    }else if(response_msg.success == 404){
                        alert('Your Barcode is not valid!');
                    }
                     else {
                        alert('Please, Fill all the fields!');
                    }

                }
            });
        }
    </script>

    @endsection
    @include('app')