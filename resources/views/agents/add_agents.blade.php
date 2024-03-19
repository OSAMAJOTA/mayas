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
@endsection
@section('title')
    اضافة عميل
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                       العملاء/ اضافة عميل </span>
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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('agents.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        {{-- الصف الاول --}}
                        <div class="row">
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم العميل عربى</label>
                                <input type="text" class="form-control" id="agents_name" name="agents_name"
                                       title="يرجي ادخال  اسم العميل" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم العميل انجليزي</label>
                                <input type="text" class="form-control" id="agents_name_en" name="agents_name_en"
                                       title="يرجي ادخال  اسم العميل" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم تسجيل الدخول</label>
                                <input type="text" class="form-control" id="login_name" name="login_name" required>
                            </div>
                            <div class="col-sm">
                                <label for="inputName" class="control-label">   الجنسية</label>
                                <select name="nash" id="nash" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="السعودية" selected disabled>السعودية</option>

                                    <option value="الامارات">الامارات</option>
                                    <option value="السعودية">السعودية</option>
                                    <option value="الهند">الهند</option>

                                </select>
                            </div>

                        </div>
                        {{-- الصف الاول --}}

                        {{-- الصف الثاني --}}
                        <div class="row">
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> نوع الهوية </label>
                                <select name="id_tybe" id="id_tybe" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد  الهوية</option>
                                    <option value="بطاقة الاحوال">بطافة الاحوال</option>
                                    <option value="اقامه">اقامه</option>
                                    <option value="كرت العائلة">كرت العائلة</option>

                                </select>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  رقم الهوية </label>
                                <input type="text" class="form-control" id="id_num" name="id_num"
                                       title="يرجي ادخال رقم السجل" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>   تاريخ الميلاد </label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                            </div>
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>   الحالة الاجتماعية </label>
                                <select name="marital_status" id="marital_status" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد  الحالة</option>
                                    <option value="متزوج">متزوج</option>
                                    <option value="اعزب">اعزب</option>
                                    <option value="مطلق">مطلق</option>
                                    <option value="ارملة">ارملة</option>
                                    <option value="منفصلة">منفصلة </option>

                                </select>
                            </div>

                        </div>
                        {{-- الصف الثاني --}}
                        {{-- الصف الثالث --}}
                        <div class="row">
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>   نوع السكن  </label>
                                <select name="Accommodation_type" id="Accommodation_type" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد  </option>
                                    <option value="فيلا">فيلا</option>
                                    <option value="شقه">شقة</option>
                                    <option value="قصر">قصر</option>
                                    <option value="مزرعه">مزرعة</option>
                                    <option value="دور كامل">دور كامل </option>

                                </select>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  جوال/هاتف </label>
                                <input type="number" class="form-control" id="agent_phone1" name="agent_phone1"
                                       title="يرجي ادخال رقم السجل" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> جوال 2 </label>
                                <input type="number" class="form-control" id="agent_phone2" name="agent_phone2" required>
                            </div>
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  هاتف المنزل </label>
                                <input type="number" class="form-control" id="home_phone" name="home_phone" required>
                            </div>


                        </div>
                        {{-- الصف الثالث --}}
                        {{-- الصف الرابع --}}
                        <div class="row">
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  الحي عربي</label>
                                <input type="text" class="form-control" id="hood_ar" name="hood_ar"
                                       title="يرجي ادخال  اسم الشركه" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> الحي انجليزي </label>
                                <input type="text" class="form-control" id="hood_en" name="hood_en"
                                       title="يرجي ادخال رقم السجل" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان عربي </label>
                                <input type="text" class="form-control" id="add_ar" name="add_ar" required>
                            </div>
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان انجليزي</label>
                                <input type="text" class="form-control" id="add_en" name="add_en" required>
                            </div>

                        </div>
                        {{-- الصف الرابع --}}
                        {{-- الصف الخامس --}}
                        <div class="row">
                            <div class="col-sm-3">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  اسم المدينة عربي</label>
                                <input type="text" class="form-control" id="city_ar" name="city_ar"
                                       title="يرجي ادخال  اسم الشركه" required>
                            </div>

                            <div class="col-sm-3">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم المدينة انجليزي </label>
                                <input type="text" class="form-control" id="city_en" name="city_en"
                                       title="يرجي ادخال رقم السجل" required>
                            </div>




                        </div>
                        {{-- الصف الخامس --}}


            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card overflow-hidden">

                                <div class="card-body">
                                    <div class="panel-group1" id="accordion11">
                                        <div class="panel panel-default  mb-4">
                                            <div class="panel-heading1 bg-primary ">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">معلومات اضافية<i class="fe fe-arrow-left ml-2"></i></a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">
                                                    {{-- الصف الاول 2--}}
                                                    <div class="row">
                                                        <div class="col-sm">

                                                            <label for="inputName" class="control-label"> تاريخ الهوية</label>
                                                            <input type="text" class="form-control" id="companys_name" name="companys_name"
                                                                   title="يرجي ادخال  اسم الشركه" >
                                                        </div>

                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label"> عدد افراد الاسرة  </label>
                                                            <input type="text" class="form-control" id="registration_num" name="registration_num"
                                                                   title="يرجي ادخال رقم السجل" >
                                                        </div>

                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label"> عدد الاطفال </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>
                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label"> عدد العمالة المنزلية </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>


                                                    </div>
                                                    {{-- الصف الاول --}}

                                                    {{-- الصف الثاني 2--}}
                                                    <div class="row">
                                                        <div class="col-sm-3">

                                                            <label for="inputName" class="control-label">عدد الادوار</label>
                                                            <input type="text" class="form-control" id="companys_name" name="companys_name"
                                                                   title="يرجي ادخال  اسم الشركه" >
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label for="inputName" class="control-label"> عدد  الغرف في كل دور  </label>
                                                            <input type="text" class="form-control" id="registration_num" name="registration_num"
                                                                   title="يرجي ادخال رقم السجل" >
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label for="inputName" class="control-label"> عدد دورات المياه </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>



                                                    </div>
                                                    {{-- الصف الثاني --}}
                                                    {{-- الصف الثالث2 --}}
                                                    <div class="row">
                                                        <div class="col-sm">

                                                            <label for="inputName" class="control-label"> هاتف العميل</label>
                                                            <input type="number" class="form-control" id="companys_name" name="companys_name"
                                                                   title="يرجي ادخال  اسم الشركه" >
                                                        </div>

                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label">  البريد الالكتروني  </label>
                                                            <input type="text" class="form-control" id="registration_num" name="registration_num"
                                                                   title="يرجي ادخال رقم السجل" >
                                                        </div>

                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label"> صندوق بريد </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>
                                                        <div class="col-sm">
                                                            <label for="inputName" class="control-label"> فاكس </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>


                                                    </div>
                                                    {{-- الصف الثالث --}}
                                                    {{-- الصف الرابع2 --}}
                                                    <div class="row">
                                                        <div class="col-sm-3">

                                                            <label for="inputName" class="control-label">اسم الشارع عربي</label>
                                                            <input type="text" class="form-control" id="companys_name" name="companys_name"
                                                                   title="يرجي ادخال  اسم الشركه" >
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label for="inputName" class="control-label">   اسم الشارع انجليزي  </label>
                                                            <input type="text" class="form-control" id="registration_num" name="registration_num"
                                                                   title="يرجي ادخال رقم السجل" >
                                                        </div>





                                                    </div>
                                                    {{-- الصف الرابع --}}
                                                    {{-- الصف الخامس 2--}}
                                                    <div class="row">
                                                        <div class="col-sm-3">

                                                            <label for="inputName" class="control-label"> رقم المبني</label>
                                                            <input type="text" class="form-control" id="companys_name" name="companys_name"
                                                                   title="يرجي ادخال  اسم الشركه" >
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label for="inputName" class="control-label">  الرقم الاضافي  </label>
                                                            <input type="text" class="form-control" id="registration_num" name="registration_num"
                                                                   title="يرجي ادخال رقم السجل" >
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label for="inputName" class="control-label"> الرمز البريدي  </label>
                                                            <input type="text" class="form-control" id="vat_num" name="vat_num" >
                                                        </div>



                                                    </div>
                                                    {{-- الصف الخامس --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default mb-0">
                                            <div class="panel-heading1  bg-primary">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false"> معلومات النشاة <i class="fe fe-arrow-left ml-2"></i></a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">
                                                    {{-- الصف الاول 3--}}
                                                    <div class="row">
                                                        <div class="col-sm">

                                                            <label for="inputName" class="control-label">  عميل مهم</label>
                                                            <div class="main-toggle main-toggle-success">
                                                                <span></span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    {{-- الصف الاول --}}

                                                    {{-- الصف الثاني 3--}}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="inputName" class="control-label">     مستوى التقيم  </label>
                                                            <select name="city" id="Rate_VAT" class="form-control"  >
                                                                <!--placeholder-->
                                                                <option value="" selected disabled>حدد  </option>
                                                                <option value="الرياض">الرياض</option>
                                                                <option value="العلا">العلا</option>
                                                                <option value="رفحاء">رفحاء</option>
                                                                <option value="نجران">نجران</option>
                                                                <option value="مكه">مكه </option>
                                                                <option value="حفرالباطن">حفر الباطن</option>
                                                                <option value="وادي الدواسر">وادى الدواسر</option>
                                                                <option value="ينبع">ينبع</option>
                                                                <option value="الطائف">الطائف</option>
                                                                <option value="الوجه">الوجه</option>
                                                                <option value="عفيف">عفيف</option>
                                                                <option value="جازان">جازان</option>
                                                                <option value="الدمام">الدمام</option>
                                                                <option value="الخرج">الخرج</option>
                                                                <option value="الاحساء">الاحساء</option>
                                                                <option value="الخبر">الخبر</option>
                                                                <option value="أبها">أبها</option>
                                                                <option value="جدة">جدة</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="col">
                                                                <label for="exampleTextarea">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                                            </div>

                                                        </div>





                                                    </div>
                                                    {{-- الصف الثاني --}}
                                                    {{-- الصف الثالث3 --}}
                                                    <div class="row">


                                                        <div class="col-md-6">


                                                                <label for="exampleTextarea">ملاحظات التقيم</label>
                                                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>


                                                        </div>


                                                    </div>
                                                    {{-- الصف الثالث --}}


                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger"> رجوع</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- row closed -->

                        {{-- 3 --}}



        </div>
    </div>
    </div>
    </div>

    </div>
    </form>
    </div>
    <!-- row -->


    </div>

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
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/accordion.js')}}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>







@endsection
