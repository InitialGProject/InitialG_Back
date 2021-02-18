<?php

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

  <b><?= $model->titulo ?><br><br></b>

  Creado por: <?= $model->usuario->nombre ?><br><br>

  Publicado en el: <?= $model->creado ?><br><br>

  Categoría: <small><?= $model->categorias->categoria ?> </small>
  <br><br>
  <div style='font-size:1.5rem; text-align:justify'>

    <?php
    if (Yii::$app->user->isGuest) {
    } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || $model->creador == Yii::$app->user->identity->TipoUser || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
      echo Html::a(
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
        . "<p>" . 'Publicado por <b>' . $comentario->usuario->nombre . '</b> en el <b>' . $comentario->creado . '</b><p style="color:red">' . $comentario->contenido . "</p></p></div>";
    }

    if (Yii::$app->user->isGuest || $model->estado == 'F') {
    } else { ?>
    <?=
      Html::a(
        'Añadir Comentario',
        [
          'comentarios/create', 'id' => $model->id,
        ],
        ['class' => 'btn btn-primary']
      );
    } ?>

  </div>

</div>