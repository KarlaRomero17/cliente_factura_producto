<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cliente}}".
 *
 * @property int $id_cliente
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $fecha_nacimiento
 * @property string $telefono
 * @property string $email
 * @property string $categoria
 *
 * @property Factura[] $facturas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cliente}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'direccion', 'fecha_nacimiento', 'telefono', 'email', 'categoria'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido', 'email', 'categoria'], 'string', 'max' => 300],
            [['direccion'], 'string', 'max' => 500],
            [['telefono'], 'string', 'max' => 9],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Facturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::class, ['id_cliente' => 'id_cliente']);
    }
}
