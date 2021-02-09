<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Participantestorneos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participantestorneos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Participantestorneos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'torneos_id',
            'usuario_id',
            'numeroParticipantes',
            'premioTorneo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
