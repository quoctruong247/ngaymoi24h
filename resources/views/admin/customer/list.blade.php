@extends('admin.master')
@section('title','Danh sách Khách hàng')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Điện thoại</th>
                                        <th>Yêu cầu</th>
                                        <th>Ip</th>
                                        <th>Ghi chú</th>
                                        <th>Ai xử lý</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th width="190">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->content }}</td>
                                        <td>{{ $customer->ip }}</td>
                                        <td>{{ $customer->note }}</td>
                                        <td>
                                            @if(isset($customer->users->name))
                                            {{ $customer->users->name }}
                                            @endif
                                        </td>
                                        <td>{{ $customer->created_at}}</td>
                                        <td>{{ $customer->updated_at }}</td>
                                        <td>
                                            @if($customer->on_off==1)
                                             <a href="" class="btn btn-success">&nbsp; Đã Xử lý &nbsp;</a>
                                            @else
                                            <a href="{{ route('admin.customer.show', ['id' => $customer->id]) }}"
                                               class="btn btn-warning">Chưa Xử lý</a>
                                            @endif

                                            @if(Auth::user()->levels_id != 4)
                                            <a href="{{ route('admin.customer.delete', ['id' => $customer->id]) }}"
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                       window.confirm('Bạn đã chắc chắn xóa Id={{ $customer->id }} chưa?') ?
                                                       document.getElementById('customer-delete-{{ $customer->id }}').submit():
                                                       0;">Xóa</a>
                                            @endif
                                            <form action="{{ route('admin.customer.delete', ['id' => $customer->id]) }}"
                                                  method="post" id="customer-delete-{{ $customer->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No data</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
@endsection