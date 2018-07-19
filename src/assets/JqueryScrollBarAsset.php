<?php
namespace onix\assets;

use yii\web\AssetBundle as YiiAssetBundle;

class JqueryScrollBarAsset extends YiiAssetBundle
{
    public $sourcePath = '@bower/jquery.scrollbar';

    public $css = [
        'jquery.scrollbar.css',
    ];

    public $js = [
        'jquery.scrollbar.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            if (is_dir($from)) {
                return true;
            } else {
                $ext = pathinfo($from, PATHINFO_EXTENSION);
                return $ext == "js" || $ext == "css";
            }
        };
    }
}
