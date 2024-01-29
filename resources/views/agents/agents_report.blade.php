@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    @section('title')
        التقارير
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير
                خدمة العملاء</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
				<!-- row -->
				<div class="row">

                    <div class="col-xl-12">
                        <div class="card mg-b-20">


                            <div class="card-header pb-0">

                                <form action="/Search_report" method="POST" role="search" autocomplete="off">
                                    {{ csrf_field() }}


                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input checked name="rdio" type="radio" value="1" id="type_div"> <span>بحث بحالة
                                العميل</span></label>
                                    </div>


                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                        <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>بحث برقم العميل
                            </span></label>
                                    </div><br><br>

                                    <div class="row">

                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                                            <p class="mg-b-10">تحديد الحالة </p><select class="form-control select2" name="status_id"   required>


                                                <option value="{{ $status_id ?? 'حدد حالة العميل' }}" selected>
                                                    {{ $status_id ?? 'حدد حالة العميل' }}
                                                </option>
                                                <option value="1"> الكل </option>
                                                <option value="بانتظارالتوجيه">بانتظار  التوجيه </option>
                                                <option value="بانتظار التواصل معه"> بانتظار التواصل معه</option>
                                                <option value="تم التواصل معه"> تم التواصل معه</option>
                                                <option value="طلب زيارة منزلية">طلب زيارة منزلية</option>
                                                <option value="طلب  معاودة الاتصال في وقت لاحق"> طلب معاودة الاتصال في وقت لاحق</option>
                                                <option value="محظور"> محظور</option>
ةغ
                                            </select>
                                        </div><!-- col-4 -->


                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
                                            <p class="mg-b-10">البحث برقم الفاتورة</p>
                                            <input type="text" class="form-control" id="invoice_number" name="invoice_number">

                                        </div><!-- col-4 -->

                                        <div class="col-lg-3" id="start_at">
                                            <label for="exampleFormControlSelect1">من تاريخ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </div><input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}"
                                                             name="start_at" placeholder="YYYY-MM-DD" type="text">
                                            </div><!-- input-group -->
                                        </div>

                                        <div class="col-lg-3" id="end_at">
                                            <label for="exampleFormControlSelect1">الي تاريخ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </div><input class="form-control fc-datepicker" name="end_at"
                                                             value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
                                            </div><!-- input-group -->
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-sm-1 col-md-1">
                                            <button class="btn btn-primary btn-block">بحث</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if (isset($details))
                                        <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0"> اسم العميل </th>
                                                <th class="border-bottom-0">فرع العميل</th>
                                                <th class="border-bottom-0"> جوال العميل</th>
                                                <th class="border-bottom-0"> عدد مرات التفصيل</th>
                                                <th class="border-bottom-0"> تاريخ اول تفصيل </th>
                                                <th class="border-bottom-0">تاريخ اخر تفصيل</th>
                                                <th class="border-bottom-0"> المبلغ المتبقي</th>
                                                <th class="border-bottom-0">الحالة</th>
                                                <th class="border-bottom-0">الموظف المسؤول</th>
                                                <th class="border-bottom-0"> رأي الادارة</th>
                                                <th class="border-bottom-0">العمليات</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach($details  as $x)
                                                @php
                                                    $i++
                                                @endphp
                                                <tr>
                                                    <td> {{$i}}</td>
                                                    <td>
                                                        {{$x->agents_name}}
                                                    </td>
                                                    <td>    <a title="عرض الفاصيل"
                                                               href="{{ url('companysDetails') }}/{{ $x->companys_id }}">{{ $x->companys->companys_name }}</a>
                                                    </td>
                                                    <td> {{$x->agents_phone}} </td>
                                                    <td>{{$x->tailor_num}} </td>
                                                    <td>{{$x->first_tailor}}</td>
                                                    <td>{{$x->end_tailor}}</td>
                                                    <td>
                                                        {{$x->rset}}
                                                    </td>
                                                    <td>

                                                        @if ($x->Status_id == 1)
                                                            <span class="btn-sm disabled btn-warning">{{ $x->Status }}</span>
                                                        @elseif($x->Status_id == 2)
                                                            <span class="btn-sm disabled btn-danger">{{ $x->Status }}</span>
                                                        @elseif($x->Status_id == 3)
                                                            <span class="btn-sm disabled btn-success">{{ $x->Status }}</span>
                                                        @elseif($x->Status_id == 5)
                                                            <span class="btn-sm disabled btn-danger-gradient">{{ $x->Status }}</span>
                                                        @else
                                                            <span class="btn-sm disabled btn-info">{{ $x->Status }}</span>
                                                        @endif


                                                    </td>

                                                    <td class="text-success">{{$x->employees_name}} </td>
                                                    <td>{{$x->man_note}} </td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <button aria-expanded="false" aria-haspopup="true"
                                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                            <div class="dropdown-menu tx-13">

                                                                <a class="dropdown-item"
                                                                   href="{{ url('AgentsDetails') }}/{{ $x->id }}">عرض التفاصيل
                                                                </a>
                                                                <a class="dropdown-item"
                                                                   href="{{url('agents_edit')}}/{{ $x->id }} ">تعديل
                                                                </a>





                                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                   data-id="{{ $x->id }}" data-agents_name="{{ $x->agents_name }}"
                                                                   data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                                        class="las la-trash"></i> حزف</a>


                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    @endif
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

    <script>
        $(document).ready(function() {

            $('#invoice_number').hide();

            $('input[type="radio"]').click(function() {
                if ($(this).attr('id') == 'type_div') {
                    $('#invoice_number').hide();
                    $('#type').show();
                    $('#start_at').show();
                    $('#end_at').show();
                } else {
                    $('#invoice_number').show();
                    $('#type').hide();
                    $('#start_at').hide();
                    $('#end_at').hide();
                }
            });
        });

    </script>


@endsection
