<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = Yii::t('app', 'Actualizar Entrada: {name}', [
    'name' => $model->usuario->nombre . ' - ' . $model->creado,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['/entradas/index']];
$this->params['breadcrumbs'][] = [
    'label' => $model->usuario->nombre . ' - ' . $model->creado,
    'url' => [
        'view', 'id' => $model->id,
        'usuarios_nombre' => $model->usuario->nombre,
        'fecha_hora' => $model->creado
    ]
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar Entrada');
?>
<div class="entradas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>