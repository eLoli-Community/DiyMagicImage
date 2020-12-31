<?php
/** @var \App\GD\DMI $dmi */
if(isset($dmi->input->nv)){
    $dmi->main = $dmi->Image->fromFile('Non-VanillaServer.png');
    $dmi->main->attachImage(
        $dmi->Image->fromFile('NV子模块.png'),
        $dmi->Point(0,0),
        $dmi->Point(780,320)
    );
}else{
    $dmi->main = $dmi->Image->fromFile('VanillaServer.png');
    $dmi->main->attachImage(
        $dmi->Image->fromFile('V子模块.png'),
        $dmi->Point(0,0),
        $dmi->Point(780,320)
    );
}
$dmi->main->drawText(
    '标题',
    $dmi->Point(60,120),
    48,
    $dmi->Font('PingFang.ttf'),
    $dmi->Color(0,0,0),
    0
);
$dmi->main->drawText(
    '服务器评级于 ',
    $dmi->Point(60,190),
    16,
    $dmi->Font('PingFang.ttf'),
    $dmi->Color(0,0,0),
    0
);
$dmi->main->drawText(
    'AbAb',
    $dmi->Point(0,150),
    48,
    $dmi->Font('MyriadPro-It.otf'),
    $dmi->Color(0,255,0),
    0
);
