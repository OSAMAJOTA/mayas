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
    تفاصيل الفرع
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفرع</span>
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
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الفرع</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                            <li><a href="#tab7" class="nav-link" data-toggle="tab">عملا الفرع</a></li>
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
                                                        <th scope="row">رقم الفرع</th>
                                                        <td>{{ $companys->id }}</td>
                                                        <th scope="row"> اسم الفرع</th>
                                                        <td>{{ $companys->companys_name }}</td>
                                                        <th scope="row">رقم السجل </th>
                                                        <td>{{ $companys->registration_num }}</td>
                                                        <th scope="row">الرقم الضريبي</th>
                                                        <td>{{ $companys->vat_num }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">المدينة</th>
                                                        <td>{{ $companys->city }}</td>
                                                        <th scope="row"> رقم المبني</th>
                                                        <td>{{ $companys->build_num }}</td>
                                                        <th scope="row"> الرمز البريدي</th>
                                                        <td>{{ $companys->postal_code }}</td>
                                                        <th scope="row">الرقم الاضافي </th>
                                                        <td>{{ $companys->extra_num }}</td>
                                                    </tr>


                                                    <tr>
                                                        <th scope="row"> اسم الشارع</th>
                                                        <td>{{ $companys->road_nam }}</td>
                                                        <th scope="row"> اسم الحي </th>
                                                        <td>{{ $companys->neigh_nam }}</td>
                                                        <th scope="row"> عدد الفروع </th>
                                                        <td>{{ $companys->branch_num }}</td>
                                                        <th scope="row"> الهاتف</th>
                                                        <td>{{ $companys->com_phone }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">  البريد الاكتروني</th>
                                                        <td>{{ $companys->com_email }}</td>
                                                        <th scope="row">  اسم الشخص المفوض </th>
                                                        <td>{{ $companys->authorized_nam }}</td>
                                                        <th scope="row">  جوال المفوض </th>
                                                        <td>{{ $companys->authorized_phone }}</td>
                                                        <th scope="row"> بريد الكتروني للمفوض</th>
                                                        <td>{{ $companys->authorized_email }}</td>

                                                    </tr>
                                                    <tr>

                                                        <th scope="row">   ملاحظات</th>
                                                        <td>{{ $companys->note }}</td>


                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>




                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة مرفقات</h5>
                                                    <form method="post" action="{{ url('/CompanysAttachments') }}"
                                                          enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                   name="file_name" required>
                                                            <input type="hidden" id="customFile" name="company_number"
                                                                   value="{{ $companys-> id}}">
                                                            <input type="hidden" id="invoice_id" name="company_id"
                                                                   value="{{ $companys->id }}">
                                                            <label class="custom-file-label" for="customFile">حدد
                                                                المرفق</label>
                                                        </div><br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد</button>
                                                    </form>
                                                </div>

                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">م</th>
                                                            <th scope="col">اسم الملف</th>
                                                            <th scope="col">قام بالاضافة</th>
                                                            <th scope="col">تاريخ الاضافة</th>
                                                            <th scope="col">العمليات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachment->file_name }}</td>
                                                                <td>{{ $attachment->Created_by }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td colspan="2">

                                                                    <a class="btn btn-outline-success btn-sm"
                                                                       href="{{ url('View_file') }}/{{ $companys->id }}/{{ $attachment->file_name }}"
                                                                       role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                        عرض</a>

                                                                    <a class="btn btn-outline-info btn-sm"
                                                                       href="{{ url('download') }}/{{ $companys->id }}/{{ $attachment->file_name }}"
                                                                       role="button"><i
                                                                            class="fas fa-download"></i>&nbsp;
                                                                        تحميل</a>


                                                                    <button class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-file_name="{{ $attachment->file_name }}"
                                                                            data-invoice_number="{{ $attachment->companys_number }}"
                                                                            data-id_file="{{ $attachment->id }}"
                                                                            data-target="#delete_file">حذف</button>


                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>

                                                    </table>

                                                </div>
                                            </div>









                                            </div>





                                        <div class="tab-pane" id="tab7">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">


                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
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

                                                                <th class="border-bottom-0"> رأي الادارة</th>
                                                                <th class="border-bottom-0">العمليات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $i = 0;
                                                            @endphp
                                                            @foreach($agents as $x)
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
                                                                            <span class="text-warning">{{ $x->Status }}</span>
                                                                        @elseif($x->Status_id == 2)
                                                                            <span class="text-danger">{{ $x->Status }}</span>
                                                                        @elseif($x->Status_id == 3)
                                                                            <span class="text-success">{{ $x->Status }}</span>
                                                                        @else
                                                                            <span class="text-info">{{ $x->Status }}</span>
                                                                        @endif


                                                                    </td>


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








                                                                    </td>


                                                                </tr>
                                                            @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>

                                                </div>
                                            </div>









                                        </div>


















                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
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
