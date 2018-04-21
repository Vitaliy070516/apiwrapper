<?php

namespace app\controllers;

use app\components\Wrapper;
use yii\web\Controller;
use Yii;

class WrapperController extends Controller
{
    /**
     * @return string
     */
    public function actionBooks()
    {
        $limit = Yii::$app->request->get('limit');
        $offset = Yii::$app->request->get('offset');
        $out = Wrapper::getBooks($limit, $offset);
        return $this->render('books', ['out' => $out]);
    }

    /**
     * @return string
     */
    public function actionAuthors()
    {
        $limit = Yii::$app->request->get('limit');
        $offset = Yii::$app->request->get('offset');
        $out = Wrapper::getAuthors($limit, $offset);
        return $this->render('authors', ['out' => $out]);
    }

    /**
     * @return string
     */
    public function actionAuthor($authorId)
    {
        $limit = Yii::$app->request->get('limit');
        $offset = Yii::$app->request->get('offset');
        $out = Wrapper::getAuthor($limit, $offset, $authorId);
        return $this->render('author', ['out' => $out]);
    }
}
