<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Producto}}".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property float $precio
 * @property int $stock
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Producto}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'stock'], 'required'],

            [['precio'],'compare' ,'compareValue'=> 600, 'operator' => '>', 'type' => 'float'],
            [['stock'],'compare' ,'compareValue'=> 1000, 'operator' => '>', 'type' => 'number'],
            [['stock'],'compare' ,'compareValue'=> 100000, 'operator' => '<=', 'type' => 'number'],
            [['nombre'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'stock' => 'Stock',
        ];
    }
}
