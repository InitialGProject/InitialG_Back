<?php

/**
 * @author Juan Sanz
*/

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = Yii::t('app', 'Hacer Comentario');
?>

<div class="comentarios-create">

    <?= $this->render('_crear', [
        'model' => $model,
    ]) ?>

</div>