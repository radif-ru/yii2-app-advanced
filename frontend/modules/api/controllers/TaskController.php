<?php


namespace frontend\modules\api\controllers;


use frontend\models\tables\Task;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Task::find()
        ]);

//        return ['asfasf', 'asfsafas'];
    }

    public function actionView($id){
        return Task::findOne($id);
    }
}