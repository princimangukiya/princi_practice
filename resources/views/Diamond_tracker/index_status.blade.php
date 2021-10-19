 @extends('app')
 @section('page-title')
     Diamond Tracker
 @endsection
 @section('content')
     <style>
         .timeline {
             list-style-type: none;
             margin: 0;
             padding: 0;
         }

         .timeline-item {
             /*   outline: 1px solid orange; */
             margin: 0;
             padding: 0 30px 20px 30px;
             position: relative;
         }

         .timeline-item p,
         .timeline-item h4 {
             padding: 0;
             margin: 0;
             font-weight: 400;
         }

         .timeline-item__title:before {
             content: '';
             display: block;
             position: absolute;
             width: 1px;
             top: 0;
             left: 10px;
             border-left: 1px solid black;
             height: 100%;
         }

         .timeline-item:last-child .timeline-item__title:before {
             display: none;
         }

         .timeline-item__status {
             width: 12px;
             height: 12px;
             background: white;
             overflow: hidden;
             text-indent: -9000em;
             position: absolute;
             left: 4px;
             top: 0;
             border-radius: 50%;
             border: 1px solid black
         }

         .timeline-item--complete .timeline-item__status {
             background-color: #38cb89;
         }

         .timeline-item--error .timeline-item__status {
             background-color: #dc0441;
         }

         .timeline-item--error .timeline-item__title {
             color: #dc0441;
         }

         .timeline-item--warning .timeline-item__status {
             background-color: orange;
         }

     </style>
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Diamond Tracker</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Tracker</a></li>
             </ol>
         </div>
         {{-- <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('rate_master.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add
                    Rate </a>
            </div>
        </div> --}}
     </div>
     <!--End Page header-->
     <!-- Row -->
     <div class="row">
         <div class="col-12">
             <!--div-->
             <div class="card">
                 <div class="card-header">
                     <div class="card-title">Diamond Tracker Details</div>
                 </div>
                 <div class="card-body" style="dispaly:flex; justify:content:center;">

                     {{-- <div class="___class_+?17___"> --}}
                     <div class="container-fluid" style="padding-bottom: 30px;">
                         <div class="d-flex">
                             <div class="mt-1">
                                 <form class="form-inline" method="post" action="/Diamond_tracker_search">
                                     @csrf
                                     @if (empty($daimond))
                                         <div class="search-element" style="border: 1px solid #CED4DA;border-radius: 5px;">
                                             <input type="search" class="form-control header-search" name="search_value"
                                                 id="search_value" placeholder="Enter Barcode value..." aria-label="Search"
                                                 tabindex="1" style="border: none;">
                                             <button class="btn btn-primary-color" type="submit">
                                                 <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                     height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                     focusable="false">
                                                     <path d="M0 0h24v24H0V0z" fill="none" />
                                                     <path
                                                         d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                 </svg>
                                             </button>
                                         </div>
                                     @else
                                         <div class="search-element" style="border: 1px solid #CED4DA;border-radius: 5px;">
                                             <input type="search" class="form-control header-search" name="search_value"
                                                 id="search_value" placeholder="Enter Barcode value..."
                                                 value="{{ $daimond['d_barcode'] }}" aria-label="Search" tabindex="1"
                                                 style="border: none;">
                                             <button class="btn btn-primary-color" type="submit">
                                                 <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                     height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                     focusable="false">
                                                     <path d="M0 0h24v24H0V0z" fill="none" />
                                                     <path
                                                         d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                 </svg>
                                             </button>
                                         </div>

                                     @endif

                                 </form>
                             </div>
                         </div>
                     </div>
                     <ol class="timeline">
                         @php
                             $c_name = session()->get('c_name');
                         @endphp
                         @if (empty($daimond))
                             <script>
                                 alert("Please ! Enter Right Barcode...")
                             </script>
                         @else
                             <li class="timeline-item timeline-item--complete">
                                 <h4 class="timeline-item__title">Diamond Is Assign To Company</h4>
                                 <div class="timeline-item__status">Status error</div>
                                 <p class="timeline-item__date">Date:-
                                     {{ date('d-m-Y', strtotime($daimond['bill_date'])) }}
                                 </p>
                                 <p class="timeline-item__desc">Company Name:-
                                     {{ $c_name }}
                                 </p>
                             </li>

                             @if (empty($daimond['doReady']))
                                 <li class="timeline-item timeline-item--error">
                                     <h4 class="timeline-item__title">Diamond Is Hold To Company</h4>
                                     <div class="timeline-item__status">Status error</div>
                                     <p class="timeline-item__date">Date:-
                                         {{ date('d-m-Y', strtotime($date)) }}
                                     </p>
                                     <p class="timeline-item__desc">Company Name:-
                                         {{ $c_name }}
                                     </p>
                                 </li>
                             @else
                                 <li class="timeline-item timeline-item--complete">
                                     <h4 class="timeline-item__title">Diamond Are Assign In Manager</h4>
                                     <div class="timeline-item__status">Status completed</div>
                                     <p class="timeline-item__date">Date:-
                                         {{ date('d-m-Y', strtotime($manager_name['bill_date'])) }}
                                     </p>
                                     <p class="timeline-item__desc">Manager Name:- {{ $manager_name['m_name'] }}
                                     </p>
                                 </li>
                             @endif
                             @if (empty($daimond['isReady']))
                                 @if (empty($daimond['doReady']))
                                     <li class="timeline-item timeline-item--pending">
                                         {{-- <h4 class="timeline-item__title">Diamond Not Assign To Manager</h4>
                                    <div class="timeline-item__status">Status error</div>
                                    <p class="timeline-item__date">  <b>{{ date('d-m-Y', strtotime($date)) }}</b></p>
                                    <p class="timeline-item__desc">Whenever</p> --}}
                                     </li>
                                 @else
                                     <li class="timeline-item timeline-item--error">
                                         <h4 class="timeline-item__title">Diamond Is Hold On Manager</h4>
                                         <div class="timeline-item__status">Status error</div>
                                         <p class="timeline-item__date">
                                             {{ date('d-m-Y', strtotime($date)) }}
                                         </p>
                                         <p class="timeline-item__desc">Manager Name:-
                                             {{ $manager_name['m_name'] }}
                                         </p>
                                     </li>
                                 @endif

                             @else
                                 <li class="timeline-item timeline-item--complete">
                                     <h4 class="timeline-item__title">Diamond Are Return To The Company</h4>
                                     <div class="timeline-item__status">Status completed</div>
                                     <p class="timeline-item__date">Date:-
                                         {{ date('d-m-Y', strtotime($ready_stock['return_date'])) }}
                                     </p>
                                     <p class="timeline-item__desc">Company Name:-
                                         {{ $c_name }}
                                     </p>
                                 </li>
                             @endif
                             @if (empty($daimond['isReturn']))
                                 @if (empty($daimond['isReady']))
                                     <li class="timeline-item timeline-item--pending">
                                         {{-- <h4 class="timeline-item__title">Diamond Is Not Return To Company</h4>
                                    <div class="timeline-item__status">Status error</div>
                                    <p class="timeline-item__date">  <b>{{ date('d-m-Y', strtotime($date)) }}</b></p>
                                    <p class="timeline-item__desc">Whenever</p> --}}
                                     </li>
                                 @else
                                     <li class="timeline-item timeline-item--error">
                                         <h4 class="timeline-item__title">Diamond Is Hold On Company</h4>
                                         <div class="timeline-item__status">Status error</div>
                                         <p class="timeline-item__date">Date:-
                                             {{ date('d-m-Y', strtotime($date)) }}
                                         </p>
                                         <p class="timeline-item__desc">Company Name:-
                                             {{ $c_name }}
                                         </p>
                                     </li>
                                 @endif

                             @else
                                 <li class="timeline-item timeline-item--complete">
                                     <h4 class="timeline-item__title">Diamond Are Return To The Supplier</h4>
                                     <div class="timeline-item__status">Status completed</div>
                                     <p class="timeline-item__date">Date:-
                                         {{ date('d-m-Y', strtotime($sell_date['return_date'])) }}
                                     </p>
                                     <p class="timeline-item__desc">Supplier Name:-
                                         {{ $daimond['s_name'] }}
                                     </p>
                                 </li>
                             @endif
                         @endif
                         {{-- <li class="timeline-item timeline-item--warning">
                            <h4 class="timeline-item__title">Order recieved</h4>
                            <div class="timeline-item__status">Status warning</div>
                            <p class="timeline-item__date">  <b>{{ date('d-m-Y', strtotime($date)) }}</b></p>
                            <p class="timeline-item__desc">By the Manager</p>
                        </li> --}}

                     </ol>





                     {{-- </div> --}}
                 </div>
             </div>
             <!--/div-->
         </div>
     </div>
     <!-- /Row -->
     </div>
     </div><!-- end app-content-->
     </div>
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
     {{-- <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --> --}}
 @endsection
