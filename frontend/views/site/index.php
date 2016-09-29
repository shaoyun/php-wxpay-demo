<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$insert_options = [
    'position' => $this::POS_END,
    'depends' => [
        \yii\web\JqueryAsset::className(),
        \yii\web\YiiAsset::className(),
        \yii\bootstrap\BootstrapPluginAsset::className()
    ]
];
$link = Yii::$app->urlManager->hostInfo;
$jsContent = <<<EOF
var baseShareData = {
    title: 'SDP Test', // 分享标题
    link: '$link', // 分享链接
    imgUrl: '', // 分享图标
};
var jsConfig = $jsConfig;
var payConfig = $payConfig;
var shareDataWithDesc = $.extend( baseShareData, { desc: '' });
wx.config(jsConfig);
wx.ready(function () {
    //分享到朋友圈
    wx.onMenuShareTimeline(baseShareData);
    //分享给朋友
    wx.onMenuShareAppMessage(shareDataWithDesc);
    //分享到QQ
    wx.onMenuShareQQ(shareDataWithDesc);
    //分享到QQ空间
    wx.onMenuShareQZone(shareDataWithDesc);
    //分享到腾讯微博
    wx.onMenuShareWeibo(shareDataWithDesc);
});
wx.chooseWXPay({
     timestamp:  payConfig['timestamp'],
     nonceStr:   payConfig['nonceStr'],
     package:    payConfig['package'],
     signType:   payConfig['signType'],
     paySign:    payConfig['paySign'],
     success: function (res) {
         // 支付成功后的回调函数
         console.log(res);
     }
});
EOF;
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js", $insert_options);
$this->registerJs($jsContent, $this::POS_END);
//$this->registerJsFile("@web/assets/wxpay.js", $insert_options);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
