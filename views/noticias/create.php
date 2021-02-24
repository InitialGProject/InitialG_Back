<?php

/**
 * @author Dan Nedelea
*/

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */

$this->title = Yii::t('app', 'Crear Noticia');
?>

<div class="noticias-create">

    <?= $this->render('_crear', [
        'model' => $model,
    ]) ?>

</div>