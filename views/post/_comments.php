<?php use yii\bootstrap\Html;

foreach ($comments as $comment): ?>

    <div class="comment" id="c<?php echo $comment->id; ?>">

        <?php echo Html::a("#{$comment->id}", $comment->getCommentUrl($post), array(
            'class' => 'cid',
            'title' => 'Постоянная ссылка на этот комментарий',
        )); ?>

        <div class="author">
            <?php echo $comment->authorLink; ?> написал:
        </div>

        <div class="time">
            <?php echo date('F j, Y \a\t h:i a', $comment->create_time); ?>
        </div>

        <div class="content">
            <?php echo nl2br(Html::encode($comment->content)); ?>
        </div>

    </div><!-- comment -->


<?php endforeach; ?>