  <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                        {{-- comment --}}
                        @foreach ($comments as $parent_comment_id =>$value)
                            @foreach ($value as $comment)
                                @if ($comment->in_comming=='is_comming')
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            @foreach ($this->chat->getuser($comment->id_user) as $user)
                                            <img style="max-width: 70px; border-radius: 50%" src="{{asset('assets/Clients/Image/avatar/'.$user->avatar)}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$user->name}}</h4>
                                            @endforeach
                                            <h5>{{\Carbon\Carbon::parse($comment->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')}}</h5>
                                            <button  class="reply_btn reply-btn" >Trả lời</button>
                                            <!-- Form trả lời ẩn -->
                                            <div class="reply-form" style="display: none;">
                                                <form wire:submit="repcomment({{$comment->id_comment}})" action="" method="POST">      
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea wire:model.defer="comment_content" class="form-control" name="message" id="message" rows="1" placeholder="Nội Dung"></textarea>
                                                            <div>@error('comment_content') {{ $message }} @enderror</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button  type="submit" value="submit" class="btn primary-btn">Trả Lời</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- end form --}}
                                        </div>
                                        
                                    </div>
                                    <p>{{$comment->comment_content}}</p>
                                </div>
                                {{-- end comment --}}
                                @else  
                                  {{-- Comment reply --}}
                                  <div class="review_item reply">
                                    <div class="media">
                                        <div class="d-flex">
                                            @foreach ($this->chat->getuser($comment->id_user) as $user)
                                            <img style="max-width: 70px; border-radius: 50%" src="{{asset('assets/Clients/Image/avatar/'.$user->avatar)}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$user->name}}</h4>
                                            @endforeach
                                            <h5>{{\Carbon\Carbon::parse($comment->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')}}</h5>
                                        </div>
                                    </div>
                                    <p>{{$comment->comment_content}}</p>
                                </div>
                               {{-- End comment reply --}}
                                @endif
                               
                              
                               @endforeach
                               @endforeach
                        </div>
                    </div>
                    {{-- end show comment --}}
                    {{-- form post comment --}}
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Bình luận sản phẩm</h4>
                            <form wire:submit="add" class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea wire:model.defer="comment_content" class="form-control" name="message" id="message" rows="1" placeholder="Nội Dung"></textarea>
                                        <div>@error('comment_content') {{ $message }} @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button  type="submit" value="submit" class="btn primary-btn"> Bình Luận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end form post comment --}}
                </div>

                