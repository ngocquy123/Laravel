@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Sửa Danh Mục
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary text-white float-end">Trở Lại</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$category->name}}" id="" class="form-control">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Slug</label>
                                <input type="text" name="slug" id="" value="{{$category->slug}}" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" rows="3">{{$category->description}}</textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" name="image" id="" value="{{$category->image}}" class="form-control">
                                <img src="{{ asset('uploads/category/'.$category->image)}}" width="40px" alt="">
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{($category->status === '1') ? 'checked' : ''}}>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h3>Seo Tag</h3>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" value="{{$category->meta_title}}" name="meta_title" id="" class="form-control">
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" id=""   class="form-control" rows="3">{{$category->meta_keyword}}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id=""  class="form-control" rows="3">{{$category->meta_description}} </textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                               <button type="submit" class="btn btn-primary float-end">Đăng</button>
                            </div>
                          
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection