<?php

namespace app\components;

use Yii;

class Wrapper {
    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public static function getBooks($limit, $offset)
    {
        $data = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $data = http_build_query($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, Yii::$app->params['apiUrl'] . 'books?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);

        return $out;
    }

    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public static function getAuthors($limit, $offset)
    {
        $data = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $data = http_build_query($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, Yii::$app->params['apiUrl'] . 'authors?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);

        return $out;
    }

    /**
     * @param $limit
     * @param $offset
     * @param $authorId
     * @return mixed
     */
    public static function getAuthor($limit, $offset, $authorId)
    {
        $data = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $data = http_build_query($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, Yii::$app->params['apiUrl'] . "authors/{$authorId}/books?" . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);

        return $out;
    }
}