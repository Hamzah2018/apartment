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
							<h4 class="content-title mb-0 my-auto">الشقق</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المتاحه</span>
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
	<!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">

                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary rounded-pill" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">إضافة شقه</a>
                    </div>


                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive-lg"  style="overflow-x:auto;">
                    <table class="table text-md-nowrap" id="example2">
                        <thead >
                            <tr>
                                <th class="wd-15p border-bottom-0">رقم الشقه</th>
                                <th class="wd-15p border-bottom-0">عنوان الشقه </th>
                                {{-- <th class="wd-20p border-bottom-0">السمسار</th> --}}
                                <th class="wd-15p border-bottom-0">نوع الشقه</th>
                                <th class="wd-10p border-bottom-0">حجم الشقه</th>
                                <th class="wd-25p border-bottom-0">عدد الغرف </th>
                                <th class="wd-25p border-bottom-0">تاريخ البداء </th>
                                <th class="wd-25p border-bottom-0">تاريخ الانتهاء </th>
                                <th class="wd-25p border-bottom-0">يومي اسبوعي شهري</th>
                                <th class="wd-25p border-bottom-0">سعر ايجار الشقه  </th>
                                <th class="wd-25p border-bottom-0">عدد الدفعة المطلوب تقديمها</th>
                                <th class="wd-25p border-bottom-0">ملاحظة اخراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apartments as $apartment)
                            <tr id={{$apartment->id}}>
                                <td>{{ $apartment->id }}</td>
                                <td>{{ $apartment->address }}</td>
                                {{-- <td>{{ $apartment->user_id }}</td> --}}
                                {{-- <td> --}}
                                    {{-- {{ $apartment->user->name }} --}}
                                 {{-- @foreach ($apartment->user as $us )
                                      {{ $us->id}}
                                 @endforeach --}}

                                {{-- </td> --}}
                                {{-- <td>{
                                    { $apartment->apartment_type }}</td> --}}
                             <td  style="min-width: 100px;">
                                <select name="{{$apartment->apartment_type}}" class="form-control select2-no-search w-100 d-flex " >
                                @switch($apartment->apartment_type)
                                @case('furnished')
                                <option value="furnished" label="مفروش" class="mx-5 w-100  d-block">
                                    مفروشه
                                </option>
                                    @break
                                @case('ownership')
                                <option value="ownership" label="تمليك"  class="mx-5 w-100  d-block">
                                    تمليك
                                </option>
                                    @break
                                @default
                                <option value="normal" label="عادي"  class="mx-5 w-100  d-block">
                                    عادي
                                </option>
                            @endswitch
                                </select>
                                 </td>

                                <td class="">{{ $apartment->size }}</td>
                                <td>{{ $apartment->rooms_number }}</td>
                                <td>{{ $apartment->start_at }}</td>
                                <td>{{ $apartment->end_at}}</td>
                                {{-- <td>{{ $apartment->rent_cyclic  }}</td> --}}
                                <td  style="min-width: 100px;">
                                    <select name="{{$apartment->rent_cyclic }}" class="form-control select2-no-search w-100 d-flex " >
                                    @switch($apartment->rent_cyclic )
                                    @case('daily')
                                    <option value="daily" label="يومي" class="mx-5 w-100  d-block">
                                        يومي
                                    </option>
                                        @break
                                    @case('weekly')
                                    <option value="weekly" label="اسبوعي"  class="mx-5 w-100  d-block">
                                        إسبوعي
                                    </option>
                                        @break
                                        @case('annual')
                                    <option value="annual" label="سنوي"  class="mx-5 w-100  d-block">
                                        سنوي
                                    </option>
                                        @break
                                    @default
                                    <option value="monthly" label="شهري"  class="mx-5 w-100  d-block">
                                        شهري
                                    </option>
                                @endswitch
                                    </select>
                                     </td>

                                <td>{{ $apartment->price_of_rent }}</td>
                                <td>{{ $apartment->number_presenter_payment}}</td>
                                <td>{{ $apartment->apartment_description}}</td>
                                <td>
                                    {{-- <a href="{{route('apartment.edit', $apartment->id )}}" class ="modal-effect btn btn-outline-success rounded-pill">Edit</a> --}}
                                    {{-- <a href="" class ="modal-effect btn btn-outline-danger rounded-pill">delete</a> --}}
                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                    data-id="{{$apartment->id}}"
                                    data-address="{{ $apartment->address}}"
                                    data-size="{{ $apartment->size }}"
                                    data-apartment_type="{{$apartment->apartment_type}}"
                                    data-rooms_number="{{ $apartment->rooms_number }}"
                                    data-bathroms_number="{{ $apartment->bathroms_number }}"
                                    data-apartment_description="{{$apartment->apartment_description}}"
                                    data-start_at="{{ $apartment->start_at }}"
                                    data-end_at="{{ $apartment->end_at }}"
                                    data-rent_cyclic="{{$apartment->rent_cyclic}}"
                                    data-price_of_rent="{{ $apartment->price_of_rent }}"
                                    data-number_presenter_payment="{{ $apartment->number_presenter_payment }}"
                                    data-user_id="{{ $apartment->user_id }}"
                                    data-toggle="modal" href="#exampleModal2"
                                    title="تعديل"><i class="las la-pen"></i></a>

                                     <button class="btn btn-outline-danger btn-sm"
                                                 data-id="{{$apartment->id}}"
                                                data-address="{{ $apartment->address }}" data-toggle="modal"
                                                data-size="{{ $apartment->size }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->
		<!-- Basic modal -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                    <div class="card  box-shadow-0">
					<div class="modal-header">
                        {{-- <div class="card-header"> --}}
                            {{-- <h4 class="card-title mb-1">Default Form</h4> --}}
                            {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                        {{-- </div> --}}
						<h6 class="modal-title">إضافة شقه</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
							<div class="card-body pt-0">


                                <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    {{-- {{ csrf_feild()}} --}}
                                    @csrf
                                    <div class="form-group">
                                    {{-- <p class="mg-b-10">نوع الشقه</p> --}}
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName" name="address" placeholder="عنوان الشققه">
									</div>
                                    {{-- <div class="form-group">
										<input type="text" class="form-control" id="inputName" name="" placeholder="Name">
									</div> --}}
                                    <div class="form-group">
                                    <select class="form-control select2-no-search" name="user_id">
                                        {{-- <option label="إسم السمسار" selected disabled></option> --}}
                                            @foreach($user as $u)
                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <select name="apartment_type" class="form-control select2-no-search my-3">
                                        <option label="نوع الشقه">
                                        </option>
                                        <option value="normal">
                                            عادي
                                        </option>
                                        <option value="furnished">
                                            مفروشه
                                        </option>
                                        <option value="ownership">
                                            تمليك
                                        </option>
                                    </select>
                                </div>
									<div class="form-group">
										<input type="text" class="form-control" name="size" id="inputName" placeholder="حجم الشقه">
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="rooms_number" id="inputEmail3" placeholder="عدد الغرف">
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="bathroms_number" id="inputPassword3" placeholder="عدد الحمامة">
									</div>
									<div class="form-group">
										<input type="date" class="form-control" name="start_at" id="inputPassword3" placeholder="تاريخ بد العرض">
									</div>
									<div class="form-group">
										<input type="date" onfocus="(this.type='date')" class="form-control" name="end_at" id="inputPassword3" placeholder="تاريخ انتها العرض">
									</div>
                                    <div class="form-group">
                                        <select name="rent_cyclic" class="form-control select2-no-search">
                                            <option label="تسليم الايجار بنسبه لل">
                                            </option>
                                            <option value="daily">
                                                اليوم
                                            </option>
                                            <option value="weekly">
                                                الاسبوع
                                            </option>
                                            <option value="monthly">
                                                الشهر
                                            </option>
                                            <option value="annual">
                                                السنه
                                            </option>
                                        </select>
                                        </div>
									<div class="form-group">
										<input type="text" class="form-control" name="price_of_rent"  placeholder="سعر أيجار الشقه">
									</div>
                                    <div class="form-group">
										<input type="number" class="form-control" id="inputPassword3" name="number_presenter_payment" placeholder="عدد الدفع المقدم/ ان وجد">
									</div>
                                    <div class="form-group">
                                        <textarea placeholder="ملاحظة اخرى تخصص الشقه" id="w3review" name="apartment_description" rows="4" cols="50"></textarea>
									</div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                      <label for=""> صور لشقه <span class ="text-danger">k</span>
                                         {{-- <input type="file" accept= "image/*" name="photo[]" multiple> --}}
                                        <input type="file" id="img" name="images" accept="image/*" multiple>


									<div class="form-group mb-0 justify-content-end">
										{{-- <div class="checkbox">
											<div class="custom-checkbox custom-control">
												<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
												<label for="checkbox-2" class="custom-control-label mt-1">Check me Out</label>
											</div>
										</div> --}}
                                    </div>
                                </div>
									</div>

							</div>
						</div>
					</div>
					<div class="modal-footer">
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary rounded">حفظ</button>
                                {{-- <button type="submit" class="btn btn-secondary">إلغاء</button> --}}
                            </div>
                        </div>

					</div>
				</div>
			</div>
        </form>
		</div>
		<!-- End Basic modal -->

				</div>
				<!-- row closed -->

			</div>
  <!-- edit -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">

             <form action="apartment/update" method="post" autocomplete="off">
                 {{method_field('patch')}}
                 {{csrf_field()}}
                 <div class="form-group">
                     <input type="hidden" name="id"  id="id">
                     <label for="recipient-name" class="col-form-label">عنوان الشقه:</label>
                       <input type="text" class="form-control" name="address" id="address">
                 </div>
                   <div class="form-group">
                     <select class="form-control select2-no-search" name="user_id" id="user_id">
                        <option value="" selected disabled> --حدد السمسار--</option>
                             @foreach($user as $u)
                                 <option value="{{$u->id}}">{{$u->name}}</option>
                             @endforeach
                     </select>
                 </div>
                   <div class="form-gro onfocus="(this.type='date')">
                     <select name="apartment_type" id="apartment_type" class="form-control select2-no-search my-3"   >
                        <option value="" selected disabled> --حدد نوع الشققه--</option>
                        {{-- <option label="{{$apartment->apartment_type}}"> --}}
                         </option>
                         <option value=" {{ $apartment->apartment_type = 'normal'}} ">
                             عادي
                         </option>
                         <option value= "{{$apartment->apartment_type = 'furnished' }}">
                             مفروشه
                         </option>
                         <option value="{{$apartment->apartment_type = 'ownership' }}">
                             تمليك
                         </option>
                     </select>
                 </div>
                 <div class="form-group">
                 <label for="message-text" class="col-form-label">حجم الشققه:</label>
                         <input type="text" class="form-control" name="size" id="size">
                     </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">عدد الغرف:</label>
                         <input type="number" class="form-control" name="rooms_number" id="rooms_number">
                     </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">عدد الحمامة:</label>
                         <input type="number" class="form-control" name="bathroms_number" id="bathroms_number">
                     </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">تاريخ عرض الشقه:</label>
                         <input type="date" class="form-control" name="start_at" id="start_at">
                     </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">تاريخ انتهاء العرض:</label>
                         <input type="date"  class="form-control" name="end_at" id="end_at">



                     <div class="form-group">
                         <select name="rent_cyclic"  id="rent_cyclic" class="form-control select2-no-search">
                            <option value="" selected disabled> --حدد فترة الدفع--</option>
                            {{-- <option label="{{$apartment->rent_cyclic}}"> --}}
                             </option>
                             <option value=" {{ $apartment->rent_cyclic = 'daily'}} ">
                                 اليوم
                             </option>
                             <option value=" {{ $apartment->rent_cyclic = 'weekly'}} ">
                                 الاسبوع
                             </option>
                             <option value="{{$apartment->rent_cyclic = 'monthly'}}">
                                 الشهر
                             </option>
                             <option value="{{$apartment->rent_cyclic = 'annual'}}">
                                 السنه
                             </option>
                         </select>
                         </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">سعر الايجار</label>
                         <input type="text" class="form-control" name="price_of_rent"  id="price_of_rent">
                     </div>
                     <div class="form-group">
                     <label for="message-text" class="col-form-label">الدفعة المقدمه:</label>
                         <input type="number" class="form-control" id="number_presenter_payment" name="number_presenter_payment">
                     </div>

                  <div class="form-group">
                  <label for="message-text" class="col-form-label">ملاحظات:</label>
                         <textarea name="apartment_description" id="apartment_description" rows="4" cols="50"></textarea>
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
			<!-- Container closed -->

		</div>
          <!-- delete -->
          <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الشقه</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                       type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="apartment/destroy" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="id">

                            <input type="text" class="form-control" name="address" id="address" readonly>
                            <input type="text" class="form-control" name="size" id="size" readonly>
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

