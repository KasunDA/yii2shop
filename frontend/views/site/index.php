<?php
use yii\bootstrap\Carousel;
use yii\widgets\ListView;
use common\models\Slide;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Home');

$slides = [];
foreach (Slide::find()->orderBy('sortOrder')->all() as $slide) {
    /** @var $slide common\models\Slide */
    $slides[] = [
        'content' => \yii\helpers\Html::img(Yii::$app->urlManager->baseUrl . '/uploads/slide/' . $slide->id . '.jpg'),
        'caption' => \yii\helpers\Html::tag('h1', $slide->title) . $slide->body,
    ];
}
?>

<?= Carousel::widget([
    'id' => 'home-slider',
    'controls' => [
        '<span class="icon-prev"></span>',
        '<span class="icon-next"></span>'
    ],
    'items' => $slides,
    'options' => [
        'class' => 'slide',
    ]
]) ?>

<div class="container">

    <h1 class="page-header text-center">
        <?= Yii::t('frontend', 'Last products') ?>
    </h1>

    <?= ListView::widget([
        'layout' => "<div class=\"row\">{items}</div>",
        'dataProvider' => $dataProvider,
        'itemView' => '/catalog/_product',
        'viewParams' => [
            'class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
        ],
        'summaryOptions' => [
            'class' => 'alert alert-info'
        ],
    ]) ?>

</div>
