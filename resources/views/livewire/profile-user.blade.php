
    <!-- End Banner Area -->
<section style="background-color: #eee;">
    <div class="container py-5">
     
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{asset('assets/Clients/Image/avatar/'.$getuser[0]->avatar)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$getuser[0]->name}}</h5>
              <div class="d-flex justify-content-center ">
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_edit">Đổi thông tin</button>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal_change_password">Đổi mật khẩu</button>
                <div wire:ignore.self class="modal fade" id="exampleModal_change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi mật khẩu</h1>
                        <button type="button" wire:click="close_modal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form wire:submit="change_password"   class="row login_form"   id="contactForm" novalidate="novalidate" enctype="multipart/form-data" >
                             <div class="col-md-12 form-group">
                              <input wire:model.live="email" type="text" class="form-control" id="name"  placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vui lòng nhập email'" >                                              
                             <span class="text-danger" >@error('email') {{ $message }} @enderror</span>
                            </div>
                          <div class="col-md-12 form-group">
                            <input onclick="check_password();" style="position: absolute; left:450px; width: 15px;" type="checkbox" id="check">
                            <input wire:model.live="password_before" type="password" class="form-control" id="password"  placeholder="Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vui lòng nhập mật khẩu cũ'" >                  
                            <span class="text-danger" >@error('password_before') {{ $message }} @enderror</span>
                          </div>  
                          <div class="col-md-12 form-group">
                              <input onclick="check_password();" style="position: absolute; left:450px; width: 15px;" type="checkbox" id="check">
                              <input wire:model.live="password_after" type="password" class="form-control" id="password"  placeholder="Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vui lòng nhập mật khẩu mới'" >                  
                              <span class="text-danger" >@error('password_after') {{ $message }} @enderror</span>
                            </div>
                          <div class="col-md-12 form-group">
                              <input onclick="check_password_confirm();" style="position: absolute; left:450px; width: 15px;" type="checkbox" id="check_confirm">
                              <input wire:model.live="password_after_confirm" type="password" class="form-control" id="password_confirm"  placeholder=" Xác Nhận Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Xác nhận mật khẩu mới'"  >
                              <span class="text-danger" >@error('password_after_confirm') {{ $message }} @enderror</span>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng </button>
                        <button type="submit"  class="btn btn-primary">Đổi Mật Khẩu</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal_add_address">Thêm địa chỉ</button>
              </div>
            </div>
          </div>
          <p class="d-inline-flex gap-1 w-100">
            <a  class="btn btn-outline-primary w-100" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Sản Phẩm Yêu Thích
            </a>
          </p>
            {{-- collapse --}}
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
               
              </div>
            </div>
        </div>
        
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Họ Tên</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$getuser[0]->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$getuser[0]->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$getuser[0]->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Hạng </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Đồng</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3 ">
                  <p class="mb-0">Địa chỉ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-12 col-md-12">
                <section class="h-100 gradient-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-lg-10 col-xl-12">
                        <div class="card" style="border-radius: 10px;">
                          <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Đơn Hàng <select wire:model.live="get_select" wire:change="select_order" class="form-select form-select-sm" aria-label="Small select example" name="" id="">
                              <option value="">Sắp Xếp</option>
                              <option value="gio-hang">Đang Xử Lý</option>
                              <option value="chuan-bi">Chuẩn Bị</option>  
                              <option value="dang-giao-hang">Đang Giao</option>  
                              <option value="thanh-cong">Thành Công</option>  
                              <option value="huy-don ">Đơn Hàng đã hủy</option>  
                            </select></span></h5>
                          </div>
                          <div class="card-body p-4">
                            <div class="card shadow-0 border mb-4">
                              <div class="card-body">
                                <div class="row">
                                  @foreach ($get_all_order as $show_order)
                               
                                  <div class="row">
                                    <span>Mã Đơn Hàng #{{$show_order->id_order}}</span>
                                     @foreach ($this->checkout->get_order_detail($show_order->id_order) as $item )
                                         @foreach ($item as $show_product)
                                         <a href="{{route('view',['id'=>$show_product->id,'slugdetail'=>Str::slug($show_product->Name_product)])}}">
                                          <div class="row">
                                            <div class="col-md-2">
                                              <img src="{{asset('assets/Clients/Image/product/'.$show_product->Image_product)}}"
                                                class="img-fluid" alt="Phone">
                                            </div>
                                            <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                              <p class="text-muted mb-0">{{$show_product->Name_product}}</p>
                                            </div>
                                            <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                              <p class="text-muted mb-0 small">{{$show_product->quantity_product_order}}</p>
                                            </div>
                                            <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                              <p class="text-muted mb-0 small">{{number_format($show_product->total_price_order)}} <sup class="text-black">đ</sup> </p>
                                            </div>
                                           </div>
                                         </a>
                                         <hr>
                                         @endforeach
                                     @endforeach
                                  </div>
                                  <div class="d-flex justify-content-between pt-4">
                                    <p class="text-muted mb-0">Họ tên : {{$show_order->name_order}}</p>
                                    <p class="text-muted mb-0"><span class="fw-bold me-4">Tổng Cộng</span>{{number_format($show_order->total_price)}}<sup class="text-black">đ</sup></p>
                                  </div>
                      
                                  <div class="d-flex justify-content-between">
                                    <p class="text-muted mb-0">Số điện thoại : {{$show_order->phone_order}} </p>
                                    <p class="text-muted mb-0"><span class="fw-bold me-4">Phí Vận Chuyển</span> Miễn phí</p>
                                  </div>
                      
                                  <div class="d-flex justify-content-between mb-3 ">
                                    <p class="text-muted mb-0">Địa chỉ:{{$show_order->province_order}},{{$show_order->district_order}},{{$show_order->ward_order}},{{$show_order->specific_address_order}}</p>
                                    <p class="text-muted mb-0"><span class="fw-bold me-4">Thành Tiền</span>{{number_format($show_order->total_price)}}<sup class="text-black">đ</sup></p>
                                  </div>
                                  <div class="row d-flex justify-content-center align-items-center mb-3">
                                    <div class="col">
                                      <div class="card card-stepper" style="border-radius: 10px;">
                                        <div class="card-body p-4">
                                          <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                            @if ($show_order->status_order =='gio-hang')
                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white"></i></span>
                                            @else <span class="dot"></span>   @endif
                                            <hr class="flex-fill track-line"> @if ($show_order->status_order =='chuan-bi')
                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white"></i></span>
                                            @else <span class="dot"></span>   @endif
                                            <hr class="flex-fill track-line"> @if ($show_order->status_order =='dang-giao-hang')
                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white"></i></span>
                                            @else <span class="dot"></span>   @endif
                                            <hr class="flex-fill track-line"> @if ($show_order->status_order =='thanh-cong')
                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white"></i></span>
                                            @elseif($show_order->status_order =='huy-don')
                                            <span class="d-flex justify-content-center align-items-center big-dot1 dot"><i class="fa fa-check text-white"></i></span>
                                            @else <span class="dot"></span>   @endif
                                          </div>
                                          <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start"><span></span><span>Chờ Xử Lý</span>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center"><span></span><span>Người gửi đang chuẩn bị
                                                </span></div>
                                            <div class="d-flex flex-column justify-content-center align-items-center"><span></span><span>Đang giao hàng</span></div>
                                            <div class="d-flex flex-column align-items-center"><span></span><span> @if ($show_order->status_order=='thanh-cong') Thành công 
                                              @elseif($show_order->status_order=='huy-don') Hủy đơn hàng
                                                @else
                                                Thành công
                                              @endif                               
                                            </span></div>
                                          </div>
                                          @if (session('message'))
                                          <span class="text-danger text-center mt-3">{{session('message')}}</span>
                                      @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
         {{$email}}
                                  
                                 @if ($show_order->status_order =='gio-hang' || $show_order->status_order=='chuan-bi')
                                 <div class="btn">
                                  <button wire:click="cancle_order({{$show_order->id_order}})" class="btn btn-outline-danger">Hủy đơn hàng</button>
                                </div> 
                                 @endif
                                  <hr>
                                @endforeach
                                
                              
                                </div>
                              </div>
                            </div>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
          </div>
        </div>
        <div class="col-lg-4">
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi thông tin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary">Xác Nhận</button>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal fade" id="exampleModal_add_address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm địa chỉ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary">Thêm Địa Chỉ</button>
          </div>
        </div>
      </div>
    </div>  
  </section>
<!-- Modal đổi thông tin -->
<script >
 document.addEventListener('livewire:load', function () {
        Livewire.on('toast', data => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr[data.type](data.message);
        });
    });
</script>