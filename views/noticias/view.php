<?php

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
                <img src="<?= Yii::$app->request->baseUrl . $model->imagen ?>" class=" img-responsive" style="max-width: 40rem; width: 100%">
            </div>
            <div class="col-lg-6">
                <p>
                    <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', '¿Seguro que quieres eliminar esta noticia?'),
                            'method' => 'post',
                        ],
                    ]) ?>
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
                        'attribute' => 'Imagen de la noticia',
                        'value' =>  Html::a(Html::img(Yii::$app->request->baseUrl . $model->imagen, ['alt' => 'imagen noticia', 'class' => 'thing', 'height' => '100px', 'width' => '100px'])),
                        'format' => ['raw'],
                    ],
                    // 'imagen:ntext',
                ],
            ]) ?>

        <?php } else {  ?>

            <div class="noticias-view">

                <h2><?= Html::encode($this->title) ?></h2>

                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?= Yii::$app->request->baseUrl . $model->imagen ?>" class=" img-responsive" style="max-width: 40rem; width: 100%">
                    </div>

                    <div class="col-lg-6" style="vertical-align: middle;">
                        <br><br>
                        <p><strong>Autor de la noticia:</strong> <?= Html::encode($model->nombreautor) ?></p>
                        <p><strong>Fecha de publicación:</strong> <?= Html::encode($model->fechaPublicacion) ?></p>
                        <p><?= Html::encode($model->descripcion) ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p style="text-align: justify;"><?= Html::encode($model->texto) ?></p>
                    </div>
                </div>

            </div>

        <?php } ?>