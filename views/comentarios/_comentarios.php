<?php

/**
 * @author Juan Sanz
 */

// Helpers de Yii
use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

    <b><?= $model->contenido ?></b><br><br>

    Entrada Relacionada: <?php $model->EntradaRelacionada ?><br><br>

    Creador: <small><?php $model->autor ?> </small>

    <br><br>
    <div style='color:blue;font-size:0.8em'>

        <?php
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(
                'Editar',
                [
                    'comentarios/update', 'id' => $model->id,
                    'usuarios_nombre' => $model->usuario->nombre,
                ],
                ['class' => 'btn btn-primary']
            );
        }  ?>

        <?php
        if (Yii::$app->user->isGuest) {
        } else {
            echo Html::a(
                'Ver',
                [
                    'comentarios/view', 'id' => $model->id,
                    'usuarios_nombre' => $model->usuario->nombre,
                ],
                ['class' => 'btn btn-primary']
            );
        } ?>

    </div>
</div>