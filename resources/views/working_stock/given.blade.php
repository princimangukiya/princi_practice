@section('page-title')
    Diamond Give
@endsection

@section('content')
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <link rel="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css" />
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Diamond Give To Manager</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Give To Manager List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">Give To Manager</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="padding: 20px;">
                    <h4><label class="form-label">Select Manager :-</label></h4>
                    <select id="m_id" name="m_id" required class="form-control select2 inputField" required autofocus>
                        <optgroup label="Managers">
                            <option value="" disabled selected>Choose Manager</option>
                            @if (count($manager) > 0)
                                @foreach ($manager as $value)
                                    <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
                                @endforeach
                            @endif
                        </optgroup>
                    </select>
                    @error('m_id')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group" style="padding: 20px">
                    <label class="form-label"> &nbsp &nbsp BarCode Value </label>
                    <div style="display: flex;">
                        {{-- <div class="col-8"> --}}
                        <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                            value="{{ old('bar_code') }}" placeholder="Enter Bar Code" autofocus required>
                        @error('bar_code')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                        @enderror
                        {{-- </div> --}}
                        {{-- <div class="col-4">
                            <button id="addTOManager" name="addTOManager" onClick="addTOManager('hello')"
                                class="btn  btn-primary">Submit</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right" style="padding-right: 10% ">
            <button id="addTOManager" name="addTOManager" onClick="addTOManager('hello')"
                class="btn  btn-primary inputField">Submit</button>
            <a href="/working_stock" class="btn btn-danger">Cancle</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Manager Details</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">Manager Name</th>
                            <th class="border-bottom-0">Bar Code</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
    </div>
    <!--/div-->

    <!-- /Row -->

    <script src="{{ asset('T3_Admin_Design/assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('T3_Admin_Design/assets/js/jquery.js') }}"></script>

    <script>
        var currentBoxNumber = 0;
        $(".inputField").keyup(function(event) {
            if (event.keyCode == 13) {
                textboxes = $("input.inputField");
                currentBoxNumber = textboxes.index(this);
                console.log(textboxes.index(this));
                if (textboxes[currentBoxNumber + 1] != null) {
                    nextBox = textboxes[currentBoxNumber + 1];
                    nextBox.focus();
                    nextBox.select();
                    event.preventDefault();
                    return false;
                } else {
                    addTOManager();
                }
            }
        });
        var id, mytable;
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
            // alert(id);
            var barcode = $('#bar_code').val();
            var m_id = $('#m_id').val();
            var manager_name = $('#m_id').find(":selected").text();


            // alert(m_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('working_stock.store') }}',
                data: {
                    'bar_code': barcode,
                    'm_id': m_id
                },
                dataType: 'json',
                success: function(response_msg) {
                    // alert(response_msg);
                    if (response_msg.success == 200) {
                        alert("check your barcode, This barcode Already assign to other manager!");
                        //location.reload();
                    } else if (response_msg.success == true) {
                        mytable.row.add([manager_name, barcode]);
                        mytable.draw();
                        $('#bar_code').val('');
                        $('#bar_code').focus();

                    } else if (response_msg.success == 404) {
                        alert('Your Barcode is not valid!');
                        $('#bar_code').focus();
                    } else {
                        alert('Please, Fill all the fields!');
                    }

                }
            });
        }
    </script>

@endsection
@include('app')
