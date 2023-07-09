<?php
/* @var $this AuthorController */
/* @var $model Authors */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Registration';
$this->breadcrumbs=array(
    'Registration',
);
?>

<h1>Registration</h1>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div>
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Registration'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->