<?php

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

    <b><?= $model->usuario->nombre ?> - <?= $model->fechaInicio ?> - <?= $model->fechaFin ?><br><br></b>

    Título: <small><?= $model->titulo ?></small><br><br>
    Descripcion: <small><?= $model->descripcion ?></small><br><br>
    Categoría: <small><?= $model->categorias->categoria ?> </small>
    <br><br>
    <div style='color:blue;font-size:0.8em'>

        <?php
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(
                'Editar',
                [
                    'torneos/update', 'id' => $model->id,
                    'usuarios_nombre' => $model->usuario->nombre,
                    'fecha_hora' => $model->fechaInicio
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
                    'torneos/view', 'id' => $model->id,
                    'usuarios_nombre' => $model->usuario->nombre,
                    'fecha_hora' => $model->fechaInicio
                ],
                ['class' => 'btn btn-primary']
            );
        } ?>

        <?php
        /*
        echo '<br><br>';

        foreach ($model->comentarios as $comentario) {
            echo "<div class='row' style= margin:5px; padding:20px;>"
                . "<p>" . $comentario->fecha_hora . ' ' . $comentario->texto . "</p></div>";
        }

        if (Yii::$app->user->isGuest) {
        } else { ?>
        <?=
            Html::a(
                'Añadir Comentario',
                [
                    'comentarios/create', 'id' => $model->id,
                ],
            );
        }*/ ?>
    </div>

</div>