<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Accessevent]].
 *
 * @see Accessevent
 */
class AccesseventQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Accessevent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Accessevent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
