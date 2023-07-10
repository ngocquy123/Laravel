@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Sửa Sản Phẩm
                        <a href="{{url('admin/products')}}" class="float-end btn btn-danger btn-sm text-white">Trở Lại</a>
                    </h3>
                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                Biến Thể
                            </button>
                            </li>
                        </ul>
                    
                        <div class="tab-content m-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Danh Mục</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id === $product->category_id ? 'selected' : '')}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="">Thương Hiệu</label>
                                    <select name="brand" id="" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{($brand->id === $product->brand ? 'selected' : '')}}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                
                                </div>
                                <div class="mb-3">
                                    <label for="">Tên Sản Phẩm</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Mô Tả Ngắn (500 Từ Tối Đa)</label>
                                    <textarea name="small_description" id=""  rows="4" class="form-control">{{$product->small_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Mô Tả Dài</label>
                                    <textarea name="description" id=""  rows="4" class="form-control">
                                        {{$product->description}}
                                    </textarea>
                                </div>
                            
                              
                               
                            
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Đường Dẫn</label>
                                        <input type="text" name="slug" class="form-control" value="{{$product->slug}}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tiêu Đề Đường Dẫn</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Từ Khóa</label>
                                    <textarea name="meta_keyword" id="" rows="4" class="form-control">{{$product->meta_keyword}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Mô Tả Đường Dẫn</label>
                                        <textarea name="meta_description" id=""  rows="4" class="form-control">
                                            {{$product->meta_description}}
                                        </textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    
                                        <div class="mb-3 col-md-4">
                                            <label for="">Giá</label>
                                            <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Giá Giảm</label>
                                            <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Số Lượng</label>
                                            <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Trạng Thái</label>
                                            <input type="checkbox" name="status" {{ ($product->status == '1') ? 'checked' : ''}}/>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Sản Phẩm Nổi Bật</label>
                                            <input type="checkbox" name="trending" {{ ($product->trending == '1') ? 'checked' : ''}} />
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="">Đặc Sắc</label>
                                            <input type="checkbox" name="featured" {{ ($product->featured == '1') ? 'checked' : ''}} />
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
                                        <div>
                                            @if($product->productImages)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    @foreach($product->productImages as $image)
                                                    <img src="{{ asset($image->image) }}" alt="" width="80px">
                                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Xóa </a>
                                                @endforeach
                                                </div> 
                                            </div>
                                            @else
                                            <h5>Chưa Thêm Ảnh</h5>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="row">
                                    <div class="mb-3">
                                        <h4 class="mb-3">Thêm Màu Sản Phẩm</h4>
                                        <label for="">Chọn Màu</label>
                                        <hr>
                                        <div class="row">
                                           @forelse ($colors as $colorItem)
                                           <div class="col-md-3 ">
                                            <div class="p-2 border mb-2">
                                                Màu : <input type="checkbox" name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}" id=""> 
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
                                    <div class="table-responsive mt-3">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tên Màu</th>
                                                    <th>Số Lượng</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product->productColors as $PColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if($PColor->color)
                                                        {{$PColor->color->name}}
                                                        @else
                                                        Chọn màu
                                                        @endif
                                                        
                                                    </td>
                                                    <td>
                                                        <div class="input-group-mb-3" style="width:150px">
                                                            <input type="text" value="{{$PColor->quantity}}" name="" id="" class="ProductColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{$PColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Cập nhập</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{$PColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Xóa</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div >
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary text-white">Cập Nhập</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
       $(document).ready(function(){
            $(document).on('click','.updateProductColorBtn',function(){
                $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                });
                let prod_color_id = $(this).val();
                let product_id = "{{ $product->id}}";
                let qty = $(this).closest('.prod-color-tr').find('.ProductColorQuantity').val();
                
                if(qty <= 0){
                    alert('Vui lòng thêm số lượng')
                    return false;
                }
                let data = {
                    'product_id':product_id,
                    'prod_color_id':prod_color_id,
                    'qty':qty
                };
                $.ajax({
                    type:"POST",
                    url:"/admin/product-color/"+prod_color_id,
                    data:data,
                    success:function(response){
                        alert(response.message);
                    }
                })
            });
            $(document).on('click','.deleteProductColorBtn',function(){
                let prod_color_id = $(this).val();
                let thisClick = $(this);
               
                $.ajax({
                    type:"GET",
                    url:"/admin/product-color/"+prod_color_id+"/delete",
                    success:function(response){
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                })
            })
       });
       
    </script>
@endsection