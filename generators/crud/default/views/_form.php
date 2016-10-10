<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use insolita\wgadminlte\Box;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
	<div class="col-xs-12">
	<?= "<?php \n" ?>
		Box::begin([
			'title' => '<i class="fa fa-edit"></i> '.Html::encode($this->title),
			'type'  => $model->isNewRecord ? Box::TYPE_SUCCESS : Box::TYPE_PRIMARY,
			// 'solid'=> false,  # solide box-header
			// 'collapse'=> true,
			// 'tooltip' => 'tooltip text',
			// 'footer'  => 'footer',
		]);
	<?= '?>' ?>


    <?= "<?php " ?>$form = ActiveForm::begin([
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
				'horizontalCssClasses' => [
					'label' => 'col-sm-2',
					// 'offset' => 'col-sm-offset-4',
					'wrapper' => 'col-sm-6',
					'error' => '',
					'hint' => '',
				]
			],
		]); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString(Yii::t('app','Create')) ?> : <?= $generator->generateString(Yii::t('app','Update')) ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>
	<?= '<?php' ?> Box::end();<?= "?>\n" ?>
	</div>
</div>
