<?php

use common\models\Language;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Helper;
use common\models\Menu;

$url = Yii::getAlias("@fronted_domain");
$language = Language::find()->where(['status' => 1])->asArray()->all();
// echo "<pre>";
// print_r($language);
// exit();
// echo "</pre>";
function getRun($id)
{
    $out = '';
    $name = Menu::find()->where(['status' => 1])->andWhere(['id' => $id])->one();

    $exist = Menu::find()->where(['status' => 1])->andWhere(['parent_id' => $id]);


    if ($exist->exists()) {
        $out .= '<li class="dropdown">
                    <a href="' . Url::to(["$name->link"]) . '" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">
                    ' . $name->name . '
                    <span class="caret"></span></a>';
        $out .= '<ul class="dropdown-menu">';
        $items = $exist->orderBy(['c_order' => SORT_ASC])->all();

        foreach ($items as $item) {
            $out .= getRun($item->id);
        }
        $out .= '</ul>
                </li>';
    } else {
        $out .= '<li class="nav-item"> <a class="nav-link font__weight__bold text-warning" href="' . Url::to(["$name->link"]) . '">' . $name->name . '</a></li>';
    }
    return $out;
}

?>


<div class="container-fuild top__header">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 ml_pl">
                        <div class="logo__image d-flex align-items-center">
                            <div class="logooo">
                                <a href="#">
                                    <img src="https://teatr.uz/wp-content/uploads/2019/02/cropped-cropped-Logo.png"
                                        width="" alt="">
                                </a>
                            </div>
                            <div class="site_text__name">
                                <a href="#">
                                    O'ZBEKSITON TEATIR <br> ARBOBLARI UYISHMASI
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 top__header__reight">

                        <div class="site__lang">
                            <div>
                                <span>
                                    <a href="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <?php foreach ($language as $index => $lang) : ?>
                            <span>
                                <a href="<?= \yii\helpers\Url::to(['site/change', 'lang' => $lang['lang_code']]) ?>">
                                    <?= $lang['name'] ?> </a>
                            </span>
                            <?php endforeach; ?>

                        </div>

                        <div class="site__contact_header">
                            <div>
                                <a href="">
                                    <span><i class="fa fa-phone"></i></span>+99893 688 84 99 </a>
                            </div>
                            <div>
                                <a href="">
                                    <span><i class="fa fa-envelope"></i></span> info@uztau.uz </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav__wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Link -->
                    <?php
                    $model = Menu::find()->where(['parent_id' => 0])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_ASC])->asArray()->all();
                    foreach ($model as $one) {
                        echo getRun($one['id']);
                    }
                    ?>

                </ul>

                <!-- Icons -->
                <ul class="navbar-nav d-flex flex-row me-1 navbar___social">
                    <li class="nav-item me-3 me-lg-0 d-flex">
                        <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="nav-link" href="#"><i class="fab fa-telegram"></i></a>
                        <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
                <!-- Search -->
                <form class="w-auto">
                    <input type="search" class="form-control" placeholder="Qidirish" aria-label="Search" />
                </form>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
</div>


<?php
$script = <<< JS
  
JS;
$this->registerJs($script);
?>