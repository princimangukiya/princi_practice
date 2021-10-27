@extends('app')
@section('page-title')
    Defective Diamond
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Add Defective Pcs </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/defective-pcs"><i class="fe fe-layout mr-2 fs-14"></i>Defective Pcs
                        List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Defective Pcs Add</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">Add Defective Diamond</div>
        </div>
        <div class="row" style="padding: 20px;">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Enter Date :-</label>
                    <input placeholder="Enter Date:-" class="form-control" id="Date" type="date" name="date" value=""
                        required>
                    @error('date')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>


            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Enter Resone:-</label>
                    <textarea id="resone" type="text" name="resone" class="form-control mb-4" rows="3"
                        value="{{ old('resone') }}" placeholder="Enter Resone" required
                        style="margin-top: 0px; margin-bottom: 16px; height: 81px;"></textarea>
                    {{-- <input id="m_address" type="text" name="m_address" class="form-control"
                   value="{{ old('m_address') }}" placeholder="Enter Manager Address" required> --}}
                    @error('resone')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group col-md-12 col-sm-12">
                    <label class="form-label">BarCode Value </label>
                    <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                        value="{{ old('bar_code') }}" placeholder="Enter Bar Code" autofocus>
                    @error('bar_code')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer text-right" style="padding-right: 10% ">
            <button id="addTODefectivePcs" name="addTODefectivePcs" onClick="addTODefectivePcs()"
                class="btn  btn-primary">Submit</button>
            <a href="/defective-pcs" class="btn btn-danger">Cancle</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Defective Diamond Details</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">Barcode</th>
                            <th class="border-bottom-0">Resone</th>
                            <th class="border-bottom-0">Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--/div-->
    <!-- /Row -->

    <script>
        $(document).ready(function() {
            mytable = $('#tblItemShow').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
                "order": [
                    [5, "desc"]
                ]
            });
            mytable.columns(5).visible(false);

        });
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
                    addTODefectivePcs();
                }
            }
        });
    </script>
    <script>
        function addTODefectivePcs() {
            //  alert(id);
            var barcode = $('#bar_code').val();
            var resone = $('#resone').val();
            var date = $('#Date').val();
            var c_id = '{{ Session::get('c_id') }}';
            var today = new Date();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('Defective_Pcs.store') }}',
                data: {
                    'bar_code': barcode,
                    'resone': resone,
                    'date': date
                },
                dataType: 'json',
                success: function(response_msg) {
                    if (response_msg.success == 312) {
                        var msg = "Barcode already exist!";
                        var type = "error";
                        alertShow(msg, type);
                    } else if (response_msg.success == 318) {
                        if (c_id == 1) {
                            $('#bar_code').focus();
                            var msg = "You can not add EKLINGJI GEMS Barcode to VmJewles!";
                            var type = "error";
                            alertShow(msg, type);
                        } else {
                            $('#bar_code').focus();
                            var msg = "You can not add VmJewles Barcode to EKLINGJI GEMS!";
                            var type = "error";
                            alertShow(msg, type);
                        }
                    } else if (response_msg.success == 200) {
                        mytable.row.add([barcode, resone, date, today]);
                        mytable.draw();
                        $('#bar_code').val('');
                        $('#bar_code').focus();
                        var msg = "<b>Success:</b> Well done Diamond Added Successfully";
                        var type = "success";
                        alertShow(msg, type);
                    } else if (response_msg.success == 408) {
                        var msg = "Something Went Wrong !!";
                        var type = "error";
                        alertShow(msg, type);
                    } else if (response_msg.success == 314) {
                        var msg = "<b>Please:</b> Enter Valid Barcode !!";
                        var type = "error";
                        alertShow(msg, type);
                    } else {
                        var msg = "<b>Please:</b>Feel All Field !!";
                        var type = "error";
                        alertShow(msg, type);
                    }

                }
            });
        }
    </script>

@endsection
