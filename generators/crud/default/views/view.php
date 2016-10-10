<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use insolita\wgadminlte\Box;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
	<div class="col-xs-12">
	<?= "<?php \n" ?>
		Box::begin([
			'title' => '<i class="fa fa-eys"></i> '.Html::encode($this->title),
			'type'  => $model->isNewRecord ? Box::TYPE_SUCCESS : Box::TYPE_PRIMARY,
			// 'solid'=> false,  # solide box-header
			// 'collapse'=> true,
			// 'tooltip' => 'tooltip text',
			// 'footer'  => 'footer',
		]);
	<?= '?>' ?>
    <p>
        <?= "<?= " ?>Html::a(<?= $generator->generateString(Yii::t('app','Update')) ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString(Yii::t('app','Delete')) ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => <?= $generator->generateString(Yii::t('app','Are you sure you want to delete this item?')) ?>,
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "            '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
        ],
    ]) ?>
	<?= '<?php' ?> Box::end();<?= "?>\n" ?><!-- // Box end -->
	</div>
</div>
