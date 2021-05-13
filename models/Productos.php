<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

//
use yii\web\UploadedFile;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $nombre
 * @property float $precio
 * @property int $IVA
 * @property string $imagen
 * @property string $descripcion
 * @property int $stock
 * @property int $disponible
 * @property int $estado
 *
 * @property ProductosCategoria $cat
 * @property ProductosFactura[] $productosFacturas
 */
class Productos extends \yii\db\ActiveRecord
{
    //SUBIR IMAGENES
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile){
                $this->imagen=$this->imageFile->baseName . '.' . $this->imageFile->extension;
            }
            // $this->imageFile->saveAs('uploads/' .$this->imagen);
            
            return true;
        } else {
            return false;
        }
    }
    //FIN SUBIR IMAGENES
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'nombre', 'precio', 'descripcion'], 'required'],
            [['cat_id', 'IVA', 'stock', 'disponible', 'estado'], 'integer'],
            [['nombre', 'imagen', 'descripcion'], 'string'],
            [['disponible'], 'default', 'value' => '0'],
            [['estado'], 'default', 'value' => '1'],
            [['precio'], 'number'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductosCategoria::class, 'targetAttribute' => ['cat_id' => 'id']],
        
            //subir foto
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cat_id' => Yii::t('app', 'Categoria'),
            'nombre' => Yii::t('app', 'Nombre'),
            'precio' => Yii::t('app', 'Precio'),
            'IVA' => Yii::t('app', 'Iva'),
            'imagen' => Yii::t('app', 'Imagen'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'stock' => Yii::t('app', 'Stock'),
            'disponible' => Yii::t('app', 'Disponible'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(ProductosCategoria::class, ['id' => 'cat_id']);
    }

    /**
     * Gets query for [[ProductosFacturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosFacturas()
    {
        return $this->hasMany(ProductosFactura::class, ['id_producto' => 'id']);
    }

    public static function Activo($data){
        if($data=='0'){
            return "No";
        }else{
            return "Si";
        }
    }

    public static function Estado($data){
        switch($data){
            case '0':
                return "Normal";
            break;
            case '1':
                return "Nuevo";
            break;
            case '2':
                return "Oferta";
            break;
        }
    }
}
