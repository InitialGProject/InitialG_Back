<?php

/**
 * @author Dan Nedelea
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */

$this->title = $model->titulo;
\yii\web\YiiAsset::register($this);
?>

<div class="noticias-view">

    <?php if (Yii::$app->user->identity->TipoUser == 'Admin') {  ?>

        <div class="row">
            <div class="col-lg-6">
                <img src="<?= Yii::$app->request->baseUrl."/uploads/noticias/" . $model->imagen ?>" class=" img-responsive" style="max-width: 40rem; width: 100%">
            </div>
            <div class="col-lg-6">
                <p>
                    <?php
                    // Botón Actualizar
                    if (
                        // Yii::$app->user->identity->TipoUser == 'Gamer' ||
                        Yii::$app->user->identity->TipoUser == 'Empresa' ||
                        Yii::$app->user->identity->TipoUser == 'Admin'
                    ) {
                        echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    } ?>
                    <?php
                    // Botón Borrar
                    if (
                        Yii::$app->user->identity->TipoUser == 'Admin'
                    ) {
                        echo Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', '¿Seguro que quieres eliminar esta noticia?'),
                                'method' => 'post',
                            ],
                        ]);
                    } ?>
                </p>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'nombreautor',
                    'fechaPublicacion',
                    'descripcion:ntext',
                    'texto:ntext',
                    [
                        'label' => 'Imagen',
                        'format' => ['image', ['width' => '300', 'height' => '200']],
                        'value' => function ($data) {
                            return ('http://alum3.iesfsl.org/assets/img/noticias/' . $data->imagen);
                        }
                    ],
                    // 'imagen:ntext',
                ],
            ]) ?>

        <?php } else {  ?>

            <div class="noticias-view">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?= Yii::$app->request->baseUrl . $model->imagen ?>" class=" img-responsive" style="max-width: 40rem; width: 100%">
                    </div>

                    <div class="col-lg-6" style="vertical-align: middle;">
                        <br><br>
                        <p><strong>Fecha de publicación:</strong> <?= Html::encode($model->fechaPublicacion) ?></p>
                        <p><?= Html::encode($model->descripcion) ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p style="text-align: justify;"><?= Html::encode($model->texto) ?></p>
                        <p><strong>Autor de la noticia:</strong> <?= Html::encode($model->nombreautor) ?></p>
                    </div>
                </div>

            </div>

        <?php } ?>