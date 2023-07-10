@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thêm Sản Phẩm
                        <a href="{{url('admin/products')}}" class="float-end btn btn-danger btn-sm text-white">Trở Lại</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tag
                            </button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Hình Sản Phẩm
                            </button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Màu
                            </button>
                            </li>
                        </ul>
                    
                        <div class="tab-content m-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Danh Mục</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="">Thương Hiệu</label>
                                    <select name="brand" id="" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                    </select>
                                
                                </div>
                                <div class="mb-3">
                                    <label for="">Tên Sản Phẩm</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Mô Tả Ngắn (500 Từ Tối Đa)</label>
                                    <textarea name="small_description" id=""  rows="4" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Mô Tả Dài</label>
                                    <textarea name="description" id=""  rows="4" class="form-control">

                                    </textarea>
                                </div>
                            
                              
                               
                            
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Đường Dẫn</label>
                                        <input type="text" name="slug" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tiêu Đề Đường Dẫn</label>
                                        <input type="text" name="meta_title" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Từ Khóa</label>
                                    <textarea name="meta_keyword" id="" rows="4" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Mô Tả Đường Dẫn</label>
                                        <textarea name="meta_description" id=""  rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    
                                        <div class="mb-3 col-md-4">
                                            <label for="">Giá</label>
                                            <input type="number" name="original_price" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Giá Giảm</label>
                                            <input type="number" name="selling_price" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Số Lượng</label>
                                            <input type="number" name="quantity" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Trạng Thái</label>
                                            <input type="checkbox" name="status" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Sản Phẩm Nổi Bật</label>
                                            <input type="checkbox" name="trending" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Đặc Sắc</label>
                                            <input type="checkbox" name="featured" />
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Update Hình Sản Phẩm</label>
                                            <input type="file" multiple name="image[]" class="form-control" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Chọn Màu</label>
                                    <hr>
                                    <div class="row">
                                       @forelse ($colors as $colorItem)
                                       <div class="col-md-3 ">
                                        <div class="p-2 border mb-2">
                                            <input type="checkbox" name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}" id=""> 
                                            {{$colorItem->name}}
                                            <br>
                                            Số Lượng: <input type="number" name="colorquantity[{{$colorItem->id}}]" id="" style="width:40px;border:1px solid grey">
                                        </div>
                                        </div>
                                       @empty
                                           <div class="col-md-12">
                                            <h5>Chưa Thêm Màu</h5>
                                           </div>
                                       @endforelse
                                    </div>
                                    
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary text-white">Đăng</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
@endsection