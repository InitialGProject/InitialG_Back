<?php

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

  <b><?= $model->autor->nombre ?> - <?= $model->fecha ?><br><br></b>

  <?= $model->titulo ?><br><br>
  Categoría: <small><?= $model->entradas->categorias->categoria ?> </small>
  <br><br>
  <div style='color:blue;font-size:0.8em'>

    <?php
    if (Yii::$app->user->isGuest) {
    } else { ?>
    <?=
      Html::a(
        'Editar',
        [
          'noticias/update', 'id' => $model->id,
          'usuario_nombre' => $model->autor->nombre,
          'fecha_hora' => $model->fecha
        ],
        ['class' => 'btn btn-primary']
      );
    } ?>

    <?= Html::a(
      'Ver',
      [
        'noticias/view', 'id' => $model->id,
        'usuarios_nombre' => $model->autor->nombre,
        'fecha_hora' => $model->fecha
      ],
      ['class' => 'btn btn-primary']
    ) ?>

    <?php

    echo '<br><br>';

    // foreach ($model->noticias as $noticia) {
    //   echo "<div class='row' style= margin:5px; padding:20px;>"
    //     . "<p>" . $noticia->fecha . ' ' . $noticia->contenido . "</p></div>";
    // }

    if (Yii::$app->user->isGuest) {
    } else { ?>
    <?=
      Html::a(
        'Añadir Noticia',
        [
          'noticias/create', 'id' => $model->id,
        ],
      );
    } ?>

  </div>

</div>