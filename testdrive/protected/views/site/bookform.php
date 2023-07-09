<?php
$this->pageTitle = Yii::app()->name . ' - BookForm';
$this->breadcrumbs = array(
    'BookForm',
);
?>

<h1>Book Form</h1>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'bookform',
        'enableClientValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div>
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description'); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'genres'); ?>
        <?php echo $form->listBox($model, 'genres', CHtml::listData(Genres::model()->findAll(), 'id', 'name'), array('multiple' => true)); ?>
        <?php echo $form->error($model, 'genres'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'file'); ?>
        <?php echo $form->fileField($model, 'file'); ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
