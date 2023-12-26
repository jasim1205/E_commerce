@extends('backend.layouts.app')
@section('title','Category Add')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Forms</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">User Add</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<!--start stepper two--> 
<hr>
<div id="stepper2" class="bs-stepper">
    <div class="card">
        <div class="card-body">
            <div class="bs-stepper-content">
                <form class="form needs-validation" method="post" enctype="multipart/form-data" action="{{route('category.store')}}">
                    @csrf
                    <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                        <div class="row g-3">

                            <div class="col-12 col-lg-6">
                                <label for="brandName"><strong>Brand Name</strong><i class="text-danger">*</i> </label>
                                <select name="brand_id" id="" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brand as $b)
                                        <option value="{{$b->id}}" {{old('brand_id')==$b->id?'selected':''}}>{{$b->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('brandName'))
                                    <span class="text-danger"> {{ $errors->first('brandName') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="categoryName"><strong>Category Name</strong><i class="text-danger">*</i> </label>
                                <input type="text" id="categoryName" class="form-control shadow-lg" value="{{ old('categoryName')}}" name="categoryName">
                                @if($errors->has('brandName'))
                                    <span class="text-danger"> {{ $errors->first('brandName') }}</span>
                                @endif
                            </div>
                            
                            <div class="col-12 col-lg-6">
                                <button class="btn btn-success px-4" type="submit">Submit</button>
                            </div>
                        </div><!---end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end stepper two--> 
@endsection