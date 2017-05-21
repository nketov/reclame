<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Группа № ' . $groupId;
$this->params['breadcrumbs'][] = ['label' => 'Ставки', 'url' => Url::toRoute('bet/index')];
$this->params['breadcrumbs'][] = ['label' => 'Компания № ' . $chId, 'url' => Url::toRoute(['bet/campaign', 'id' => $chId])];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php d($res) ?>
<h1><?= Html::encode($this->title . ', список ключевых фраз:') ?></h1>

<div class="row">
    <div class="date-index col-lg-12">


        <table class="table bets-table">
            <thead>
            <tr>
                <th class="header">Ключевая фраза</th>
                <th class="header">Продуктивность</th>
                <th class="header">Показы</th>
                <th class="header">Клики</th>
                <th class="header">CTR</th>
                <th class="header">Позиция</th>
                <th class="header">Цена клика на странице</th>
                <th class="header">Списываемая цена</th>
                <th class="header">Макс. цена клика</th>
                <th class="header">Цена клика на поиске</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($res as $kword) {

                $mpos = mb_strpos($kword['Keyword'], '-');

                if ($mpos !== false) {
                    $kword['Keyword'] = mb_substr($kword['Keyword'], 0, $mpos);
                }
                $CTR = $kword['StatisticsSearch']['Impressions'] ? $kword['StatisticsSearch']['Clicks'] / $kword['StatisticsSearch']['Impressions'] * 100 : 0;
                $bid = $kword['Bid'] / 1000000;
                $sprice = $kword['Bids']['CurrentSearchPrice'] / 1000000;

                ?>
                <tr>
                    <td class="date" rowspan="5"><?php echo $kword['Keyword'] ?></td>
                    <td class="total" rowspan="5"><?php echo $kword['Productivity']['Value'] ?></td>
                    <td class="total" rowspan="5"><?php echo $kword['StatisticsSearch']['Impressions'] ?></td>
                    <td class="total" rowspan="5"><?php echo $kword['StatisticsSearch']['Clicks'] ?></td>
                    <td class="total" rowspan="5"><?php echo round($CTR, 2) ?></td>
                    <td class="total">цена 1-го спецразмещения</td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][0]['Bid'] / 1000000, 2) ?></td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][0]['Price'] / 1000000, 2) ?></td>
                    <td class="total" rowspan="5"><?php echo round($bid, 2) ?></td>
                    <td class="total" rowspan="5"><?php echo round($sprice, 2) ?></td>
                </tr>
                <tr>
                    <td class="total">цена 2-го спецразмещения</td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][1]['Bid'] / 1000000, 2) ?></td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][1]['Price'] / 1000000, 2) ?></td>
                </tr>
                <tr>
                    <td class="total">вход в спецразмещение</td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][2]['Bid'] / 1000000, 2) ?></td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][2]['Price'] / 1000000, 2) ?></td>
                </tr>

                <tr>
                    <td class="total">цена 1-го места</td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][3]['Bid'] / 1000000, 2) ?></td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][3]['Price'] / 1000000, 2) ?></td>
                </tr>

                <tr>
                    <td class="total">вход в гарантию</td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][6]['Bid'] / 1000000, 2) ?></td>
                    <td class="total"><?php echo round($kword['Bids']['AuctionBids'][6]['Price'] / 1000000, 2) ?></td>
                </tr>

            <?php } ?>


            </tbody>
        </table>
    </div>
</div>





   