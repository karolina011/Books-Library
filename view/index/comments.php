<?php foreach ($this->comments as $key => $comment): ?>

    <div class="oneComment">
        <div class="card-header bg-danger mt-3">
            <div class="row">
                <div class="text-left col-5 pl-3"><b><?php echo $comment['login'] ?></b></div>
                <div class="col-7 text-right"><?php echo $comment['data'] ?></div>
            </div>
        </div>
        <div class="card-body bg-light p-3 border-left border-right border-bottom-0">
            <div><?php echo $comment['comment'] ?></div>
        </div>
        <div class="card-footer bg-light p-1 border ">
            <div class="row" data-id="<?php echo $comment['commentID'] ?>">
                <div class="like text-secondary float-right mx-2 mb-0 p-2">
                    <i class="fas fa-thumbs-up"></i>Like
                </div>
                <div class="unlike text-danger float-right mx-2 mb-0 p-2"><i
                            class="fas fa-thumbs-down"></i>Unike
                </div>
                <button type="button" data-type="firstReply"
                        class="reply btn btn-secondary py-0 px-2">Odpowiedz
                </button>
            </div>
        </div>

        <div class="replies col-11 offset-1">

            <?php foreach ($comment['firstReplies'] as $key => $firstReply) : ?>

                <div class="card-header bg-secondary mt-3">
                    <div class="row">
                        <div class="text-left col-5 pl-3"><b><?php echo $firstReply['login'] ?></b></div>
                        <div class="col-7 text-right"><?php echo $firstReply['data'] ?></div>
                    </div>
                </div>
                <div class="card-body bg-light p-3 border-left border-right border-bottom-0">
                    <div><?php echo $firstReply['comment'] ?></div>
                </div>
                <div class="card-footer bg-light p-1 border ">
                    <div class="row" data-id="<?php echo $firstReply['commentID'] ?>">
                        <div class="like text-secondary float-right mx-2 mb-0 p-2">
                            <i class="fas fa-thumbs-up"></i>Like
                        </div>
                        <div class="unlike text-danger float-right mx-2 mb-0 p-2"><i
                                    class="fas fa-thumbs-down"></i>Unike
                        </div>
                        <button type="button" data-type="secondReply"
                                class="reply btn btn-secondary py-0 px-2">Odpowiedz
                        </button>
                    </div>
                </div>

                <div class="replies col-10 offset-2">

                    <?php foreach ($firstReply['secondReplies'] as $key => $secondReply) : ?>

                        <div class="card-header bg-secondary mt-3">
                            <div class="row">
                                <div class="text-left col-5 pl-3"><b><?php echo $secondReply['login'] ?></b></div>
                                <div class="col-7 text-right"><?php echo $secondReply['data'] ?></div>
                            </div>
                        </div>
                        <div class="card-body bg-light p-3 border-left border-right border-bottom-0">
                            <div><?php echo $secondReply['comment'] ?></div>
                        </div>
                        <div class="card-footer bg-light p-1 border ">
                            <div class="row" data-id="<?php echo $secondReply['commentID'] ?>">
                                <div class="like text-secondary float-right mx-2 mb-0 p-2">
                                    <i class="fas fa-thumbs-up"></i>Like
                                </div>
                                <div class="unlike text-danger float-right mx-2 mb-0 p-2"><i
                                            class="fas fa-thumbs-down"></i>Unike
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <div class="secondReply" style="display: none;">
                        <form method="post" class="commentForm mt-2">

                            <div class="form-group">
                                <input type="hidden" name="parentID"
                                       value="<?php echo $firstReply['commentID'] ?>"/>
                                <textarea name="commentContent"
                                          class="commentContent form-control"
                                          placeholder="Enter comment"
                                          rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        data-id="<?php echo $firstReply['bookID'] ?>"
                                        class="btn btn-secondary addComment">Dodaj
                                    komentarz
                                </button>
                                <p class="commentMessage"></p>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="firstReply" style="display: none;">
                <form method="post" class="commentForm mt-2">

                    <div class="form-group">
                        <input type="hidden" name="parentID"
                               value="<?php echo $comment['commentID'] ?>"/>
                        <textarea name="commentContent"
                                  class="commentContent form-control"
                                  placeholder="Enter comment"
                                  rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                data-id="<?php echo $comment['bookID'] ?>"
                                class="btn btn-secondary addComment">Dodaj
                            komentarz
                        </button>
                        <p class="commentMessage"></p>
                    </div>
                </form>
            </div>

        </div>

    </div>

<?php endforeach; ?>