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
    تعديل بيانات عميل
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     العملاء/  تعديل بيانات عميل</span>
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
            <div class="card">
                <div class="card-body">

                    <form action="{{ url('agents/update') }}" method="post" enctype="multipart/form-data"
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

                                <select name="companys_id" class="form-control SlectBox" onclick="console.log($(this).val())" required
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
                                <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{ $agents->agents_name }}">
                                <input type="hidden" name="agents_id" value="{{ $agents->id }}">
                                       title="يرجي ادخال  اسم العميل" required>
                            </div>

                            <div class="col">
                                <label> رقم الجوال</label>
                                <input type="text" class="form-control" id="agents_phone" name="agents_phone" value="{{ $agents->agents_phone }}"
                                       title="يرجي ادخال رقم الجوال" required>
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
                                <input type="number" class="form-control" id="tailor_num" name="tailor_num" value="{{ $agents->tailor_num }}"
                                       title="يرجي   ادخال عدد مرات التفصيل  " required>
                            </div>

                            <div class="col">
                                <label>  تاريخ اول تفصيل</label>
                                <input type="date" class="form-control" id="first_tailor" name="first_tailor" value="{{$agents->first_tailor }}"
                                       title="يرجي ادخال  تاريخ اول تفصيلة" required>
                            </div>

                            <div class="col">
                                <label>  تاريخ اخر تفصيل</label>
                                <input type="date" class="form-control" id="end_tailor" name="end_tailor" value="{{  $agents->end_tailor }}"
                                >
                            </div>

                        </div>










                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">  المبلغ المتبقي</label>
                                <input type="number" class="form-control" id="rset" name="rset" value="{{ $agents->rset }}"
                                       title=" المبلغ المتبقي " required>
                            </div>


                        </div>
                        {{-- 4 --}}


                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">رأي الادارة</label>
                                <textarea class="form-control" id="exampleTextarea" name="man_note" rows="3" > {{ $agents->man_note}}</textarea>
                            </div>
                        </div>





                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ </button>

                        </div>

                </div>
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
