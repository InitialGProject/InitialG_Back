<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chats abiertos');
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="chat-user-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            $dataProvider->pagination = array('pageSize' => 5); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Chat'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'chat_id',
                    'user_id',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>

</div>