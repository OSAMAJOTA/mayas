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
    تعديل بيانات موظف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     الموظفين/  تعديل بيانات موظف</span>
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
                    <form action="{{ url('employees/update') }}" method="post"
                          autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> اسم الموظف</label>
                                <input type="hidden" name="employees_id" value="{{ $employees->id }}">
                                <input type="text" class="form-control" id="employees_name" name="employees_name"
                                       title="" value="{{$employees->employees_name}}" required>
                            </div>

                            <div class="col">
                                <label> رقم الهوية</label>
                                <input type="text" class="form-control" id="employees_igama" name="employees_igama"
                                       title="   "  value="{{$employees->employees_igama}}" required>
                            </div>

                            <div class="col">
                                <label> البريد الالكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$employees->email}}"
                                >
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">القسم</label>
                                <select name="section_id" class="form-control SlectBox"   onclick="console.log($(this).val())"  required
                                        onchange="console.log('change is firing')"   >
                                    <!--placeholder-->
                                    <option value="{{$employees->section_id}}" >
                                        {{$employees->section->sections_name}}
                                    </option>
                                    @foreach ($sections as $x)
                                        <option value="{{ $x->id }}"> {{ $x->sections_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الوظيفة</label>
                                <select name="careers_id" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                        onchange="console.log('change is firing')" >
                                    <!--placeholder-->
                                    <option value=" {{$employees->careers_id}}" selected >
                                        {{$employees->careers->careers_name}}
                                    </option>
                                    @foreach ($career as $x)
                                        <option value="{{ $x->id }}"> {{ $x->careers_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> رقم الجوال</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$employees->phone}}">
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="exampleTextarea">المهام</label>
                                <textarea class="form-control" id="exampleTextarea" name="tasks" rows="3" value="{{$employees->tasks}}"  ></textarea>
                            </div>



                            <div class="col">
                                <label for="inputName" class="control-label">الجنسية</label>
                                <select name="nationalities_name" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                        onchange="console.log('change is firing')"   >
                                    <!--placeholder-->
                                    <option value="{{$employees->nationality}}" > {{$employees->nationality}}</option>
                                    @foreach ($nationalities as $x)
                                        <option value="{{ $x->nationalities_name }}"> {{ $x->nationalities_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}


                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3" value="{{$employees->comment}}"  ></textarea>
                            </div>

                        </div><br>



                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"> تعديل البيانات</button>
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
