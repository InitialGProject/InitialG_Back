<?php

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

    <b><?= $model->autor->nombre ?></b>

    <?= $model->comentario ?><br><br>

    <div style='color:blue;font-size:0.8em'>

        <?= Html::a(
            'Ver',
            [
                'sugerencias/view', 'id' => $model->id,
                'usuarios_nombre' => $model->autor->nombre
            ],
            ['class' => 'btn btn-primary']
        ) ?>

    </div>

</div>