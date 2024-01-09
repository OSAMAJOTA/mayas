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
                <h4 class="content-title mb-0 my-auto">مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     اسماء الفروع والشركات/ اضافة عميل </span>
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

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('companys.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> اسم الشركة</label>
                                <input type="text" class="form-control" id="companys_name" name="companys_name"
                                       title="يرجي ادخال  اسم الشركه" required>
                            </div>

                            <div class="col">
                                <label> رقم السجل</label>
                                <input type="text" class="form-control" id="registration_num" name="registration_num"
                                       title="يرجي ادخال رقم السجل" required>
                            </div>

                            <div class="col">
                                <label>  الرقم الضريبي</label>
                                <input type="text" class="form-control" id="vat_num" name="vat_num" required>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <label class="text-success" >   بيانات العنوان</label>
                        </div>
                        <br>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">   المدينه</label>
                                <select name="city" id="Rate_VAT" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد  المدينه</option>
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

                            <div class="col">
                                <label> رقم المبني</label>
                                <input type="text" class="form-control" id="build_num" name="build_num"
                                       title="يرجي ادخال رقم المبني" required>
                            </div>

                            <div class="col">
                                <label>   الرمز البريدي</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                >
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> الرقم الاضافي</label>
                                <input type="text" class="form-control" id="extra_num" name="extra_num"
                                       title="يرجي ادخال  الرقم الاضافي" >
                            </div>

                            <div class="col">
                                <label>  اسم الشارع</label>
                                <input type="text" class="form-control" id="road_nam" name="road_nam"
                                       title="يرجي ادخال اسم الشارع" >
                            </div>

                            <div class="col">
                                <label>    اسم الحي</label>
                                <input type="text" class="form-control" id="neigh_nam" name="neigh_nam"
                                >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> عدد الفروع</label>
                                <input type="number" class="form-control" id="branch_num" name="branch_num"
                                       title="يرجي ادخال عدد الفروع" required>
                            </div>

                            <div class="col">
                                <label>   الهاتف</label>
                                <input type="text" class="form-control" id="com_phone" name="com_phone"
                                       title="يرجي ادخال رقم الهاتف" required>
                            </div>

                            <div class="col">
                                <label>  البريدالاكتروني </label>
                                <input type="email" class="form-control" id="com_email" name="com_email" required>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <label class="text-success"   >   بيانات الشخص المفوض</label>
                        </div>
<br>

                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">  الاسم</label>
                                <input type="text" class="form-control" id="authorized_nam" name="authorized_nam"
                                       title="يرجي اسم الشخص المفوض  " required>
                            </div>

                            <div class="col">
                                <label>   الجوال</label>
                                <input type="text" class="form-control" id="authorized_phone" name="authorized_phone"
                                       title="يرجي ادخال رقم الجوال" required>
                            </div>
                            <div class="col">
                                <label>   البريد الالكتروني</label>
                                <input type="email" class="form-control" id="authorized_email" name="authorized_email"
                                       title="يرجي ادخال  البريد الالكتروني" required>
                            </div>

                        </div>
                            {{-- 4 --}}


                        {{-- 5 --}}
<div class="row">
    <div class="col">
        <label for="exampleTextarea">ملاحظات</label>
        <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
    </div>
</div>
                        <br>

                        <p class="text-danger">* صيغة العقد يجب ان تكون pdf </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                   data-height="70" />
                        </div><br>





                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>







@endsection
