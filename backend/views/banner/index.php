<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('template', 'banner');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <div style="display: flex; justify-content: space-between;">
        <h3><?= Html::encode($this->title) ?></h3>
        <p>
            <?= Html::a(Yii::t('template', 'add'), ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'content_id',
            'name',
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'image',
                'format' => 'html',
                'value' => function($model){
                    if($model->image!=''){
                        return \yii\helpers\Html::img($model->getLogo(), ['width'=>129,'background'=>'black']);
                    }
                    else{
                        return \yii\helpers\Html::img('https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article-600x315.png', ['width'=>129,'background'=>'black']);
                    }
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'filter'=>[ "1"=>"Active", "5"=>"Pending", "0"=>"InActive" ],
                'value'=> function($model){
                    if($model->status ==5){
                        return '<div class="badge badge-soft-warning font-size-12">Pending</div>';
                    }
                    elseif($model->status ==1){
                        return '<div class="badge badge-soft-success font-size-12">Active</div>'; 
                    }
                    elseif($model->status ==0){
                        return '<div class="badge badge-soft-danger font-size-12">InActive</div>'; 
                    }
                }
            ],
            [
                'attribute'=>'language',
                'filter'=>ArrayHelper::map(\common\models\Language::find()->where(['status'=>1])->all(), 'lang_code', 'name'),
                'value'=> function($model){
                    return common\models\Banner::getTranslatedLanguages($model->content_id);
                }
            ],
            //'sort',
            //'status',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'noWrap' => true,
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' =>$model->content_id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => '??????????',
                                'aria-label' => '??????????',

                            ]);
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->content_id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => '??????????????????',
                                'aria-label' => '??????????????????',

                            ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->content_id],
                            [
                                'class' => 'label btn-link',
                                'data' => [
                                    'confirm' => '???? ??????????????, ?????? ???????????? ?????????????? ???????? ?????????????? ?',
                                    'method' => 'post',
                                ],
                                'title' => '????????????',
                                'aria-label' => '????????????',

                            ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
