<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Useruser */

$this->title = Yii::t('app', 'Agregar amigo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Amigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useruser-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>