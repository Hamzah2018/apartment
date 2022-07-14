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
                    {{-- {{route('apartment.edit')}} --}}
                    <form action="{{route('apartment.update',$apartments->id)}}" method="post" class="form-horizontal" >
                        {{-- {{ csrf_feild()}} --}}
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                        {{-- <p class="mg-b-10">نوع الشقه</p> --}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" name="address" value="{{ $apartments->address }}">
                        </div>
                        {{-- <div class="form-group">
                            <input type="text" class="form-control" id="inputName" name="" placeholder="Name">
                        </div> --}}
                        <div class="form-group">
                        <select class="form-control select2-no-search" name="user_id">
                            <option label="{{$apartments->user->name}}" selected disabled></option>
                                @foreach($user as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-gro onfocus="(this.type='date')">
                        <select name="apartment_type" class="form-control select2-no-search my-3"  value="{{ $apartments->address }}">
                            <option label="{{$apartments->apartment_type}}">
                            </option>
                            <option value=" {{ $apartments->apartment_type = 'normal'}} ">
                                عادي
                            </option>
                            <option value= "{{$apartments->apartment_type = 'furnished' }}">
                                مفروشه
                            </option>
                            <option value="{{$apartments->apartment_type = 'ownership' }}">
                                تمليك
                            </option>
                        </select>
                    </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="size" id="inputName"    value="{{ $apartments->size }}">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="rooms_number" id="inputEmail3" value="{{ $apartments->rooms_number}}">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="bathroms_number" id="inputPassword3"  value="{{ $apartments->bathroms_number}}">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="start_at" id="inputPassword3" value="{{ $apartments->start_at}}">
                        </div>
                        <div class="form-group">
                            <input type="date"  class="form-control" name="end_at" id="inputPassword3" value="{{ $apartments->end_at}}">

                            </div>
                        <div class="form-group">
                            <select name="rent_cyclic" class="form-control select2-no-search">
                                    <option label="{{$apartments->rent_cyclic}}">
                                </option>
                                <option value=" {{ $apartments->rent_cyclic = 'daily'}} ">
                                    اليوم
                                </option>
                                <option value=" {{ $apartments->rent_cyclic = 'weekly'}} ">
                                    الاسبوع
                                </option>
                                <option value="{{$apartments->rent_cyclic = 'monthly'}}">
                                    الشهر
                                </option>
                                <option value="{{$apartments->rent_cyclic = 'annual'}}">
                                    السنه
                                </option>
                            </select>
                            </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price_of_rent"  value="{{ $apartments->price_of_rent}}">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="inputPassword3" name="number_presenter_payment" value="{{ $apartments->number_presenter_payment}}">
                        </div>
                        <div class="form-group">
                            <textarea id="w3review" name="apartment_description" value="{{ $apartments->apartment_description}}" rows="4" cols="50">
                                {{ $apartments->apartment_description}}
                            </textarea>
                        </div>
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
        <div class="modal-footer">

                    <button type="submit" class="btn btn-primary rounded">حفظ</button>
                    {{-- <button type="submit" class="btn btn-secondary">إلغاء</button> --}}


</form>



				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection



















