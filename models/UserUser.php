<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_user".
 *
 * @property int $user_id
 * @property int $added_user
 *
 * @property Usuarios $user
 * 
 * @author Dan Nedelea
 */
class UserUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'added_user'], 'required'],
            [['user_id', 'added_user'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['added_user'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['added_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'added_user' => Yii::t('app', 'Added User'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'user_id']);
    }

    public function getAddedUser()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'added_user']);
    }

    // public static function primaryKey()
    // {
    //     return 'user_id';
    // }
}
