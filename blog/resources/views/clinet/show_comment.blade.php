@foreach($comments as $comment)
   <div class="show_comment"@if($comment->parent_id != null) style="margin-left: 130px;"@endif  >
       <div class="comment-list">
           <div class="single-comment justify-content-between d-flex" >
               <div class="user justify-content-between d-flex">
                   <div class="thumb">
                       <img style="height: 70px;" src="{{ ShowImageUsers($comment->user->image_users) }}" alt="">
                   </div>
                   <div class="desc">
                       <p class="comment">
                           {{ $comment->comment_post }}
                       </p>
                       <div class="d-flex justify-content-between">
                           <div class="d-flex align-items-center">
                               <h5>
                                   <a href="#">{{$comment->user->name}}</a>
                               </h5>
                               <p class="date">{{ $comment->created_at->format('d-m-Y') }} </p>
                           </div>
                           <div class="reply-btn">
                               <a href="javascript:void 0;" class="btn-reply text-uppercase reply_comment"
                                  data-commentid="{{ $comment->id }}"
                               >reply</a>
                           </div>
                           <div class="delete-reply-btn">
                               <a href="javascript:void 0;" class="btn-reply text-uppercase btn_delete_comment"
                                  data-delcommentid="{{ $comment->id }}"
                               >delete</a>
                           </div>

                       </div>
                   </div>
               </div>
           </div>

           <div class="comment-form" style="margin-top: 0px;margin-bottom: 50px;border: none;">
               <form class="form-contact comment_form form_comment_display comment_form_id_{{ $comment->id }}"  style="display: none;">
                   @csrf
                   <div class="row">
                       <input type="hidden" name="post_id" value="{{ $blog_detail->id }}"/>
                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                       <input type="hidden" name="comment_id" class="comment_id" value="{{ $comment->id }}"/>
                       <div class="col-12">
                           <div class="form-group">
                                <input type="text" class="form-control w-100 textComment" name="comment_post" cols="30" rows="9" placeholder="Reply to comment"/>
                               <br><b class="text-danger comment_post_error"></b>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <button type="button" class="button button-contactForm btn_1 boxed-btn btn_comment_reply">Reply Message</button>
                   </div>
               </form>
           </div>
       </div>
       @include('clinet.show_comment', ['comments' => $comment->replies])
   </div>
@endforeach
