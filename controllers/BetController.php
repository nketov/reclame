<?php

namespace app\controllers;


use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\filters\VerbFilter;
use linslin\yii2\curl;


/**
 * DateController implements the CRUD actions for Date model.
 */
class BetController extends Controller

{


    /**
     * @inheritdoc
     */
    public
    function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'confirm' => ['GET'],
                    'get-direct' => ['GET'],

                ],
            ],
        ];
    }

    /**
     * Lists all Date models.
     * @return mixed
     */
    public function actionIndex()

    {

        $client = new Client(['baseUrl' => 'https://api.direct.yandex.com/json/v5/campaigns', 'requestConfig' => [
            'format' => Client::FORMAT_JSON
        ]]);

        $request = $client->createRequest()
            ->setHeaders(['Accept-Language' => 'ru'])
            ->addHeaders(['content-type' => 'application/json; charset=utf-8'])
            ->addHeaders(['Authorization' => 'Bearer AQAAAAAT8YTVAAP95Qg9u07pFU-Arhq94r93oik'])
            ->addHeaders(['Client-Login' => 'elama-15968051@yandex.ru'])
            ->setData(['method' => 'get',
                'params' => [
                    'SelectionCriteria' => [
                        'States' => ['ON']
                    ],
                    'FieldNames' => [
                        0 => 'Id',
                        1 => 'Name',
                        2 => 'Status',
                    ]
                ]


            ]);


        $response = json_decode($request->send()->content, true);


        return $this->render('index', ['res' => $response['result']['Campaigns'], 'rec' => $request]);
    }




    public function actionCampaign($id)
    {

        $client = new Client(['baseUrl' => 'https://api.direct.yandex.com/json/v5/adgroups', 'requestConfig' => [
            'format' => Client::FORMAT_JSON
        ]]);


        $request = $client->createRequest()
            ->setHeaders(['Accept-Language' => 'ru'])
            ->addHeaders(['content-type' => 'application/json; charset=utf-8'])
            ->addHeaders(['Authorization' => 'Bearer AQAAAAAT8YTVAAP95Qg9u07pFU-Arhq94r93oik'])
            ->addHeaders(['Client-Login' => 'elama-15968051@yandex.ru'])
            ->setData(['method' => 'get',
                'params' => [
                    'SelectionCriteria' => [
                        'CampaignIds' => [$id]
                    ],
                    'FieldNames' => [
                        0 => 'CampaignId',
                        1 => 'Id',
                        2 => 'Name',
                        3 => 'ServingStatus',


                    ]
                ]


            ]);


        $response = json_decode($request->send()->content, true);


        return $this->render('campaign', ['chId'=>$id, 'res' => $response['result']['AdGroups']]);


    }


 public function actionGroup($chId,$id)
    {


        $client = new Client(['baseUrl' => 'https://api.direct.yandex.com/json/v5/keywords', 'requestConfig' => [
            'format' => Client::FORMAT_JSON
        ]]);


        $request = $client->createRequest()
            ->setHeaders(['Accept-Language' => 'ru'])
            ->addHeaders(['content-type' => 'application/json; charset=utf-8'])
            ->addHeaders(['Authorization' => 'Bearer AQAAAAAT8YTVAAP95Qg9u07pFU-Arhq94r93oik'])
            ->addHeaders(['Client-Login' => 'elama-15968051@yandex.ru'])
            ->setData(['method' => 'get',
                'params' => [
                    'SelectionCriteria' => [
                        'AdGroupIds' => [$id],
                          'States' => ['ON']
                    ],
                    'FieldNames' => [
                        0 => 'Id',
                        1 => 'Keyword',
                        2 => 'Bid',
                        3 => 'Productivity',
                        4 => 'StatisticsSearch',

                    ]
                ]


            ]);


        $response = json_decode($request->send()->content, true);

for( $i=0; $i < sizeof($response['result']['Keywords']);$i++ )
{
    $response['result']['Keywords'][$i]['Bids'] = self::getBids($response['result']['Keywords'][$i]['Id']);

}




        return $this->render('group', ['chId'=>$chId,'groupId'=>$id,'res'=>$response['result']['Keywords']]);


    }



    private static function getBids($kwId)
    {
        $client = new Client(['baseUrl' => 'https://api.direct.yandex.com/json/v5/bids', 'requestConfig' => [
            'format' => Client::FORMAT_JSON
        ]]);

        $request = $client->createRequest()
            ->setHeaders(['Accept-Language' => 'ru'])
            ->addHeaders(['content-type' => 'application/json; charset=utf-8'])
            ->addHeaders(['Authorization' => 'Bearer AQAAAAAT8YTVAAP95Qg9u07pFU-Arhq94r93oik'])
            ->addHeaders(['Client-Login' => 'elama-15968051@yandex.ru'])
            ->setData(['method' => 'get',
                'params' => [
                    'SelectionCriteria' => [
                        'KeywordIds' => [$kwId],
                    ],
                    'FieldNames' => [
                        0 => 'AuctionBids',
                        1 => 'CurrentSearchPrice',
                    ]
                ]

            ]);

        $response = json_decode($request->send()->content, true);

        return $response['result']['Bids'][0];



    }





}


   