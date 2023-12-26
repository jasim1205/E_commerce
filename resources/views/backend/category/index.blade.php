@extends('backend.layouts.app')
@section('title','Category list')
@section('content')
<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">"Brand" List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus">ADD NEW</i></a>
        </div>
    </div>
    <!--end breadcrumb-->
    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>{{__('#SL')}}</th>
                            <th>{{__('Brand Name')}}</th>
                            <th>{{__('Category Name')}}</th>
                            <th>{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($category as $value)
                        <tr role="row" class="odd">
                            <td>{{++$loop->index}}</td>
                            <td>{{$value->brand?->name}}</td>
                            <td>{{$value->categoryname}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('category.edit',encryptor('encrypt',$value->id))}}" class=""><i class="fas fa-edit"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('category.destroy', encryptor('encrypt', $value->id)) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="border:none">
                                            <span class=""><i class="fa fa-trash text-danger"></i></span>
                                            
                                        </button>
                                    </form>
                                </div>                                            
                            </td>												
                        </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection