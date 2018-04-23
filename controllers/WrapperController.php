<?php

namespace app\controllers;

use app\components\Wrapper;
use yii\web\Controller;
use Yii;

class WrapperController extends Controller
{
    private $limit;
    private $offset;

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->limit = Yii::$app->request->get('limit');
        $this->offset = Yii::$app->request->get('offset');
        return parent::beforeAction($action);
    }

    /**
     * @return string
     */
    public function actionBooks()
    {
        $out = Wrapper::getBooks($this->limit, $this->offset);
        // если ошибка, то json_encode()
        Yii::$app->response->data = $out;
//        or for display in web interface
//        return $this->render('books', ['out' => $out]);
    }

    /**
     * @return string
     */
    public function actionAuthors()
    {
        $out = Wrapper::getAuthors($this->limit, $this->offset);
        Yii::$app->response->data = $out;
//        or for display in web interface
//        return $this->render('authors', ['out' => $out]);
    }

    /**
     * @return string
     */
    public function actionAuthor($authorId)
    {
        $out = Wrapper::getAuthor($this->limit, $this->offset, $authorId);
        Yii::$app->response->data = $out;
//        or for display in web interface
//        return $this->render('author', ['out' => $out]);
    }
}
