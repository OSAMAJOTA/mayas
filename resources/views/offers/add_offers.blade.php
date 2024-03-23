@extends('layouts.master')
@section('title')
    عروض واسعار التشغيل
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> عقود التشغيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/    عروض واسعار التشغيل</span>
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
    <!-- row -->
    <div class="row">

        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('delete') }}</strong>
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



        <br>   <br>   <br>

        <div class="col-xl-12">
            <div class="card-body">

                    <div class="card card-success">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0 pb-0">إضــافة عروض و اسعار التشغيل </h5>
                        </div>
                        <div class="card-body text-success">

                            <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data"
                                  autocomplete="off">
                                {{ csrf_field() }}
                                {{-- 1 --}}

                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الجنسية</label>
                                        <select name="section_id" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد الجنسية</option>

                                            @foreach ($nationalities as $x)
                                                <option value="{{ $x->id }}"> {{ $x->nationalities_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col">
                                        <label> التأمين</label>
                                        <input type="text" class="form-control" id="tamin" name="employees_igama"
                                               title="  " value="0" onchange="myFunction()"  required>
                                    </div>


                                </div>

                                {{-- 2 --}}
                                <div class="row">


                                    <div class="col">
                                        <label for="inputName" class="control-label">الوظيفة</label>
                                        <select name="careers_id" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد الوظيف</option>

                                            @foreach ($career as $x)
                                                <option value="{{ $x->id }}"> {{ $x->careers_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">التكلفة</label>
                                        <input type="text" class="form-control" id="cost" name="phone" onchange="myFunction()" value="0">
                                        <a class="modal-effect btn-sm btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1"> <i
                                                class="fas fa-plus"></i>&nbsp; حساب التكلفة</a>
                                    </div>
                                </div>


                                {{-- 3 --}}

                                <div class="row">


                                    <div class="col">
                                        <label for="inputName" class="control-label">المدة</label>
                                        <select name="Duration" id="Duration" class="form-control SlectBox" onclick="console.log($(this).val())" onchange="myFunction()" required
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد المدة</option>

                                            @foreach ($Durations as $x)
                                                <option value="{{ $x->id }}"> {{ $x->Duration_name }}</option>
                                            @endforeach


                                        </select>
                                        <select id="countss" name="countss" class="form-control"  >
                                        </select>
                                    </div>


                                    <div class="col">
                                        <label for="inputName" class="control-label">سبق له العمل</label>
                                        <select name="careers_id" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled> الكل</option>

                                            <option value=""> </option>

                                        </select>
                                    </div>


                                </div>

                                {{-- 4 --}}


                                {{-- 5 --}}
                                <div class="row">
                                    <div class="col-sm-6">

                                        <label for="inputName" class="control-label"> اظهار للعملاء الخارجين</label>
                                        <div class="main-toggle main-toggle-success">
                                            <span></span>
                                        </div>
                                        <label for="inputName" class="control-label"> يظهر للاستقبال</label>
                                        <div class="main-toggle main-toggle-success">
                                            <span></span>
                                        </div>
                                        <label for="inputName" class="control-label"> تفعيل</label>
                                        <div class="main-toggle main-toggle-success">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label">رواتب العاملة</label>
                                        <input type="text" class="form-control" id="salary" name="salary" value="0" onchange="myFunction()">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <div class="m-t-0 header-title-small"><b>اجمالي العرض</b></div>
                                        <div class=" text-center ">
                                            <table class="table table-striped m-0 pull-left">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        تكلفة المكتب
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control justify-content-center" id="cost2" name="Total" value="0.00" style="text-align:center;" readonly >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ضريبة التكلفة
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="Value_VAT" name="Value_VAT" style="text-align:center;"  value="0.00" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        مبلغ التأمين
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control justify-content-center" id="tamin2" name="Total" value="0.00" style="text-align:center;" readonly >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        راتب العامل
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control justify-content-center" id="salary_2" name="salary_2" value="0.00" style="text-align:center;" readonly>
                                                    </td>
                                                </tr>






                                                </tbody>
                                            </table>
                                        </div>
                                        <input type="text" class="form-control justify-content-center" id="Total" name="Total" value="0.00" style="text-align:center;color: #2c7ecd; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; "   readonly>


                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                    &nbsp;	&nbsp;	&nbsp;
                                    <button type="submit" class="btn btn-dark">رجوع </button>
                                </div>






                            </form>

                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>


        <!-- row closed -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> حساب تكلفة العرض</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sections.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اجمالي العرض </label>
                            <input type="text" class="form-control" id="cout_total" name="cout_total" >

                            <label for="exampleInputEmail1"> راتب العاملة الشهري</label>
                            <input type="text" class="form-control" id="salary_offer" name="salary_offer" >
                            <label for="exampleInputEmail1"> مدة العرض </label>
                            <select name="Duration2" id="Duration2" class="form-control SlectBox" onclick="console.log($(this).val())"  required
                                    onchange="console.log('change is firing')">
                                <!--placeholder-->
                                <option value="" selected disabled>حدد المدة</option>

                                @foreach ($Durations as $x)
                                    <option value="{{ $x->id }}"> {{ $x->Duration_name }}</option>
                                @endforeach


                            </select>
                            <select id="countss2" name="countss2" class="form-control" hidden  >
                            </select>
                            <button type="button" class="btn btn-success" onclick="count_offer()" >حساب</button>
                            <input type="text" class="form-control justify-content-center" id="final_Total" name="final_Total" value="0.00" style="text-align:center;color: #2c7ecd; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; "   readonly>
                            <input type="text" class="form-control" id="salary_after_dic" name="salary_after_dic" hidden>
                            <input type="text" class="form-control" id="vat_after" name="vat_after" hidden>

                        </div>




                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="sections/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                            <input class="form-control" name="sections_name" id="sections_name" type="text">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>






        </div>
    </div>
    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="sections/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="sections_name" id="sections_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>

    <!--Internal  Datepicker js -->
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
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>





    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sections_name = button.data('sections_name')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sections_name').val(sections_name);

        })
    </script>



    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sections_name = button.data('sections_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sections_name').val(sections_name);
        })

    </script>
    <script>
        function myFunction() {

            var tamin = parseFloat(document.getElementById("tamin").value);
            var salary = parseFloat(document.getElementById("salary").value);
            var Rate_VAT = 15;
            var cost = parseFloat(document.getElementById("cost").value);
            var countss = parseFloat(document.getElementById("countss").value);

            var totall = tamin + salary;


            if (typeof countss === 'undefined' || !countss) {

                alert('يرجي تحديد المدة ');

            }else {
                var rate = cost * Rate_VAT / 100;
                var salary3 = salary/30*countss;
                var intResults2 = parseFloat(rate + cost+tamin+salary3);


                sumq = parseFloat(rate).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;
                document.getElementById("tamin2").value = tamin;
                document.getElementById("cost2").value = cost;
                document.getElementById("salary_2").value = salary3;




            }

        }

    </script>




    <script>
        function count_offer() {

            var cout_total = parseFloat(document.getElementById("cout_total").value);//اجمالي العرض
            var salary_offer = parseFloat(document.getElementById("salary_offer").value);//اجمالي الراتب
            var countss2 = parseFloat(document.getElementById("countss2").value);//مدة العرض بالايام
            var count_salary = salary_offer/30*countss2;


            var offer1 = cout_total - count_salary;

                document.getElementById("salary_after_dic").value = offer1;
            var vat = offer1-offer1/1.15;
            document.getElementById("vat_after").value = vat;
            var clc_vat=offer1-vat;
            sumt = parseFloat(clc_vat).toFixed(2);
            document.getElementById("final_Total").value = sumt;



        }

    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Duration2"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('Duration') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="countss2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="countss2"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>
    <script>
        $(document).ready(function() {
            $('select[name="Duration"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('Duration') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="countss"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="countss"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>

@endsection
