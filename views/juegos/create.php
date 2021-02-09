<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = Yii::t('app', 'Create Juegos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Juegos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
