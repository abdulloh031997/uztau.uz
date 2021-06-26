<?php

use yii\helpers\Url;

$url = Yii::getAlias("@fronted_domain");
?>
<section>
    <div class="breadcat__bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        <a href="">Bosh sahifa /</a><span> Yangilik</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row" id="about_left">
            <div class="col-md-8 shadow py-4 rounded" style="background-color: aliceblue;">
                <?php foreach ($news as $index => $one): ?>
                    <div class="card mb-3" style="max-width: 100%; ">
                        <a href="<?= Url::to(['site/inner', 'id' => $one['id']], $schema = true) ?>"
                           class="text-dark font-weight-600">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex align-items-center justify-content-center ">
                                    <div class="news_image__post">
                                        <img src="<?= $url . '/' . $one['image'] ?>" alt class="img-fluid rounded"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$one['category']['name']?></h5>
                                        <p class="card-text">
                                            <?= $one['title'] ?>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item text-center list-group-item-action bg-warning font-weight-bold"
                       aria-current="true">
                        Kategorya
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Yangilik</a>
                    <a href="#" class="list-group-item list-group-item-action">Maqola</a>
                    <a href="#" class="list-group-item list-group-item-action">Tabrik</a>
                    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1"
                       aria-disabled="true">Yangi teatir</a>
                </div>
                <div class="bobbb p-3 shadow">
                    <div class="card_image">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/3.jpg" class="img-fluid rounded" alt>
                    </div>
                </div>
                <div>
                    <div class="socila">
                        <ul class="navbar-nav d-flex flex-row me-1 navbar___social">
                            <li class="nav-item me-3 me-lg-0 d-flex">
                                <a class="nav-link px-2 mx-auto my-5" href="#"><i class="fa-2x fab fa-facebook"></i></a>
                                <a class="nav-link px-2 mx-auto my-5" href="#"><i
                                            class="fa-2x fab fa-instagram"></i></a>
                                <a class="nav-link px-2 mx-auto my-5" href="#"><i class="fa-2x fab fa-telegram"></i></a>
                                <a class="nav-link px-2 mx-auto my-5" href="#"><i class="fa-2x fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="blog-pagination" data-aos="fade-up">
    <?php echo \yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
    ]); ?>
</div>

</div>
</section><!-- End Blog Section -->

</main><!-- End #main -->