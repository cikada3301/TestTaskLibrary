<?php

class BooksAuthors extends CActiveRecord
{
	public function tableName()
	{
		return 'books_authors';
	}

	public function rules()
	{
		return array(
			array('author_id, book_id', 'required'),
			array('author_id, book_id', 'numerical', 'integerOnly'=>true),
			array('author_id, book_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'author_id' => 'Author',
			'book_id' => 'Book',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('book_id',$this->book_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
