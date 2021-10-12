@section('content')
    <!--/app header-->
    @php

    $avatar = 'assets/images/users/2.jpg';

    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Edit Manager Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Manager List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Manager</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <form action="{{ route('manager.update', $manager->m_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Manager Details</div>
                    </div>

                    <div class="card-body">

                        <div class="card-title font-weight-bold">Manager info:</div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Manager Name </label>
                                    <input id="m_name" type="text" name="m_name" class="form-control inputField"
                                        value="{{ $manager->m_name }}" placeholder="Enter Manager Name">
                                    @error('m_name')
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
                                    <label class="form-label">Manager Phone No.</label>
                                    <input placeholder="Enter Manager Phone No." class="form-control inputField"
                                        id="m_phone" type="text" name="m_phone" value="{{ $manager->m_phone }}" required>
                                    @error('m_phone')
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
                                    <label class="form-label">Manager Email ID</label>
                                    <input placeholder="Enter Manager Email Id" class="form-control inputField" id="m_email"
                                        type="text" name="m_email" value="{{ $manager->m_email }}" required>
                                    @error('m_email')
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
                                    <label class="form-label">Manager Address</label>
                                    <textarea id="m_address" type="text" name="m_address"
                                        class="form-control mb-4 inputField" rows="3" value="{{ old('m_address') }}"
                                        placeholder="Enter Manager Address" required
                                        style="margin-top: 0px; margin-bottom: 16px; height: 81px;">{{ $manager->m_address }}</textarea>
                                    {{-- <input id="m_address" type="text" name="m_address" class="form-control inputField"
                                        value="{{ $manager->m_address }}" placeholder="Enter Manager Address" required> --}}
                                    @error('m_address')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                        <a href="/manager" class="btn btn-danger">Cancle</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>
    <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script>
        var currentBoxNumber = 0;
        $(".inputField").keyup(function(event) {
            if (event.keyCode == 13) {
                textboxes = $("input.inputField");
                currentBoxNumber = textboxes.index(this);
                console.log(textboxes.index(this));
                if (textboxes[currentBoxNumber + 0] != null) {
                    nextBox = textboxes[currentBoxNumber + 0];
                    nextBox.focus();
                    nextBox.select();
                    event.preventDefault();
                    return false;
                } else {
                    addData();
                }
            }
        });
        var id;
        var mytable
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera') // Or '#yourElement' (optional)
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            console.log(data.codeResult.code);
            id = data.codeResult.code;
            $('#bar_code').val(id);
            document.querySelector('#result').innerText = data.codeResult.code;

            mytable.row.add([id, 'pkt1', '10.5']);
            mytable.draw();
        });

        $(document).ready(function() {
            mytable = $('#tblItems').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip'
            });
            // mytable.row.add([id, 'pkt1', '10.5']);
            // mytable.draw();
        });
    </script>
@endsection
@include('app')
