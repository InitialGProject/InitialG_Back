<?php

/**
 * @author Juan Sanz
*/

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */

if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
    $this->title = Yii::t('app', 'Crear nuevo Torneo');
?>

    <div class="torneos-create">

    <?php
    echo $this->render('_crear', [
        'model' => $model,
    ]);
}
    ?>
    </div>