<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImpressionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('template', 'impressions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impressions-index">

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
            ['class' => 'kartik\grid\SerialColumn'],

            'title',
            'description',
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
            'date',
            // 'id',
            // 'language',
            // 'content_id',
            //'body:ntext',
            //'status',
            //'created_at',
            //'updated_at',
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
        