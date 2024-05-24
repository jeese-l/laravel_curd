<?php

function outPutData($code=200,$msg="",$data=[])
{
    $data = ["data"=>$data,"msg"=>$msg,"code"=>$code];
    echo  json_encode($data);die;
}

function outPutError($msg="请求失败")
{
    return outPutData(400,$msg);
}

function outPutSucc($data,$msg="请求成功")
{
    return outPutData(200,$msg,$data);
}

/**
 * 下划线转驼峰
 * @param $unCamelizedWords
 * @param string $separator
 * @return string
 */
function camelize($unCamelizedWords, $separator='_')
{
    $unCamelizedWords = $separator. str_replace($separator, " ", strtolower($unCamelizedWords));
    return ltrim(str_replace(" ", "", ucwords($unCamelizedWords)), $separator);
}
