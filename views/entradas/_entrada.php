<?php

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

  <b><?= $model->usuario->nombre ?> - <?= $model->creado ?><br><br></b>

  <?= $model->titulo ?><br><br>
  Categoría: <small><?= $model->categorias->categoria ?> </small>
  <br><br>
  <div style='color:blue;font-size:0.8em'>

    <?php
    if (Yii::$app->user->isGuest) {
    } else { ?>
    <?=
      Html::a(
        'Editar',
        [
          'entradas/update', 'id' => $model->id,
          'usuarios_nombre' => $model->usuario->nombre,
          'fecha_hora' => $model->creado
        ],
        ['class' => 'btn btn-primary']
      );
    } ?>

    <?= Html::a(
      'Ver',
      [
        'entradas/view', 'id' => $model->id,
        'usuarios_nombre' => $model->usuario->nombre,
        'fecha_hora' => $model->creado
      ],
      ['class' => 'btn btn-primary']
    ) ?>

    <?php

    echo '<br><br>';

    foreach ($model->comentarios as $comentario) {
      echo "<div class='row' style= margin:5px; padding:20px;>"
        . "<p>" . $comentario->creado . ' ' . $comentario->contenido . "</p></div>";
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
    } ?>

  </div>

</div>