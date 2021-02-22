<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = $model->titulo;
\yii\web\YiiAsset::register($this);
?>

<div class="juegos-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Seguro de querer borrarlo?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'titulo:ntext',
            'descipcion:ntext',
            [
                'label' => 'Imagen',
                'format' => ['http://alum3.iesfsl.org/assets/img/juegos/'.'image',['width'=>'300', 'height'=>'200']], 
                'value'=>function($data){
                    $this->prueba=$data->imagen;
                    return('http://alum3.iesfsl.org/assets/img/juegos/'.$this->prueba);
                }
            ],            
            [
                'attribute' => 'categoria_id',
                'label' => 'Categoria',
                'value' => function ($data) {
                    return $data->categoria->categoria;
                }
            ],
            'tipo',
            //'ruta:ntext',
            'creador:ntext',
            //'sugerencia_id',
        ],
    ]) ?>

</div>