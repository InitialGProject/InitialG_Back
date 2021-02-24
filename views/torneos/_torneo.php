<?php

/**
 * @author Juan Sanz
 */

// Helpers de Yii
use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

    <b><?= $model->titulo ?></b><br><br>

    <?= $model->fechaInicioTorneo . ' - ' . $model->fechaFinTorneo ?><br><br>

    Descripcion: <small><?= $model->descripcion ?></small><br><br>
    
    Creador: <small><?= $model->creador ?> </small><br><br>
    
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
                    'fecha_hora' => $model->fechaInicioTorneo
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
                    'fecha_hora' => $model->fechaInicioTorneo
                ],
                ['class' => 'btn btn-primary']
            );
        } ?>

    </div>
</div>