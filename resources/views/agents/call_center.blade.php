@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('title')
      التواصل مع العميل
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> خدمة العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     عملاء الفروع/  التواصل مع العميل  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header pb-0">
                    <h3 class="card-title">  {{ $agents->agents_name }}  </h3>
                    <p class="text-muted card-sub-title mb-0">{{ $agents->agents_phone }}</p>
                </div>
                <div class="card-body">
                    <div class="panel-group1" id="accordion11">
                        <div class="panel panel-default  mb-4">
                            <div class="panel-heading1 bg-primary ">
                                <h4 class="panel-title1">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false"> بيانات العميل<i class="fe fe-arrow-left ml-2"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                <div class="panel-body border">

                                    <div class="row">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-body">

                                                    <form action="" method="post" enctype="multipart/form-data"
                                                          autocomplete="off">
                                                        {{ method_field('patch') }}
                                                        {{ method_field('patch') }}
                                                        {{ csrf_field() }}
                                                        {{-- 1 --}}
                                                        <div class="row">
                                                            <label class="text-success" >   بيانات الفرع</label>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">

                                                                <select name="companys_id" class="form-control SlectBox" onclick="console.log($(this).val())" required disabled
                                                                        onchange="console.log('change is firing')">
                                                                    <!--placeholder-->
                                                                    <option value="{{ $agents->companys_id }}" selected >{{ $agents->companys->companys_name }} </option>
                                                                    @foreach ($companys as $x)
                                                                        <option value="{{ $x->id }}"> {{ $x->companys_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <label class="text-success" >   بيانات العميل</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="inputName" class="control-label"> اسم العميل</label>
                                                                <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{ $agents->agents_name }} " disabled

                                                               title="   اسم العميل" required>
                                                                <input type="hidden" name="agents_id" value="{{ $agents->id }}">
                                                            </div>

                                                            <div class="col">
                                                                <label> رقم الجوال</label>
                                                                <input type="text" class="form-control" id="agents_phone" name="agents_phone" value="{{ $agents->agents_phone }} " disabled
                                                                       title="  رقم الجوال" required>
                                                            </div>

                                                            <div class="col">
                                                                <label>  تاريخ الاضافة</label>
                                                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ date('Y-m-d') }}" disabled required>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <label class="text-success" >   بيانات التفصيل</label>
                                                        </div>


                                                        {{-- 2 --}}
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="inputName" class="control-label">   عدد مرات التفصيل</label>
                                                                <input type="number" class="form-control" id="tailor_num" name="tailor_num" value="{{ $agents->tailor_num }}" disabled
                                                                       title="    عدد مرات التفصيل  " required>
                                                            </div>

                                                            <div class="col">
                                                                <label>  تاريخ اول تفصيل</label>
                                                                <input type="date" class="form-control" id="first_tailor" name="first_tailor" value="{{$agents->first_tailor }}" disabled
                                                                       title="   تاريخ اول تفصيلة" required>
                                                            </div>

                                                            <div class="col">
                                                                <label>  تاريخ اخر تفصيل</label>
                                                                <input type="date" class="form-control" id="end_tailor" name="end_tailor" value="{{  $agents->end_tailor }}" disabled
                                                                >
                                                            </div>

                                                        </div>










                                                        {{-- 3 --}}

                                                        <div class="row">

                                                            <div class="col">
                                                                <label for="inputName" class="control-label">  المبلغ المتبقي</label>
                                                                <input type="number" class="form-control" id="rset" name="rset" value="{{ $agents->rset }}" disabled
                                                                       title=" المبلغ المتبقي " required>
                                                            </div>


                                                        </div>
                                                        {{-- 4 --}}


                                                        {{-- 5 --}}
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="exampleTextarea">رأي الادارة</label>
                                                                <textarea class="form-control" id="exampleTextarea" name="man_note" rows="3" disabled > {{ $agents->man_note}}</textarea>
                                                            </div>
                                                        </div>





                                                        <div class="modal-footer">


                                                        </div>



                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-0">
                            <div class="panel-heading1  bg-primary">
                                <h4 class="panel-title1">
                                    <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false"> التواصل مع العميل <i class="fe fe-arrow-left ml-2"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                <div class="panel-body border">
                                    <form action="" method="post" enctype="multipart/form-data"
                                          autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        {{-- 1 --}}
                                        <div class="row ">

                                        </div>

                                        <div class="row">


                                        </div>

                                        <div class="row ">
                                            <div class="col">
                                                <label for="inputName" class="control-label "> اسم العميل</label>
                                                <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{ $agents->agents_name }} " disabled

                                                       title="   اسم العميل" required>
                                                <input type="hidden" name="agents_id" value="{{ $agents->id }}">
                                            </div>

                                            <div class="col">
                                                <label> رقم الجوال</label>
                                                <input type="text" class="form-control" id="agents_phone" name="agents_phone" value="{{ $agents->agents_phone }} " disabled
                                                       title="  رقم الجوال" required>
                                            </div>

                                            <div class="col">
                                                <label>  تاريخ الاتصال</label>
                                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ date('Y-m-d') }}" disabled required>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="text-success" >   بيانات التواصل</label>
                                        </div>


                                        {{-- 2 --}}
                                        <label> هل الوقت مناسب للاتصال</label>
                                        <div class="row">




                                            <div class="col-lg-3">
                                                <label class="rdiobox"><input name="rdio"   type="radio" onclick="showElement(1)"> <span>نعم </span></label>
                                            </div>
                                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                <label class="rdiobox"><input  name="rdio" type="radio" onclick="showElement(2)"> <span> لا</span></label>
                                            </div>


                                        </div>



                                            <div id="yes" style="display:none">
                                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="main-content-label mg-b-5">
                                                               حدد الوقت والتاريخ
                                                            </div>
                                                            <p class="mg-b-20">الرجاء تحديد الوقت والتريخ المناسب للتواصل</p>
                                                            <div class="row row-sm">
                                                                <div class="input-group col-md-4">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                                        </div>
                                                                    </div><input class="form-control" id="datetimepicker2" type="text" value="{{ date('Y-m-d') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <br>

                                        <div id="no" style="display:none">
                                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                                <div class="row">
                                                    <br><br>
                                                    <div class="main-content-label mg-b-5">
                                                          نتيجة الاتصال
                                                    </div>
                                            </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="main-content-label mg-b-5">

                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="ckbox"><input type="checkbox"><span> طلب عدم التواصل مطلقآ</span></label>
                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    <label class="ckbox"><input  type="checkbox"><span>الموظف </span></label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <label class="ckbox"><input type="checkbox"><span>الخياطه </span></label>
                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    <label class="ckbox"><input  type="checkbox"><span>المواعيد </span></label>
                                                                </div>

                                                            </div>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="main-content-label mg-b-5">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="ckbox"><input type="checkbox"><span>الموقع </span></label>
                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    <label class="ckbox"><input  type="checkbox"><span>الاسعار </span></label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <label class="ckbox"><input type="checkbox"><span>اخرى </span></label>
                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    <label class="ckbox"><input  type="checkBox" id="myCheck" onclick="myFunction()"><span>طلب زيارة منزلية </span></label>
                                                                </div>



                                                            </div>


                                                        </div>



                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="vist" style="display:none">
                                        <div class="col-md-12 col-xl-12 ">
                                            <div class="card">
                                                <div class="card-body">


                                                        <p class="mg-b-20"> الرجاء تحديد تاريخ و وقت الزيارة</p>
                                                        <div class="row row">
                                                            <div class="input-group col-md-4">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                                    </div>
                                                                </div><input class="form-control" id="datetimepicker" type="text" value="2018-12-20 21:05">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                        <div class="row" id="call"  style="display:none">
                                            <div class="col">
                                                <label for="exampleTextarea"> ملخص الاتصال</label>
                                                <textarea class="form-control" id="exampleTextarea" name="man_note" rows="3"  > {{ $agents->man_note}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="submit">حفظ </button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

    <script>
     function showElement(val)
     {
         if(val==1)
         {
            document.getElementById('yes').style.display='none';
             document.getElementById('call').style.display='block';
             document.getElementById('no').style.display='block';
         }
         if(val==2)
         {
             document.getElementById('call').style.display='none';
             document.getElementById('yes').style.display='block';
             document.getElementById('no').style.display='none';
         }
     }
    </script>


    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true)
                {

                    document.getElementById('vist').style.display = 'block';
                }
            else
                {
                    document.getElementById('vist').style.display = 'none';

                }

            }

    </script>






@endsection
