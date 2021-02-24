<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

////
use yii\base\Model;
use yii\web\UploadedFile;


/**
 * This is the model class for table "juegos".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descipcion
 * @property string|null $imagen
 * @property int $categoria_id
 * @property string $tipo
 * @property string $ruta
 *
 * @property Entradas[] $entradas
 * @property Categorias $categoria
 * 
 * @author Alejandro Lopez
 */

class Juegos extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    
    public function upload()
    {
        if ($this->validate()) {
            $this->imagen=$this->imageFile->baseName . '.' . $this->imageFile->extension;
            // $this->imageFile->saveAs('uploads/' .$this->imagen);
            
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juegos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descipcion', 'imagen', 'ruta', 'creador'], 'string'],
            [['titulo', 'descipcion', 'categoria_id', 'tipo', 'ruta'], 'required'],
            [['categoria_id'], 'integer'],
            [['tipo'], 'string', 'max' => 2],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            
            //subir foto
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }


    //subir imagen///////////////////////////////////////////////////////////
    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    ////////////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descipcion' => Yii::t('app', 'Descipcion'),
            'imagen' => Yii::t('app', 'Imagen'),
            'categoria_id' => Yii::t('app', 'Categoria'),
            'tipo' => Yii::t('app', 'Tipo'),
            'ruta' => Yii::t('app', 'Ruta'),
            'creador' => Yii::t('app', 'Creador'), 
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }

    public static function lookup($condition=''){
        return ArrayHelper::map(
            self::find()->where($condition)->all(),'tipo','tipo');
    }
}
