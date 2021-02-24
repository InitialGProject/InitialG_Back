<?php

/**
 * @author Alejandro Lopez
*/

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = Yii::t('app', 'Actualizar Juego: {name}', [
    'name' => $model->titulo,
]);
?>

<div class="juegos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>