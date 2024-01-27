@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
     بيانات العميل
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">  خدمة العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     بيانات العميل</span>
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



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">بيانات
                                                    العميل</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">حركات العميل</a></li>

                                            @if ($agents->Status_id == 3)
                                                <li><a href="#tab55" class="nav-link" data-toggle="tab">نتيجة الاتصال</a></li>

                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">رقم العميل</th>
                                                        <td>{{ $agents->id }}</td>
                                                        <th scope="row"> اسم العميل</th>
                                                        <td>{{ $agents->agents_name }}</td>
                                                        <th scope="row"> فرع العميل </th>
                                                        <td>{{ $agents->companys->companys_name }}</td>
                                                        <th scope="row"> جوال العميل</th>
                                                        <td>{{ $agents->agents_phone }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">عدد مرات التفصيل</th>
                                                        <td>{{ $agents->tailor_num }}</td>
                                                        <th scope="row">  تاريخ اول تفصيلة</th>
                                                        <td>{{ $agents->first_tailor }}</td>
                                                        <th scope="row"> تاريخ اخر تفصيلة</th>
                                                        <td>{{ $agents->end_tailor }}</td>
                                                        <th scope="row"> المتبقي للعميل </th>
                                                        <td>{{ $agents->rset }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"> رائ الادارة عن العميل</th>
                                                        <td>{{ $agents->man_note }}</td>
                                                        <th scope="row"> تاريخ اضافة العميل</th>
                                                        <td>{{ $agents->created_at }}</td>
                                                        <th scope="row"> تم اضافة العميل بواسطة</th>
                                                        <td>{{ $agents->Created_by }}</td>
                                                        <th scope="row"> الموظف المسؤول </th>
                                                        <td class="text-success">{{ $agents->employees_name }}</td>


                                                    </tr>

                                                    <tr>
                                                        <th scope="row"> حالة العميل</th>
                                                        <td>

                                                            @if ($agents->Status_id == 1)
                                                                <span class="text-warning">{{ $agents->Status }}</span>
                                                            @elseif($agents->Status_id == 2)
                                                                <span class="text-danger">{{ $agents->Status }}</span>
                                                            @elseif($agents->Status_id == 3)
                                                                <span class="text-success">{{ $agents->Status }}</span>
                                                            @elseif($agents->Status_id == 5)
                                                                <span class="btn-danger-gradient">{{ $agents->Status }}</span>

                                                            @else
                                                                <span class="text-info">{{ $agents->Status }}</span>
                                                            @endif

                                                        </td>

                                                    </tr>





                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>







                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap" id="example1" data-page-length="50">
                                                        <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0"> نوع العملية </th>

                                                            <th class="border-bottom-0">بواسطة</th>

                                                            <th class="border-bottom-0">الموظف المسؤول</th>

                                                            <th class="border-bottom-0"> تاريخ العملية</th>

                                                            <th class="border-bottom-0"> تاريخ إعادة التواصل </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach($agents_details as $x)
                                                            @php
                                                                $i++
                                                            @endphp
                                                            <tr>
                                                                <td> {{$i}}</td>
                                                                <td>
                                                                    {{$x->type}}
                                                                </td>

                                                                <td> {{$x->Created_by}} </td>
                                                                <td class="text-success"> {{$x->emp_name}} </td>
                                                                <td>{{$x->created_at}} </td>
                                                                <td>{{$x->call_later}} </td>






                                                            </tr>
                                                        @endforeach
                                                        </tbody>

                                                    </table>
                                                </div>


                                            </div>

                </div>
                                        @if ($agents->Status_id == 3)

                                        <div class="tab-pane" id="tab55">
                                            <!--المرفقات-->

                                            <div class="card-body">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="main-content-label mg-b-5">

                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    @if($call_center->dont_call_check==1)
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> طلب عدم التواصل مطلقآ</span></label>

                                                                    @else
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> طلب عدم التواصل مطلقآ</span></label>

                                                                    @endif

                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    @if($call_center->emp_check==1)
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> الموظف </span></label>

                                                                    @else
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> الموظف </span></label>

                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    @if($call_center->tailor_check==1)
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span>الخياطه</span></label>

                                                                    @else
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> الخياطه</span></label>

                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                    @if($call_center->time_check==1)
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> المواعيد  </span></label>

                                                                    @else
                                                                        <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> المواعيد</span></label>

                                                                    @endif
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
                                                                        @if($call_center->loc_check==1)
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> الموقع  </span></label>

                                                                        @else
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> الموقع</span></label>

                                                                        @endif

                                                                    </div>
                                                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                        @if($call_center->price_check==1)
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> الاسعار  </span></label>

                                                                        @else
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> الاسعار</span></label>

                                                                        @endif

                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        @if($call_center->other_check==1)
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> اخرى  </span></label>

                                                                        @else
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> اخري </span></label>

                                                                        @endif
                                                                    </div>
                                                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                                        @if($call_center->vist_time==1)
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check" checked id="dont_call_check" value="0" disabled><span> طلب زيارة منزلية   </span></label>

                                                                        @else
                                                                            <label class="ckbox"><input type="checkbox" name="dont_call_check"  id="dont_call_check" value="0" disabled><span> طلب زيارة منزلية  </span></label>

                                                                        @endif
                                                                    </div>



                                                                </div>


                                                            </div>



                                                        </div>

                                                    </div>
                                                </div>

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">هل العميل طلب زيارة منزلية ؟</th>
                                                        @if($call_center->vist_check==1)
                                                            <td class="btn btn-success">نعم</td>
                                                            <th scope="row">تاريخ الزيارة</th>
                                                            <td>{{$call_center->vist_time}}</td>
                                                        @else
                                                            <td class="btn btn-danger">لا</td>
                                                        @endif


                                                    </tr>






                                                    </tbody>
                                                </table>
                                                <div class="row" id="call"  style="display:block">
                                                    <div class="col">
                                                        <label for="exampleTextarea"> ملخص الاتصال</label>
                                                        <textarea class="form-control" id="exampleTextarea" name="call_comment" rows="3" disabled  >{{$call_center->call_comment}}</textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>



                                    </div>
                                    @endif

            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->

    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
