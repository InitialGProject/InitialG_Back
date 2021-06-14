<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">
<?php
if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else { 
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
        $dataProvider->pagination = array('pageSize' => 10); ?>
            <p>
                <?= Html::beginForm(['productos/actualizar'], 'post'); ?>
            </p>
            <p>
                <?= 
                Html::a(Yii::t('app', 'Crear Producto'), ['create'], ['class' => 'btn btn-success']),
                Html::submitButton('Editar Seleccionados', ['class' => 'btn btn-info',]),
                Html::dropDownList('accion', '', ['' => 'Cambiar Disponibilidad ', '0' => 'No Disponible', '1' => 'Disponible'], ['class' => 'dropdown',]),
                Html::dropDownList('accion2', '', ['' => 'Cambiar Estado ', '0' => 'Normal', '1' => 'Nuevo', '2' => 'Oferta'], ['class' => 'dropdown',]);
                ?>
            </p>

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    [
                        'attribute' => 'cat_id',
                        'label' => 'Categoria',
                        'filter' => app\models\ProductosCategoria::lookup(),
                        'value' => function ($data) {
                            return $data->cat->nombre;
                        }
                    ],
                    'nombre:ntext',
                    [
                        'attribute' => 'precio',
                        'label' => 'Precio',
                        'value' => function ($data) {
                            return $data->precio." €";
                        }
                    ],                    
                    'stock',
                    [
                        'attribute' => 'disponible',
                        'label' => 'Disponible',
                        'filter'=>['0'=>'No','1'=>'Si'],
                        'value' => function ($data) {
                            return app\models\Productos::Activo( $data->disponible);
                        }
                    ],
                    [
                        'attribute' => 'estado',
                        'label' => 'Estado',
                        'filter'=>['0'=>'Normal','1'=>'Nuevo','2'=>'Oferta'],
                        'value' => function ($data) {
                            return app\models\Productos::Estado( $data->estado);
                        }
                    ],
                    [
                        'label' => '',
                        'format' => ['image', ['width' => '50', 'height' => '50']],
                        'value' => function ($data) {
                            return ('http://alum3.iesfsl.org/assets/img/tienda/' . $data->imagen);
                        }
                    ],
                    [
                        'class' => CheckboxColumn::class, 'name' => 'idselec',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?= Html::endForm(); ?>
            </p>

            <?php Pjax::end(); ?>
            <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>
</div>
