@extends('layouts.master')
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
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/</span>
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

@if(session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
	<!--div-->
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">

                    {{-- <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary rounded-pill" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">إضافة شقه</a>
                    </div> --}}


                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive-lg"  style="overflow-x:auto;">
                    <table class="table text-md-nowrap" id="example2">
                        <thead >
                            <tr>
                                <th class="wd-15p border-bottom-0">رقم المستخدم</th>
                                <th class="wd-15p border-bottom-0"> اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">نوع المستخدم</th>
                                <th class="wd-15p border-bottom-0">وصف المستخدم</th>
                                <th class="wd-15p border-bottom-0">إيمل المستخدم</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr id={{$user->id}}>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->user_description }}</td>
                                <td>{{ $user->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
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
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var address = button.data('address')
        var size = button.data('size')
        var apartment_type = button.data('apartment_type')
        var rooms_number = button.data('rooms_number')
        var bathroms_number = button.data('bathroms_number')
        var apartment_description = button.data('apartment_description')
        var start_at = button.data('start_at')
        var end_at = button.data('end_at')
        var rent_cyclic = button.data('rent_cyclic')
        var price_of_rent = button.data('price_of_rent')
        var number_presenter_payment = button.data('number_presenter_payment')
        var user_id = button.data('user_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #size').val(size);
        modal.find('.modal-body #apartment_type').val(apartment_type);
        modal.find('.modal-body #rooms_number').val(rooms_number);
        modal.find('.modal-body #bathroms_number').val(bathroms_number);
        modal.find('.modal-body #apartment_description').val(apartment_description);
        modal.find('.modal-body #start_at').val(start_at);
        modal.find('.modal-body #end_at').val(end_at);
        modal.find('.modal-body #rent_cyclic').val(rent_cyclic);
        modal.find('.modal-body #price_of_rent').val(price_of_rent);
        modal.find('.modal-body #number_presenter_payment').val(number_presenter_payment);
        modal.find('.modal-body #user_id').val(user_id);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var address = button.data('address')
        var size = button.data('size')
        var apartment_type = button.data('apartment_type')
        var rooms_number = button.data('rooms_number')
        var bathroms_number = button.data('bathroms_number')
        var apartment_description = button.data('apartment_description')
        var start_at = button.data('start_at')
        var end_at = button.data('end_at')
        var rent_cyclic = button.data('rent_cyclic')
        var price_of_rent = button.data('price_of_rent')
        var number_presenter_payment = button.data('number_presenter_payment')
        var user_id = button.data('user_id')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #size').val(size);
        modal.find('.modal-body #apartment_type').val(apartment_type);
        modal.find('.modal-body #rooms_number').val(rooms_number);
        modal.find('.modal-body #bathroms_number').val(bathroms_number);
        modal.find('.modal-body #apartment_description').val(apartment_description);
        modal.find('.modal-body #start_at').val(start_at);
        modal.find('.modal-body #end_at').val(end_at);
        modal.find('.modal-body #rent_cyclic').val(rent_cyclic);
        modal.find('.modal-body #price_of_rent').val(price_of_rent);
        modal.find('.modal-body #number_presenter_payment').val(number_presenter_payment);
        modal.find('.modal-body #user_id').val(user_id);
    })
</script>

@endsection

