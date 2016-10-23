<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $name
 * @property string $bd
 * @property string $blood
 * @property string $cid
 * @property string $ex
 * @property string $sex
 * @property string $addr
 * @property string $tel
 * @property string $social
 * @property integer $status
 * @property string $marry
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bd'], 'safe'],
            [['sex', 'addr'], 'string'],
            [['status'], 'integer'],
            [['name', 'ex', 'tel', 'social', 'marry'], 'string', 'max' => 255],
            [['blood'], 'string', 'max' => 2],
            [['cid'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'bd' => 'Bd',
            'blood' => 'Blood',
            'cid' => 'Cid',
            'ex' => 'Ex',
            'sex' => 'Sex',
            'addr' => 'Addr',
            'tel' => 'Tel',
            'social' => 'Social',
            'status' => 'Status',
            'marry' => 'Marry',
        ];
    }
}
