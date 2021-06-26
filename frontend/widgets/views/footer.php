<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$url = Yii::getAlias("@fronted_domain");
?>
<footer class="text-center text-lg-start bg-light text-muted">
    <section class="footer__bg py-5">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 text-center">
                        <i class="fas fa-gem me-3"></i>O'ZBEKSITON TEATIR ARBOBLARI UYISHMASI
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae dolorum odit odio labore.
                        Quis, necessitatibus rerum? Corporis nemo earum voluptate, accusamus aut provident veritatis
                        consectetur similique amet. At, placeat possimus.
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Bo'limlar
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Bosh sahifa</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Biz haqimizda</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Teatir</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Bog'lanish</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Ishtimoiy tarmoqlar
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Telegram</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Facebook</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Instagram</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Youtube</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Aloqa
                    </h6>
                    <p><i class="fas fa-home me-3"></i>O'zbekiston, Tashkent, Navoiy ko'cha </p>
                    <p>
                        <i class="fas fa-envelope me-3"></i> info@uztau.uz
                    </p>
                    <p><i class="fas fa-phone me-3"></i>+99893 688 84 99</p>
                    <p><i class="fas fa-phone me-3"></i>+99899 783 84 99</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://uone.uz/">UONE ACTIVE</a>
    </div>
</footer>