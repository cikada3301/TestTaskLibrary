<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <link href="/testdrive/protected/vendor/bootstrap-4.6.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div>

    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                array('label' => 'Home', 'url' => array('/site/index')),
                array('label' => 'BookForm', 'url' => array('/book/add'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Login', 'url' => array('/author/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Registration', 'url' => array('/author/registration'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/author/logout'), 'visible' => !Yii::app()->user->isGuest)
            ),
        )); ?>
    </div>
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        )); ?>
    <?php endif ?>

    <?php echo $content; ?>
    <div class="clear"></div>
</div>
</body>
</html>
