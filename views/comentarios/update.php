<?php

/**
 * @author Juan Sanz
*/

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = Yii::t('app', 'Actualizar Comentario: {name}', [
    'name' => $model->contenido,
]);
?>

<div class="comentarios-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>