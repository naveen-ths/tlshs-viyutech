@forelse ($comments as $comment)
<?php
// }
//echo '<pre>';
//print_r($comment);
//echo '</pre>';
?>
<div class="display-comment reply row mt-3" @if($comment['parent_id'] != null) style="margin-left:40px;" @endif>
    <div class="col-md-1 text-end img-col">
        <img src="https://randomuser.me/api/portraits/men/43.jpg" class="img-user">
    </div>
    <div class="col-md-11">
        <strong>{{ $comment['name'] ?? 'Anomymous' }}</strong>
        <br/><small><i class="fa fa-clock"></i> {{ Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</small>
        <p>{!! nl2br($comment['content']) !!}</p>
        <?php
        //if(Auth::check()) {
        ?>
        <form method="post" id="comment-reply-<?= $comment['id']; ?>">
            @csrf
            <div class="row">
                <div class="col-md-11">
                    <div class="form-group">
                        <textarea class="form-control reply_comment" name="content" placeholder="Write Your Reply..." style="height: 40px;"></textarea>
                        <input type="hidden" class="reply_post_id" name="post_id" value="{{ $post_id }}" />
                        <input type="hidden" class="reply_parent_id" name="parent_id" value="{{ $comment['id'] }}" />
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" data-id="{{ $comment['id'] }}" class="btn btn-warning reply-submit-btn"><i class="fa fa-reply"></i> Reply</button>
                </div>
            </div>
        </form>
        <?php if (!empty($comment['replies'])) { 
//   print_r($comment['replies'])
          ?>
          @include('comments.commentsDisplay', ['comments' => $comment['replies'], 'post_id' => $post_id])
        <?php } ?>
    </div>
</div>
@empty
@endforelse