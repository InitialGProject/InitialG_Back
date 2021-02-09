<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participantestorneos".
 *
 * @property int $id
 * @property int $torneos_id
 * @property int $usuario_id
 * @property int $numeroParticipantes
 * @property int $premioTorneo
 *
 * @property Torneos $torneos
 * @property Usuarios $usuario
 */
class Participantestorneos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participantestorneos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['torneos_id', 'usuario_id', 'numeroParticipantes', 'premioTorneo'], 'required'],
            [['torneos_id', 'usuario_id', 'numeroParticipantes', 'premioTorneo'], 'integer'],
            [['torneos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Torneos::className(), 'targetAttribute' => ['torneos_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'torneos_id' => Yii::t('app', 'Torneos ID'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'numeroParticipantes' => Yii::t('app', 'Numero Participantes'),
            'premioTorneo' => Yii::t('app', 'Premio Torneo'),
        ];
    }

    /**
     * Gets query for [[Torneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasOne(Torneos::className(), ['id' => 'torneos_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }
}
