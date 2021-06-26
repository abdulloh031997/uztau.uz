<?php
$url = Yii::getAlias("@fronted_domain"); ?>

<div class="carucel___container">
    <!-- Carousel wrapper -->
    <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <?php $i = 0;
            foreach ($slider as $index => $item) : $i++;  ?>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="<?= $index ?>"
                class="<?= ($i == 1) ? 'active' : '' ?>" aria-current="true" aria-label="Slide 1"></button>
            <?php endforeach; ?>

        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <?php $i = 0;
            foreach ($slider as $index => $item) :  $i++; ?>
            <div class="carousel-item <?= ($i == 1) ? 'active' : '' ?>">
                <img src="<?= $url . '/' . $item['image'] ?>" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga commodi beatae, enim saepe quis,
                        cupiditate quidem, labore ab odio laudantium eum. Ut esse sapiente placeat commodi incidunt,
                        libero dicta voluptatum.</p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</div>
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="section_title"> <i class="fa fa-bullseye"></i> YANGILIKLAR</h3>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($post as $key => $one) : ?>
            <a href="<?=\yii\helpers\Url::to(['site/inner', 'id' => $one['id']], $schema = true) ?>" style="color: #0b0b0b">
            <div class="col">
                <div class="card h-100">
                    <div class="bg-image hover-zoom">
                        <img src="<?= $url . '/' . $one['image'] ?>" class="card-img-top" alt="<?= $one['title'] ?>" />
                    </div>
                    <div class="card-body">

                        <h5 class="card-title"><?= $one['title'] ?></h5>
                        <p class="card-text">
                            <?= $one['description'] ?>
                        </p>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><?=\Yii::$app->formatter->asDate($one['created_at'], 'yyyy-MM-dd');?></small>
                    </div>
                </div>
            </div>
            </a>
            <?php endforeach; ?>

        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="py-5">
                    <a href="">Barcha so'nggi yangiliklar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="title__social">
    <div class="container">
        <div class="row bg__social shadow">
            <div class="col-md-4">
                <div>
                    <h4 class="section_title"> <i class="fa fa-bullseye"></i> IJTIMOIY TARMOQLARDA</h4>
                </div>
            </div>
            <div class="col-md-8">
                <div class="sc__link row">
                    <div class="col-md-3">
                        <a href="">
                            <i class="fab fa-telegram"></i> <span>TELEGRAM</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <i class="fab fa-instagram"></i> <span>INSTAGRAM</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <i class="fab fa-youtube"></i> <span>Youtube</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <i class="fab fa-facebook"></i> <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="data_namoyish_plan">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3 text-end">
                    <h3 class="section_title"> <i class="fa fa-bullseye"></i> REJALAR</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="owl-carousel owl-theme date_plan ">
                        <?php foreach ($impressions as $key => $one) : ?>
                        <div class="item">
                            <div class="card bg-dark text-white">
                                <div class="bg-image hover-zoom">
                                    <img src="<?= $url . '/' . $one['image'] ?> "
                                        class="card-img plan___date___images" />
                                    <div class="mask" style="
                                                        background: linear-gradient(
                                                          5deg,
                                                          rgba(27, 28, 26, 0.5),
                                                          rgba(109, 109, 100, 0.5) 50%
                                                        );
                                                      "></div>
                                </div>
                                <div class="card-img-overlay">
                                    <h5 class="card-title">
                                        <a class="btn btn-warning btn-sm" href="#!" role="button"> <?=\Yii::$app->formatter->asDate($one['created_at'], 'yyyy-MM-dd');?> </a>
                                    </h5>
                                    <p class="card-text"><?= $one['title'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video___section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3">
                    <h3 class="section_title"> <i class="fa fa-bullseye"></i> SAHNA</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 d-flex align-items-center">
                <div class="video__left_bx">
                    <div class="embed-responsive embed-responsive-16by9"
                        style="width: 100%; height: auto; display: flex; justify-content: center; align-items: center;">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/<?= $collection_category_one['url'] ?>" width="100%"
                            height="100%" style="border-radius: 15px;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <?php foreach ($collection_category as $one) : ?>
                    <div class="col-md-4 my-3">
                        <div class="video__left_bx">
                            <div class="embed-responsive embed-responsive-16by9"
                                style="width: 100%; height: auto; display: flex; justify-content: center;">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/<?= $one['url'] ?>" width="100%" height="100%"
                                    style="border-radius: 15px;" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="col-md-4 my-3  d-flex justify-content-center align-items-center">
                        <div class="video__left_bx">
                            <a class="btn btn-warning" role="button"> So'ngi Videolar &nbsp;&nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallerya___section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="section_title"> <i class="fa fa-bullseye"></i> RASIMLAR</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="gallerya_images_list">
                    <ul id="lightGallery" class="gallery">
                        <?php foreach ($collection as $key => $one) : ?>
                        <li data-title="<?= $one['name'] ?>" data-desc="<?= $one['name'] ?>"
                            data-responsive-src="<?= $url . '/' . $one['image'] ?>"
                            data-src="<?= $url . '/' . $one['image'] ?>">
                            <a href="#"> <img src="<?= $url . '/' . $one['image'] ?>" />
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="py-4">
                    <a href="">Barcha so'nggi rasimlar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="section_title"> <i class="fa fa-bullseye"></i> Xamkor saytlar</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme partner__car">
                    <?php foreach ($partner as $key => $one) : ?>
                    <div class="item box___img">
                        <img src="<?= $url . '/' . $one['image'] ?>">
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>