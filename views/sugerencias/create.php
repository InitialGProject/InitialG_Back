<?php

/**
 * @author Juan Sanz
 */

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */

$this->title = Yii::t('app', 'Deja aquí una nueva Sugerencia');
?>

<div class="sugerencias-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>