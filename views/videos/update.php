<?php

/**
 * @author Marta Pretel
*/

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = Yii::t('app', 'Actualizar Video: {name}', [
    'name' => $model->titulo,
]);
?>

<div class="videos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
