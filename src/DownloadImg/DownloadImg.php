<?php

namespace Qs\ListRightButton\DownloadImg;

use Qs\ListRightButton\DownloadImgButtonBuilder;
use Qscmf\Builder\ListRightButton\ListRightButton;

class DownloadImg extends ListRightButton
{
    protected $title = '下载图片';

    public function build(array &$option, array $data, $listBuilder)
    {
        $my_attribute['type'] = 'download_img';
        $my_attribute['title'] = '下载图片';
        $my_attribute['class'] = 'success';

        $builder = $data[$option['options']] instanceof DownloadImgButtonBuilder ?
            $data[$option['options']] : $this->defaultBuilder();

        $gid = $builder->getGid();

        $option['attribute'] = (array)$option['attribute'];
        $option['attribute'] = $listBuilder->mergeAttr($my_attribute, $option['attribute']);
        $option['attribute']['id'] = $gid;

        \Bootstrap\RegisterContainer::registerBodyHtml((string)$builder);
        return '';
    }

    protected function defaultBuilder(){
        $builder = new DownloadImgButtonBuilder("下载图片", '', microtime(true));

        return $builder;
    }

}