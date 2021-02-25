<?php

namespace app\models;

use Yii;
//listar
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $correo
 * @property int $edad
 * @property string $password
 * @property int $tipo
 * @property string|null $genero
 * @property string $estado
 * @property int|null $suscripcion
 * @property string $avatar
 *
 * @property Comentarios[] $comentarios
 * @property Entradas[] $entradas
 * @property Noticias[] $noticias
 * @property Participantestorneos[] $participantestorneos
 * @property Torneos[] $torneos
 * @property Videos[] $videos
 * 
 * @author Alejandro Lopez - Juan Sanz
 */

class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'edad', 'password', 'avatar'], 'required'],
            [['correo', 'avatar'], 'string'],
            [['edad', 'suscripcion'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['password', 'token'], 'string'],
            [['genero', 'estado'], 'string', 'max' => 1],
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
            'edad' => Yii::t('app', 'Edad'),
            'password' => Yii::t('app', 'Password'),
            'genero' => Yii::t('app', 'Genero'),
            'estado' => Yii::t('app', 'Estado'),
            'suscripcion' => Yii::t('app', 'Suscripcion'),
            'avatar' => Yii::t('app', 'Avatar'),
            'token' => Yii::t('app', 'Token'),

        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Noticias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticias::className(), ['autor_id' => 'id']);
    }

    /**
     * Gets query for [[Participantestorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantestorneos()
    {
        return $this->hasMany(Participantestorneos::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Torneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasMany(Torneos::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Videos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Videos::className(), ['usuarios_id' => 'id']);
    }

    public function getEstado()
    {
        $estado = $this->estado;
        if ($estado == "A") {
            $estado = "Aceptado";
        } elseif ($estado == "P") {
            $estado = "Pendiente";
        } else {
            $estado = "Denegado";
        }

        return $estado;
    }

    public function getTipoUser()
    {
        switch ($this->suscripcion) {
            case '1':
                return "Registrado";
                break;
            case '2':
                return  "Basico";
                break;
            case '3':
                return  "Gamer";
                break;
            case '4':
                return "Empresa";
                break;
            case '5':
                return  "Admin";
                break;
            default:
                return "Invitado";
                break;
        }
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'TipoUser']);
    }

    public static function lookupEstado($condition = '')
    {
        return ArrayHelper::map(
            self::find()->where($condition)->all(),
            'estado',
            'estado'
        );
    }

    public static function lookupSuscripcion($condition = '')
    {
        return ArrayHelper::map(
            self::find()->where($condition)->all(),
            'suscripcion',
            'suscripcion'
        );
    }
}
