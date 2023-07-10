@extends('layouts.admin')
@section('title','Quản Lý Đơn Đặt Hàng')
@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Quản Lý Đơn Đặt Hàng</h3>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
        
                        <div class="row">
                            <div class="col-md-3">
                                <label >Lọc Theo Ngày</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" id="" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label >Lọc Theo Trạng Thái</label>
                                <select name="status" id="" class="form-select">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected':''}}>Chưa xử lý</option>
                                    <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''}}>Đang xử lý</option>
                                    <option value="pending" {{Request::get('status')  == 'pending' ? 'selected':''}}>Đã xử lý</option>
                                    <option value="cancelled" {{Request::get('status' )== 'cancelled' ? 'selected':''}}>Hủy</option>
                                    <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected':''}}>Đang giao hàng</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button type="submit" class="btn btn-primary text-white">Lọc</button>
                            </div>
                        </div>

                    </form>
                    <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>{{$item->created_at->format('d-m-Y') }}</td>
                                    <td>{{$item->status_message}}</td>
                                    <td><a href="{{ url('admin/orders/'.$item->id)}}" class="btn btn-primary btn-sm text-white">View</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> No Orders available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection