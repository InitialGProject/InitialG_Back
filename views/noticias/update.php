<?php

/**
 * @author Dan Nedelea
*/

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */

$this->title = Yii::t('app', 'Actualizar Noticia: {name}', [
    'name' => $model->titulo,
]);
?>

<div class="noticias-update">

    <?php // Editar
    if (
        Yii::$app->user->isGuest ||
        Yii::$app->user->identity->TipoUser == 'Basic' ||
        Yii::$app->user->identity->TipoUser == 'Gamer'
    ) {
        echo ("No tienes acceso a este sitio");
    } else {
        echo $this->render('_form', ['model' => $model]);
    }
    ?>

</div>