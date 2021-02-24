<?php

/**
 * @author Dan Nedelea
*/

use yii\helpers\Html;

?>

<div class=row style='background:#ddd;margin:5px;padding:5px;'>

  <b><?= $model->titulo ?><br><br></b>
  Publicado en: <?= $model->fechaPublicacion ?><br><br>
  <?= $model->descripcion ?><br><br>
  Categoría: <small><?= $model->entradas->categorias->categoria ?> </small><br><br>
  Autor: <?= $model->nombreautor ?><br><br>

  <div style='color:blue;font-size:0.8em'>

    <?php
    if (Yii::$app->user->isGuest) {
    } else {
      // Botón Actualizar
      if (
        // Yii::$app->user->identity->TipoUser == 'Gamer' ||
        Yii::$app->user->identity->TipoUser == 'Empresa' ||
        Yii::$app->user->identity->TipoUser == 'Admin'
      ) {
        echo Html::a(
          'Editar',
          [
            'noticias/update', 'id' => $model->id,
            'usuario_nombre' => $model->autor->nombre,
            'fecha_hora' => $model->fechaPublicacion
          ],
          ['class' => 'btn btn-primary']
        );
      }
    } ?>

    <?= Html::a(
      'Ver',
      [
        'noticias/view', 'id' => $model->id,
        'usuarios_nombre' => $model->autor->nombre,
        'fecha_hora' => $model->fechaPublicacion
      ],
      ['class' => 'btn btn-primary']
    ) ?>

    <?php

    echo '<br><br>';

    ?>

  </div>
</div>