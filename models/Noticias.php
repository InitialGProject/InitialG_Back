<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "noticias".
 *
 * @property int $id
 * @property int $autor_id
 * @property int $entradas_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $texto
 * @property string $imagen
 * @property string $fecha
 *
 * @property Usuarios $autor
 * @property Entradas $entradas
 * 
 * @author Dan Nedelea
 */

class Noticias extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $imageFile;


    public function upload()
    {
        if ($this->validate()) {
            $this->imagen = $this->imageFile->baseName . '.' . $this->imageFile->extension;
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
        return 'noticias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'entradas_id', 'titulo', 'descripcion', 'texto', 'imageFile'], 'required'],
            [['autor_id', 'entradas_id'], 'integer'],
            [['titulo', 'descripcion', 'texto', 'imagen'], 'string'],
            [['fecha'], 'safe'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autor_id' => 'id']],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],

            //subir foto
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'autor_id' => Yii::t('app', 'Nombre del autor'),
            'entradas_id' => Yii::t('app', 'Entrada del Foro Relacionada'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'texto' => Yii::t('app', 'Texto'),
            'imagen' => Yii::t('app', 'Imagen'),
            'fecha' => Yii::t('app', 'Fecha de Publicacion'),
            'nombreautor' => Yii::t('app', 'Nombre del autor'),
        ];
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'autor_id']);
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }

    public function getEstado()
    {
        $estado = $this->entradas->estado;

        if ($estado == 'A') {
            $estado = 'Aceptado';
        } else {
            $estado = 'Denegado';
        }

        return $estado;
    }

    public function getNombreAutor()
    {
        $mostrado = $this->autor->nombre;
        if ($this->getEstado() == 'Aceptado' && $this->autor->getEstado() == "Aceptado") {
            $mostrado;
        } else {
            $mostrado = "Undefined";
        }
        return $mostrado;
    }

    public function getfechaPublicacion()
    {
        return \Yii::$app->formatter->asDateTime($this->fecha);
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'nombreautor', 'fechaPublicacion']);
    }
}
