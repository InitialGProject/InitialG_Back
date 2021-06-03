<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosFacturacion */

$this->title = Yii::t('app', 'Create Productos Facturacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos Facturacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-facturacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
