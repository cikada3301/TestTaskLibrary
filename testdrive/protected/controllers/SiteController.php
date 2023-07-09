<?php

class SiteController extends Controller
{
    public function actions()
    {
        return array(
        );
    }

    public function actionIndex()
    {
        $books = Books::model()->with('authors', 'genres')->findAll();

		$this->render('index', array('books' => $books));
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}