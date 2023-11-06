<?php


$user['recharge']['cornucopia']['list']['1']['id'] =[
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0
];

$length = count($user['recharge']['cornucopia']['list']['1']['id'])  ?? 0 ;

$lvCount=  13;
if( $lvCount > $length && $length !=0){
    $numberOfZerosToAdd = $lvCount - $length;
    foreach ($user['recharge']['cornucopia']['list'] as $key=>$value){
        for ($i = 0; $i < $numberOfZerosToAdd; $i++) {
            echo '进来了吗'.$key.PHP_EOL;
            $user['recharge']['cornucopia']['list'][$key]['id'][] = 0;
        }
    }
}


print_r($user['recharge']['cornucopia']['list']);
exit;
$lvValue  = 11 *10; //1元等于10点聚宝值 固定 、
$lv = 1; ///聚宝盆等级、默认为1级
$exp = 0;


//print_r($viplvConf);exit;
foreach ($viplvConf as $key=>$value){
    if($lvValue >=$value['exp']){
        echo $value['exp'].PHP_EOL;
        $exp = $lvValue-$value['exp'];
        echo $key.PHP_EOL;
        $lv = $value['level'];
    }
}

echo '当前的等级'.$lv .'剩余的还有多少？'.$exp.PHP_EOL ;
exit;
echo intval('');exit;
function cfgDecode($cfg)
{
    if (strpos($cfg, '&') === false && strpos($cfg, '_') === false) {
        if (strpos($cfg, '{') !== false && strpos($cfg, '}') !== false) {
            return json_decode($cfg, 1);
        } elseif (strpos($cfg, '[') !== false && strpos($cfg, ']') !== false) {
            return json_decode($cfg, 1);
        }
        return $cfg;
    }

    $cfgArr = [];
    $tmp    = explode('&', $cfg);
    if (strpos($cfg, '_') === false) {
        return $tmp;
    } else {
        foreach ($tmp as $_cfgItem) {
            if (empty($_cfgItem)) continue;
            $val = explode('_', $_cfgItem);
            if (sizeof($val) > 2) {
                if (sizeof($val) == 3) {
                    $cfgArr[$val[0]] = [$val[1], $val[2]];
                } else {
                    $cfgArr[$val[0]] = [$val[1], $val[2], $val[3]];
                }
            } else {
                if (!isset($val[1])) {
                    echo "error string :".$cfg.PHP_EOL;
                }
                $cfgArr[$val[0]] = $val[1];
            }
        }
    }

    return $cfgArr;
}
function total_probability($ps, $ratio = 100000)
{
    mt_srand();
    $markV  = 0;
    $vessel = [];
    if (!is_array($ps)) {
        $msg = '==========================='.$ps.'==========================='.PHP_EOL;
        $bt  = debug_backtrace();
        foreach ($bt as $row) {
            if (isset($row['file']) && isset($row['line']) && isset($row['function'])) {
                $msg .= $row['file'] . ':' . $row['line'] . '行,调用方法:' . $row['function'] . '()' . PHP_EOL;
            }
        }
        echo $msg . PHP_EOL;
    }
    foreach ($ps as $key => $value) {
        if ($value <= 0) {
            continue;
        }
        $vessel[$key]['min'] = $markV;

        $markV               += $value * $ratio;
        $vessel[$key]['max'] = $markV;
    }



    $maxNum = $markV - 1;

    $maxNum < 0 && $maxNum = 0;
    $speed = mt_rand(0, $maxNum);



    foreach ($vessel as $key => $range) {
        if ($speed >= $range['min'] && $speed < $range['max']) {
            return $key;
        }
    }
    return false;
}
$moongiftIds = cfgDecode('1_1&2_100&3_100&4_100&5_100&6_100&7_100&8_100&9_100&10_100&11_100&12_100&13_100&14_100&15_100&16_100');//每个格子抽中的权重


for ($i=0;$i<1000;$i++){
    $id = total_probability($moongiftIds);

    if($id == 1){
        echo '出来'.$id.PHP_EOL;

        sleep(5);
    }else{
        echo $id.PHP_EOL;
    }
}



//求$id 为1的可能性有多大？几率为？