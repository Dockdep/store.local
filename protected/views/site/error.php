<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="watch_block_s_er_404">
	<h2>Error <?php echo $code; ?></h2>
</div>
<div class="watch_block_s_er_404">
	<?php echo CHtml::encode($message); ?>
</div>