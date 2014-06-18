<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php $data = CHtml::listData($model->getCategoryOptions(),'id','text'); ?>
        <?php echo CHtml::activeDropDownList($model,'cate',$data); ?>

<!--		--><?php //echo $form->labelEx($model,'cate'); ?>
<!--		--><?php //echo $form->textField($model,'cate',array('size'=>11,'maxlength'=>11)); ?>
<!--		--><?php //echo $form->error($model,'cate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sapo'); ?>
		<?php echo $form->textField($model,'sapo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sapo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'youtube_key'); ?>
		<?php echo $form->textField($model,'youtube_key',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'youtube_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumb'); ?>
		<?php echo $form->textField($model,'thumb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'thumb'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->