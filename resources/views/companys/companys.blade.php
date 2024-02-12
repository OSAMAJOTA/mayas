@extends('layouts.master')
@section('title')
      الفروع
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
                <h4 class="content-title mb-0 my-auto">مدخلات النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  عملاء الفروع والشركات</span>
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

                <div class="card-header pb-0">
                    <a class=" btn btn-outline-primary "   href="companys/create"> <i
                            class="fas fa-plus"></i>&nbsp; اضافة فرع</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0"> اسم الشركة </th>
                                <th class="border-bottom-0"> رقم السجل</th>
                                <th class="border-bottom-0"> الرقم الضريبي</th>
                                <th class="border-bottom-0"> عنوان الشركة </th>
                                <th class="border-bottom-0">الجوال</th>
                                <th class="border-bottom-0">البريد الالكتروني</th>
                                <th class="border-bottom-0"> الحالة</th>
                                <th class="border-bottom-0"> اسم الشخص المفوض</th>
                                <th class="border-bottom-0">الملاحظات</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                        @foreach($companys as $x)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td>{{$i}} </td>
                                <td><a title="عرض الفاصيل"
                                        href="{{ url('companysDetails') }}/{{ $x->id }}">{{ $x->companys_name }}</a>
                                </td>
                                <td> {{$x->registration_num}}</td>
                                <td>{{$x->vat_num}} </td>
                                <td>{{$x->city}} </td>
                                <td>{{$x->com_phone}} </td>
                                <td> {{$x->com_email}}</td>
                                <td>
                                @if ($x->Status == 'نشط')
                                    <span class="text-success">{{ $x->Status }}</span>
                                @elseif($x->Status == 'غير نشط')
                                    <span class="text-danger">{{ $x->Status }}</span>
                                @else
                                    <span class="text-warning">{{ $x->Status }}</span>
                                @endif
                                </td>
                                <td>{{$x->authorized_nam}} </td>
                                <td>{{$x->note}} </td>
                              <td>
                                  <div class="dropdown">
                                      <button aria-expanded="false" aria-haspopup="true"
                                              class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                              type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                      <div class="dropdown-menu tx-13">
                                          <a class="dropdown-item"
                                             href="{{ url('companysDetails') }}/{{ $x->id }} ">عرض التفاصيل
                                          </a>
                                          <a class="dropdown-item"
                                             href="  {{ url('edit_companys') }}/{{ $x->id }}">تعديل
                                              </a>




                                          <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                             data-id="{{ $x->id }}" data-careers_name="{{ $x->companys_name }}"
                                             data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                  class="las la-trash"></i> حذف</a>

                              </td>


                            </tr>
@endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    </div>
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الوظيفة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="companys/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="careers_name" id="careers_name" type="text" readonly>
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
            var careers_name = button.data('careers_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #careers_name').val(careers_name);
        })

    </script>




@endsection
