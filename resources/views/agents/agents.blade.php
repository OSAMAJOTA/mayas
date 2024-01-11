@extends('layouts.master')
@section('title')
     العملاء
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ العملاء   </span>
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




        <div class="col-xl-12">
            <div class="card">

                <div class="col-sm-4 col-md-4">

                        <div class="card-body">

                            <a class="btn ripple btn-info" data-target="#modaldemo3" data-toggle="modal" href="">اضافة عميل </a>
                        </div>

                </div>
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
                                             href="{{ url('companysDetails') }}/"> توجيه
                                          </a>
                                          <a class="dropdown-item"
                                             href="{{ url('companysDetails') }}/">عرض التفاصيل
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
                    </div>
                </div>
            </div>
        </div>

            <!-- Large Modal -->
            <div class="modal" id="modaldemo3">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">اضافة عميل </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">



                            <form action="{{ route('agents.store') }}" method="post" enctype="multipart/form-data"
                                  autocomplete="off">
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
                                            <option value="" selected disabled>حدد الفرع</option>
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
                                        <input type="text" class="form-control" id="agents_name" name="agents_name"
                                               title="يرجي ادخال  اسم الشركه" required>
                                    </div>

                                    <div class="col">
                                        <label> رقم الجوال</label>
                                        <input type="text" class="form-control" id="agents_phone" name="agents_phone"
                                               title="يرجي ادخال رقم السجل" required>
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
                                        <input type="number" class="form-control" id="tailor_num" name="tailor_num"
                                               title="يرجي اسم الشخص المفوض  " required>
                                    </div>

                                    <div class="col">
                                        <label>  تاريخ اول تفصيل</label>
                                        <input type="date" class="form-control" id="first_tailor" name="first_tailor"
                                               title="يرجي ادخال رقم المبني" required>
                                    </div>

                                    <div class="col">
                                        <label>  تاريخ اخر تفصيل</label>
                                        <input type="date" class="form-control" id="end_tailor" name="end_tailor"
                                        >
                                    </div>

                                </div>










                                {{-- 3 --}}

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">  المبلغ المتبقي</label>
                                        <input type="number" class="form-control" id="rset" name="rset"
                                               title="يرجي اسم الشخص المفوض  " required>
                                    </div>


                                </div>
                                {{-- 4 --}}


                                {{-- 5 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleTextarea">رأي الادارة</label>
                                        <textarea class="form-control" id="exampleTextarea" name="man_note" rows="3"></textarea>
                                    </div>
                                </div>





                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="submit">حفظ </button>
                                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                </div>

                        </div>
                    </div>
                    </form>
                </div>
                <!--End Large Modal -->
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->
    </div>

    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف العميل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="agents/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="agents_name" id="agents_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

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
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var agents_name = button.data('agents_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #agents_name').val(agents_name);
        })

    </script>

@endsection
