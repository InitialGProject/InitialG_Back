<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosCategoria */

$this->title = Yii::t('app', 'Crear Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-categoria-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
