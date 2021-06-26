<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = '404';
?>
<!-- Header -->
    <div class="container">
        <div class="row " style="min-height: 100%;display: flex; justify-content: center;align-items: center">
            <div class="col-lg-12">
                <div>
                    <div class="text-dark shadow" style="font-size:84px;font-family: Sans-serif; font-weight: bold"><?= Html::encode($this->title) ?></div>

                    <a href="/" style="font-weight: bold; padding: 14px 15px;background: #0a47a9;color:#fff; text-decoration: none; font-family: Sans-serif; margin: 20px 10px; border-radius: 10px">Bosh sahifa</a>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
<!-- end of header -->
