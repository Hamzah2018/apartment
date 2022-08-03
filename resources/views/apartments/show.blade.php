@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="tab nav-border">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                                   role="tab" aria-controls="home-02"
                                                   aria-selected="true">تفاصيل</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                                   role="tab" aria-controls="profile-02"
                                                   aria-selected="false"> ملحقات </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                                 aria-labelledby="home-02-tab">
                                                 <div class="table-responsive-lg"  style="overflow-x:auto;">
                                                <table class="table table-striped table-hover" style="text-align:center">
                                                    
                                                        <thead >
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">رقم الشقه</th>
                                                                <th class="wd-15p border-bottom-0">عنوان الشقه </th>
                                                                <th class="wd-20p border-bottom-0">السمسار</th>
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
                                                    <tr>
                                                        <tbody>
                                                        {{-- <th scope="row">رقم الشقه</th> --}}
                                                        <td>{{ $apartment->id }}</td>

                                                        {{-- <th scope="row">عنوان الشقه</th> --}}
                                                        <td>{{ $apartment->address }}</td>
                                                        {{-- <th scope="row">اسم السمسار </th> --}}
                                                        <td>
                                                            {{ $apartment->user->name }}
                                                         {{-- @foreach ($apartment->user as $us )
                                                              {{ $us->id}}
                                                         @endforeach --}}
                                                        </td>
                                                        {{-- <th scope="row"> نوع الشققه</th> --}}
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
                                                            {{-- <th scope="row"> حجم الشقه</th> --}}
                                                            <td class="">{{ $apartment->size }}</td>
                                                            {{-- <th scope="row"> عدد الغرف</th> --}}
                                                            <td>{{ $apartment->rooms_number }}</td>
                                                            {{-- <th scope="row">تاريخ البداء عرض الشقه</th> --}}
                                                            <td>{{ $apartment->start_at }}</td>
                                                            {{-- <th scope="row">تاريخ انهاء عرض الشقه</th> --}}
                                                            <td>{{ $apartment->end_at}}</td>
                                                            {{-- <th scope="row"> دفع الايجار بنسبه لل</th> --}}
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
                                                                </div>
                                                                @default
                                                                <option value="monthly" label="شهري"  class="mx-5 w-100  d-block">
                                                                    شهري
                                                                </option>
                                                            @endswitch
                                                                </select>
                                                                 </td>
                                                            {{-- <th scope="row">سعر الشقه</th> --}}
                                                            <td>{{ $apartment->price_of_rent }} <small>&#65020;</small></td>
                                                            {{-- <th scope="row">عدد الدفع المقدمه</th> --}}
                                                            <td>{{ $apartment->number_presenter_payment}}</td>
                                                            {{-- <th scope="row">ملاحظات تخص الشقق</th> --}}
                                                            <td>{{ $apartment->apartment_description}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                 </div>
                                            </div>
            
                                            <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                                 aria-labelledby="profile-02-tab">
                                                <div class="card card-statistics">
                                                    <div class="card-body">
                                                        <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                                            {{--  --}}
                                                            {{ csrf_field() }}
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="academic_year">مرفقات
                                                                        : <span class="text-danger">*</span></label>
                                                                                                              
                                                                    <input type="file" accept="image/*" name="images[]" multiple required>
                                                                    <input type="hidden" name="address"  value="{{$apartment->address}}">
                                                                    <input type="hidden" name="id" value="{{ $apartment->id }}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <button type="submit" class="button button-border x-small">
                                                                   تاكيد
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="table-secondary">
                                                            <th scope="col">#</th>
                                                            <th scope="col"> اسم الملف</th>
                                                            <th scope="col"> انشات في </th>
                                                            <th scope="col"> العمليات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($apartment->images as $attachment)
                                                            <tr style='text-align:center;vertical-align:middle'>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$attachment->filename}}</td>
                                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                                <td colspan="2">
                                                                    <a class="btn btn-outline-info btn-sm"
                                                                        href="{{url('Download_attachment')}}/{{ $attachment->imageable->address }}/{{$attachment->filename}}"
                                                                        role="button"><i class="fas fa-download"></i>&nbsp; تنزيل</a>
                                                                    
                                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                                            title="حذف">حذف
                                                                    </button>
            
                                                                </td>
                                                            </tr>
                                                            @include('apartments.Delete_img')
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
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection