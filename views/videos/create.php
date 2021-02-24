<?php

/**
 * @author Marta Pretel
*/

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = Yii::t('app', 'Subir Video');
?>

<div class="videos-create">

    <?= $this->render('_crear', [
        'model' => $model,
    ]) ?>

</div>
