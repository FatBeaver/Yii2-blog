<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?= $article->getImage('index'); ?>" alt=""></a>
                    </div>
                    <div class="post-content">

                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]);?>">
                                <?= $article->category->title; ?></a>
                            </h6>

                            <h1 class="entry-title"><a href="blog.html"><?= $article->title; ?></a></h1>


                        </header>

                        <div class="entry-content">
                           <?= $article->content; ?>
                        </div>
                        <div class="decoration">
                            <?php foreach($tags as $tag): ?>
                                <a href="" class="btn btn-default"><?= $tag->title; ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="social-share">
							<span
                            class="social-share-title pull-left text-capitalize">By Rubel <?= $article->getDate(); ?>
                            </span>
                            <ul class="text-center pull-right">
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
            
                <?php if (!empty($comments)): ?>

                <?php foreach($comments as $comment): ?>
                    <div class="bottom-comment">
                        <!--bottom comment-->
                        <h4>3 comments</h4>

                        <div class="comment-img">
                            <img width="50px" class="img-circle" src="<?= $comments->user->image; ?>" alt="user_image">
                        </div>

                        <div class="comment-text">
                            <a href="#" class="replay btn pull-right"> Replay</a>
                            <h5><?= $comment->user->name; ?></h5>

                            <p class="comment-date">
                                <?= $comment->getDate(); ?>
                            </p>


                            <p class="para">
                                <?= $comment->text; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php endif; ?>

                <?php if(!Yii::$app->user->isGuest): ?>
                    <div class="leave-comment"><!--leave comment-->
                    <h4>Оставить комментарий</h4>

                    <?php if(Yii::$app->session->getFlash('comment')):?>
                        <div class="alert alert-success" role="alert">
                            <?= Yii::$app->session->getFlash('comment'); ?>
                        </div>
                    <?php endif;?>

                    <?php $form = ActiveForm::begin(['action' => ['site/comment', 'id' => $article->id],
                    'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']]) ?>
                            <div class="form-group">
                                <div class="col-md-12">

                    <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control', 
                        'placeholder' => 'Оставить комментарий'])->label(false) ?>

                                </div>
                            </div>
                    <button class="btn send-btn">Оставить коментарий</button>
                    <?php ActiveForm::end(); ?>     
                    </div><!--end leave comment-->
                <?php endif; ?>

            </div>

                <?= $this->render('../partials/sidebar', [
                    'popular' => $popular,
                    'recent' => $recent,
                    'categories' => $categories,
                ]); ?>  

        </div>
    </div>
</div>