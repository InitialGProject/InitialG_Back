<?php

/**
 * @author Alejandro Lopez
*/

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = Yii::t('app', 'Crear Juego');
?>

<div class="juegos-create">

    <?= $this->render('_crear', [
        'model' => $model,
    ]) ?>

</div>