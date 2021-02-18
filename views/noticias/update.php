<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */

$this->title = Yii::t('app', 'Update Noticias: {name}', [
    'name' => $model->titulo,
]);
?>

<div class="noticias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // Editar
        if (Yii::$app->user->isGuest || 
            Yii::$app->user->identity->TipoUser == 'Basic' ||
            Yii::$app->user->identity->TipoUser == 'Gamer'
        ) {
            echo ("No tienes acceso a este sitio");
        } else {
            echo $this->render('_form', ['model' => $model ]);
        } 
    ?>

</div>