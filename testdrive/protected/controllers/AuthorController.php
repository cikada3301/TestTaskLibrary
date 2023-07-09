<?php

include ('\IWL\LibraryTask\testdrive\protected\models\forms\LoginForm.php');

class AuthorController extends Controller
{
    private $authorRepository;

    public function actionRegistration()
    {
        $model = new Authors;
        $this->authorRepository = Yii::app()->authorRepository;

        if (isset($_POST['Authors'])) {
            $model->attributes = $_POST['Authors'];

            if ($this->authorRepository->save($model)) {
                Yii::app()->user->setFlash('success', 'Registration successful');
                $this->redirect(array('site/index'));
            }
        }

        $this->render('/site/registration', array(
            'model' => $model,
        ));
    }

    public function actionLogin()
    {
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->render('/site/login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}