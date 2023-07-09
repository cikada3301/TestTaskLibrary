<?php

namespace models\dal;

use Books;
use Yii;

class BookRepository extends \CApplicationComponent
{
    public function findByName($name) {
        return Books::model()->find(array('condition' => 'name LIKE :name', 'params' => array(':name' => '%' . $name . '%')));
    }

    public function save(\Books $model) {
        return $model->save();
    }
}