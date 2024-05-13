@extends('Layouts.Client')
@section('Title')
{{$Title}}
@endsection
@section('Main')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
    {{-- @livewire('bill-order') --}}
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Cảm ơn. Đơn hàng của bạn đã đặt thành công #{{$data_order[0]->id_order}}.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông tin người nhận</h4>
						<ul class="list">
							<li><a ><span>Tên người nhận</span>{{$data_order[0]->name_order}}</a></li>
							<li><a ><span>Số điện thoại</span>{{$data_order[0]->phone_order}}</a></li>
							<li><a ><span>Email</span>{{$data_order[0]->email_order}}</a></li>
							<li><a ><span>Thanh toán</span>{{$data_order[0]->payment_method}}</a></li>
							<li><a ><span>Ngày đặt</span>{{\Carbon\Carbon::parse($data_order[0]->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')}}</a></li>
							<li><a ><span>Ghi chú</span>{{$data_order[0]->note_order}}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ giao hàng</h4>
						<ul class="list">
							<li><a ><span>Thành phố/tỉnh</span>Hồ Chí Minh</a></li>
							<li><a ><span>Quận/huyện</span>Quận 12</a></li>
							<li><a ><span>Phường/xã</span>Phường Trung Mỹ Tây</a></li>
							<li><a ><span>Số nhà</span>337 Tô Ký</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ nhận hàng</h4>
						<ul class="list">
							<li><a ><span>Thành phố/tỉnh</span>{{$data_order[0]->province_order}}</a></li>
							<li><a ><span>Quận/huyện</span>{{$data_order[0]->district_order}}</a></li>
							<li><a ><span>Phường/xã</span>{{$data_order[0]->ward_order}}</a></li>
							<li><a ><span>Số nhà</span>{{$data_order[0]->specific_address_order}}</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Thông tin đơn hàng</h2>
				<div class="table-responsive">
					<table  class="table ">
						<thead>
							<tr>
								<th scope="col">Số thứ tự</th>
								<th scope="col">Hình sản phẩm</th>
								<th scope="col">Tên sản phẩm</th>
								<th scope="col">Số lượng sản phẩm</th>
								<th scope="col">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
              @php
                  $index=1;
				  $total=0;
              @endphp
              @foreach ($data_order_detail as $cart)
						@foreach ($cart as $show)		
			  <tr>
				<td><p>{{$index++}}</p></td>
				<td><img style="width: 100px;" src="{{asset('assets/Clients/Image/product/'.$show->Image_product)}}" alt=""></td>
								<td ><p>{{$show->Name_product}}</p></td>
								<td>
									<h5>x {{$show->quantity_product_order}}</h5>
								</td>
								<td>
									<p>{{number_format($show->total_price_order)}}<sup class="text-black">đ</sup></p>
								</td>
							</tr>
							@php
								$total+=$show->total_price_order;
							@endphp
							@endforeach
				@endforeach
							<tr>
								<td>
									<h4>Tổng cộng</h4>
								</td>
								<td></td>
								<td></td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p> {{number_format($total)}} <sup class="text-black">đ</sup></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Giảm Giá</h4>
								</td>
								<td></td>
								<td></td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p> {{number_format($data_order[0]->price_vocher)}} <sup class="text-black">đ</sup></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Thành Tiền</h4>
								</td>
								<td></td>
								<td></td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p> {{number_format($data_order[0]->total_price)}} <sup class="text-black">đ</sup></p>
								</td>
							</tr>
							
						</tbody>
					</table>
					<div class="d-flex justify-content-center">
						<a href="/" class="primary-btn"">Trang Chủ</a>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection