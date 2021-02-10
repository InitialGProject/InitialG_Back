<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administradores".
 *
 * @property int $id
 * @property string $nombre
 * @property string $correo
 * @property string|null $password
 * @property int $tipo
 * @property string $estado
 * @property int|null $suscripcion
 * @property string $avatar
 * @property string|null $token
 */
class Administradores extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    //Añadimos implements...

    public static function findByUsername($username)
    {
        return static::findOne(['nombre' => $username]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    // Comprueba que el password que se le pasa es correcto
    public function validatePassword($password)
    {
        return $this->password === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administradores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo', 'suscripcion'], 'integer'],
            [['nombre', 'correo', 'tipo', 'avatar'], 'required'],
            [['correo', 'avatar'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['password', 'token'], 'string', 'max' => 500],
            [['estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'password' => Yii::t('app', 'Password'),
            'tipo' => Yii::t('app', 'Tipo'),
            'estado' => Yii::t('app', 'Estado'),
            'suscripcion' => Yii::t('app', 'Suscripcion'),
            'avatar' => Yii::t('app', 'Avatar'),
            'token' => Yii::t('app', 'Token'),
        ];
    }
}
