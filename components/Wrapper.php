<?php

namespace app\components;

use Yii;
use yii\httpclient\Client;

class Wrapper {
    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public static function getBooks($limit, $offset)
    {
        $out = '';
        $url = Yii::$app->params['apiUrl'] . 'books';
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->setData([
                'limit' => $limit,
                'offset' => $offset,
            ])
            ->send();
        if ($response->isOk) {
            $out = $response->data;
        }
        return $out;
    }

    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public static function getAuthors($limit, $offset)
    {
        $out = '';
        $url = Yii::$app->params['apiUrl'] . 'authors';
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->setData([
                'limit' => $limit,
                'offset' => $offset,
            ])
            ->send();
        if ($response->isOk) {
            $out = $response->data;
        }
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
        //$data = [
        //    'limit' => $limit,
        //   'offset' => $offset,
        //];
        //$data = http_build_query($data);

        //$out = '';
        //if ($curl = curl_init()) {
        //    curl_setopt($curl, CURLOPT_URL, Yii::$app->params['apiUrl'] . "authors/{$authorId}/books?" . $data);
        //    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //    $out = curl_exec($curl);
        //    curl_close($curl);
        //}
        //return $out;
        
        $out = '';
        $url = Yii::$app->params['apiUrl'] . "authors/{$authorId}/books";
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->setData([
                'limit' => $limit,
                'offset' => $offset,
            ])
            ->send();
        if ($response->isOk) {
            $out = $response->data;
        }
        return $out;
    }
}
