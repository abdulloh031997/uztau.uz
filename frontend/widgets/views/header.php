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
      $out .= '<li> <a class="" href="' . Url::to(["$name->link"]) . '">' . $name->name . '</a></li>';
    }
    return $out;
  }
  ?>

 <?php foreach ($language as $index => $lang) : ?>
 <a href="<?= \yii\helpers\Url::to(['site/change', 'lang' => $lang['lang_code']]) ?>">
     <span class="ml-2 text-white"><?= $lang['name'] ?></span>
 </a>
 <?php endforeach; ?>



 <?php
  $model = Menu::find()->where(['parent_id' => 0])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_ASC])->asArray()->all();
  foreach ($model as $one) {
    echo getRun($one['id']);
  }
  ?>
 <?php
  $script = <<< JS
  
JS;
  $this->registerJs($script);
  ?>