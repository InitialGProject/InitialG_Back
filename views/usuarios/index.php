<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
?>

<div class="usuarios-index">

    <?php // echo $this->render('_search', ['model' => $searchModel])
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') { 
            $dataProvider->pagination = array('pageSize' => 10); ?>

            <p>
                <?= Html::beginForm(['usuarios/actualizar'], 'post'); ?>
            </p>
            <?=
            Html::a(Yii::t('app', 'Crear Usuario'), ['create'], ['class' => 'btn btn-success']),
            Html::submitButton('Enviar', ['class' => 'btn btn-info',]),
            Html::dropDownList('accion', '', ['' => 'Marcar selecc. como: ', 'A' => 'Aceptadas', 'D' => 'Denegado'], ['class' => 'dropdown',]);

            ?>

            <?php
            echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    'nombre',
                    'correo:ntext',
                    //'edad',
                    // 'password',
                    //'genero',
                    [
                        'attribute' => 'estado',
                        'label' => 'Estado',
                        'filter' => app\models\Usuarios::lookupEstado(),
                        'value' => function ($data) {
                            return $data->Estado;
                        }
                    ],
                    [
                        'attribute' => 'suscripcion',
                        'label' => 'Suscripcion',
                        'filter' => app\models\Usuarios::lookupSuscripcion(),
                        'value' => function ($data) {
                            switch($data->suscripcion){
                                case 1:
                                    return "Registrado";
                                    break;
                                case 2:
                                    return "Gamer";
                                    break;
                                case 3:
                                    return "Empresa";
                                    break;
                                case 5:
                                    return "Administrador";
                                    break;

                            }
                            return $data->suscripcion;
                        },
                    ],
                    [
                        'class' => CheckboxColumn::className(), 'name' => 'idselec',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                        }
                    ],
                    //'avatar:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?= Html::endForm(); ?>
            </p>

    <?php
        } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>


</div>