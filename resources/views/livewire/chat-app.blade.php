<div>
  <section style="background-color: #eee;">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-12 col-xl-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-3"
              style="border-top: 4px solid #ffa900;">
              <h5 class="mb-0">Chat messages</h5>
            </div>
            <div class="card-body showcard" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
              {{-- check tồn tại messsage --}}
              @if ($Message && $Message->count()>0)                  
              {{-- lặp Message --}}
              @foreach ($Message as $showmessage)
              {{-- Check để lấy theo id người dùng --}}
              @if (Auth::user()->id==$showmessage->conversation_id)
                {{-- check nếu là user thì màu vàng --}}
                @if ($showmessage->sender=='user')
                <div class="d-flex justify-content-between">
                  <p class="small mb-1 text-muted">{{$showmessage->created_at}}</p>
                  <p class="small mb-1">{{Auth::user()->name}}</p>
                </div>
                <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                  <div>
                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">{{$showmessage->content_message}}</p>
                  </div>
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                    alt="avatar 1" style="width: 45px; height: 100%;">
                </div>
              {{-- ngược lại là admin --}}
                @else    
                <div class="d-flex justify-content-between">
                  <p class="small mb-1">Admin</p>
                  <p class="small mb-1 text-muted">{{$showmessage->created_at}}</p>
                </div>
                <div class="d-flex flex-row justify-content-start">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                    alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">{{$showmessage->content_message}}</p>
                  </div>
                </div>
                {{-- end check màu  --}}
                @endif
                {{-- end check tồn tại messsage --}}
              @endif
              {{-- end lặp message --}}
              @endforeach
                 {{-- end lấy tin nhắn theo id user --}}
                </div>
                <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                  <div class="input-group mb-0">
                    <input wire:model.live="content_message" type="text" class="form-control" placeholder="Vui Longf nhập tin nhắn ..."
                      aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <button wire:click="send" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning" type="button" id="button-addon2" style="padding-top: .55rem;">
                      Gửi
                    </button>
                  </div>
                </div>
              @endif
                 {{-- show theo nhìn admin  --}}
                 @if (Auth::user()->permission==2)
                 @foreach ($Messageadmin as $item =>$value)
                 @foreach ($this->getfistmessage=$this->chat->getfistmessage($item) as $show)
                 <a class="nav-link" wire:click="detailmessage({{$item}})">
                   <div class="d-flex justify-content-between">
                    @foreach ($this->chat->getuser($show->id_user) as $item)
                     <p class="small mb-1">{{$item->name}}</p>
                    @endforeach
                     <p class="small mb-1 text-muted">{{$show->created_at}}</p>
                   </div>
                   <div class="d-flex flex-row justify-content-start">
                     <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                       alt="avatar 1" style="width: 45px; height: 100%;">
                     <div>
                       <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">{{$show->content_message}}</p>
                     </div>
                   </div>
                 </a>
                 @endforeach
                @endforeach
                 @endif
          </div>
        </div>
      </div>
  
    </div>
  </section>
<style>
.showcard{
            width:100%;
            height:200px;
            padding:20px;
            overflow:scroll;
}
</style>
</div>

   {{-- lấy tin nhắn theo id admin --}}
   {{-- @else
   <div class="d-flex justify-content-between">
     <p class="small mb-1">Timona Siera</p>
     <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
   </div>
   <div class="d-flex flex-row justify-content-start">
     <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
       alt="avatar 1" style="width: 45px; height: 100%;">
     <div>
       <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">hell</p>
     </div>
   </div> --}}
  