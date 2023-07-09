<?php

class BookForm extends CFormModel
{
    public $name;
    public $genres;
    public $description;
    public $file;

    public function rules()
    {
        return array(
            array('file', 'file', 'allowEmpty' => true),
            array('name, description, genres', 'required'),
            array('name, description', 'length', 'max' => 255),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Name',
            'description' => 'Description',
            'genres' => 'Genres',
            'file' => 'Zip File',
        );
    }
}