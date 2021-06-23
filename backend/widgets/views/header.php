<?php

use frontend\components\Helper;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= $this->imagesUrl('images/11.png') ?>" alt="logo" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= $this->imagesUrl('images/11.png') ?>" alt="logo" height="40">
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">

                        <span class="text-light text-center" style="font-family:sans-serif;font-size:24px;">
                            UZ
                        </span>
                    </span>
                    <span class="logo-lg">
                        <span class="text-light text-center" style="font-family:sans-serif;font-size:24px;">
                            UZTAU.UZ
                        </span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
            <span class="pt-4 ml-5">
                <a href="<?= Helper::createMultilanguageReturnUrl('uz') ?>"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/8/84/Flag_of_Uzbekistan.svg" width="25px"
                        alt=""> O'zbek </a> <span>|</span>
                <a href="<?= Helper::createMultilanguageReturnUrl('ru') ?>"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Flag_of_Russia.svg" width="25px"
                        alt=""> Рус</a>
            </span>
        </div>

        <div class="d-flex">

            <div class="d-inline-block">
                <a href="#" class="btn header-item header-item-icon waves-effect" target="_blank">
                </a>

            </div>

            <div class="dropdown d-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="<?= Url::to(['/']); ?>" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="ri-shopping-cart-line"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="<?= Url::to(['/']); ?>">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View More
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="<?= $this->imagesUrl('images/users/avatar-3.jpg') ?>">
                    <span class="d-none d-xl-inline-block ml-1"><?= Yii::$app->user->identity->username; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= Url::to(['/']); ?>">
                        <i class="ri-user-line align-middle mr-1"></i> Profile
                    </a>
                    <a class="dropdown-item d-block" href="<?= Url::to(['/']); ?>">
                        <i class="ri-settings-2-line align-middle mr-1"></i> Edit profile
                    </a>
                    <a class="dropdown-item d-block" href="<?= Url::to(['/']); ?>">
                        <i class="ri-key-2-line align-middle mr-1"></i> Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <?= Html::a('<i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout', ['/site/logout'], ['class' => 'dropdown-item text-danger', 'data-method' => 'post', 'title' => 'Logout']) ?>
                </div>
            </div>

        </div>
    </div>
</header>