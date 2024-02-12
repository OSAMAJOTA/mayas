@extends('layouts.master')
@section('title')
    الرئسية
    @stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">لوحة التحكم</h2>
                <p class="mg-b-0">ميـــــــاس للخياطة الرجالية</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">تقيم العملاء </label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">المبيعات الداخلية </label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">المبيعات الخارجية </label>
                <h5>783,675</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12" >
            <a href="{{ url('/' . $page='agents') }}">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عملاء الفروع</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                {{\App\agents::count()}}



                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        </a>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='contact_agent') }}">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عملاء بانتظار التواصل معهم</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">


                                    {{\App\agents::where('Status_id',2)->count()}}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7">
                                                <span style="display: none">{{$x=\App\agents::where('Status_id',2)->count()}}</span>

                                                @if($x >=1)
                                               %  {{round(\App\agents::where('Status_id',2)->count()/\App\agents::count() *100,2)}}
                                                @else
                                                0
                                                @endif

                                            </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='agents') }}">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عملاء تم التواصل معهم </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{\App\agents::where('Status_id',3)->count()}}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7">

 <span style="display: none">
                                                {{$x=\App\agents::where('Status_id',3)->count()}}
 </span>
                                                @if($x>=1)
                                                    %  {{round(\App\agents::where('Status_id',3)->count()/\App\agents::count() *100,2)}}
                                                @else
                                                    0
                                                @endif


                                            </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='agents') }}">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عملاء طلبوا زيارة منزلية</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">     {{\App\agents::where('Status_id',4)->count()}}</h4>
                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7">



 <span style="display: none">
                                                {{$x=\App\agents::where('Status_id',4)->count()}}
 </span>
                                                @if($x >=1)
                                                    %  {{round(\App\agents::where('Status_id',4)->count()/\App\agents::count() *100,2)}}
                                                @else
                                                    0
                                                @endif


                                            </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
            </a>
        </div>


    </div>
    <!-- row closed -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='companys') }}">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفروع والشركات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{\App\companys::count()}}



                                </h4>

                            </div>
                            <span class="float-right my-auto mr-auto">


										</span>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='employees') }}">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الموظفين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">


                                    {{\App\employees::count()}}
                                </h4>

                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7">




                                            </span>
										</span>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='sections') }}">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> الاقسام </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{\App\sections::count()}}
                                </h4>

                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7">

                                            </span>
										</span>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='items') }}">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الاصناف</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">     {{\App\items::count()}}</h4>

                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7">        </span>
										</span>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>


    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">احصائيات العملاء</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0"></p>
                </div>
                <div class="card-body">
                    <div style="width:75%;">
                        {!! $chartjs->render() !!}
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">

                <div class="">
                    <div style="width:75%;">
                        {!! $chartjs1->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->

    <!-- row close -->

    <!-- row opened -->

    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('assets/js/index.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
