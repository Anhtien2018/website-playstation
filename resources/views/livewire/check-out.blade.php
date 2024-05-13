<div>
    <section class="checkout_area section_gap">
        <div class="container">
          
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Nhập vocher giảm giá tại đây !</h2>
                </div>
                <form wire:submit="addvocher" >
                <input wire:model.live="vocher" @if(!$checkinput) disabled @endif type="text" placeholder="Vocher Giảm Giá">
                <button type="submit"  class="tp_btn" >Sử Dụng</button>
                @if (session('message'))
                <span class="text-danger" >{{ session('message') }}</span>
                @endif
              </form>
            </div>
            <div class="billing_details " >
                <div class="row" >
                    <div class="col-lg-8">
                        <h3>Thông Tin Chi Tiết</h3>
                        <form class="row " wire:submit="confirm_checkout"  novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <label for="">Họ Và Tên</label>
                                <input wire:model.live="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vui lòng nhập họ tên">
                                @error('name')
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="">Số Điện Thoại</label>
                                <input wire:model.live="phone" type="text" class="form-control" id="last" name="name" placeholder="Vui lòng nhập số điện thoại">
                                @error('phone')
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>  
                            <div class="col-md-12 form-group">
                                <span>Email</span>
                                <input wire:model.live="email" type="text" class="form-control" id="company" name="company" placeholder="Vui lòng nhập email">
                                @error('email')
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="">Thành phố</label>
                                    <select wire:model.live="get_province" wire:change="change_province" class="form-select form-select-sm" aria-label="Small select example">    
                                    <option class="">Chọn Thành Phố</option>
                                        @foreach ($show_province as $province)
                                        <option value="{{$province->matp}}" class=" ">{{$province->name}}</option>
                                        @endforeach
                                        </select>   
                                        @error('get_province')
                                        <span class="text-danger" >{{$message}}</span>
                                        @enderror
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="">Quận huyện</label>
                                <select wire:model.live="get_district" wire:change="change_district" class="form-select form-select-sm" aria-label="Small select example">
                                    <option selected>Chọn Quận Huyện</option>
                                    @foreach ($show_district as $district)
                                    <option value="{{$district->maqh}}">{{$district->name}}</option>
                                    @endforeach
                                  </select>
                                  @error('get_district')
                                  <span class="text-danger" >{{$message}}</span>
                                  @enderror
                            </div>
                            
                            <div class="col-md-6 form-group ">
                                <label for="">Phường xã</label>
                                <select wire:model.live="get_ward" wire:change="change_ward" class="form-select form-select-sm" aria-label="Small select example">
                                    <option class="w-100" value="">Chọn Phường Xã</option>
                                        @foreach ($show_wards as $ward)
                                            <option value="{{$ward->xaid}}">{{$ward->name}}</option>
                                        @endforeach
                                </select>
                                @error('get_ward')
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="">Số nhà</label>
                                <input wire:model.live="specific_address"  type="text" class="form-control" id="last" placeholder="Vui lòng nhập số nhà">
                                @error('specific_address')
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>    
                            <div class="col-md-12 form-group">
                                <label for="">Ghi chú giao hàng</label>
                                <textarea class="form-control" wire:model.live="note_order"  id="message" rows="1" placeholder="Ghi chú"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn Hàng Của Bạn</h2>
                            <ul class="list text-center">
                                <li class="d-flex justify-content-between" ><span>Tên sản phẩm</span><span>Số lượng</span><span>Tổng tiền</span></li>
                                @foreach ($getcart as $showcart)
                                <li class="text-center"><a class="d-flex justify-content-between " href="{{route('view',['id'=>$showcart['id_product'],'slugdetail'=>Str::slug($showcart['Name'])])}}"> <span class="w-25">{{$showcart['Name']}}</span> <span class="middle me-4 ">x {{$showcart['quantity']}}</span> <span class="last">{{number_format($showcart['Reduced'] * $showcart['quantity'])}}<sup class="text-black">đ</sup></span></a></li>
                                <hr>
                                @endforeach 
                            </ul>
                            <ul class="list list_2">
                                <li class="d-flex justify-content-between"><strong>Thành tiền:</strong><span>{{number_format($total)}}<sup class="text-black">đ</sup></span></li>
                                <li class="d-flex justify-content-between"><strong>Giảm giá:</strong><span>{{number_format($discount_vocher)}}<sup class="text-black">đ</sup></span></li>
                                <li class="d-flex justify-content-between"><strong>Thành tiền:</strong><span>{{number_format($end)}}<sup class="text-black">đ</sup></span></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input wire:model.live="payment" type="radio" value="Thanh toán khi nhận hàng" id="f-option5" name="selector">
                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
                                    <div class="check"></div>
                                </div>
                                <p>Thanh toán khi nhận hàng mang lại tính linh hoạt và an toàn cho bạn, giúp bạn kiểm tra sản phẩm trước khi thanh toán..</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input wire:model.live="payment" value="Thanh Toán Online" type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Thanh toán online</label>
                                    <img src="{{asset('assets/Clients/Image/features/card.jpg')}}" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Thanh toán khi nhận hàng trực tuyến giúp người mua cảm thấy an tâm hơn về giao dịch và sản phẩm nhận được..</p>
                            </div>
                            <a type="submit" class="primary-btn"  wire:click="order">Đặt Hàng</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
{{-- modal success --}}
