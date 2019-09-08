<div class="oneComment">
    <div class="card-header bg-danger mt-3">
        <div class="row">
            <div class="text-left col-5 pl-3"><b><?php echo $this->oneComment['login'] ?></b></div>
            <div class="col-7 text-right"><?php echo $this->oneComment['data'] ?></div>
        </div>
    </div>
    <div class="card-body bg-light p-3 border-left border-right border-bottom-0">
        <div><?php echo $this->oneComment['comment'] ?></div>
    </div>
    <div class="card-footer bg-light p-1 border ">
        <div class="row" data-id="<?php echo $this->oneComment['commentID'] ?>">
            <div class="like text-secondary float-right mx-2 mb-0 p-2"><i class="fas fa-thumbs-up"></i>Like</div>
            <div class="unlike text-danger float-right mx-2 mb-0 p-2"><i class="fas fa-thumbs-down"></i>Unike</div>
            <button type="button" class="reply btn btn-secondary py-0 px-2">Odpowiedz</button>
        </div>
    </div>

    <div class="showreply col-11 offset-1" style="display: none;">
        <form method="post" class="commentForm mt-2">

            <div class="form-group">
                <textarea name="commentContent" class="commentContent form-control" placeholder="Enter comment"
                          rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" data-id="<?php echo $this->oneComment ?>"
                        class="btn btn-secondary addComment">Dodaj
                    komentarz
                </button>
            </div>

        </form>
    </div>
</div>