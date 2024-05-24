<?php

namespace laravelCurd\make\impl;

use laravelCurd\make\IAutoMake;
class DaoAutoMake implements IAutoMake
{
    public function check($table, $path)
    {
        !defined('DS') && define('DS', DIRECTORY_SEPARATOR);
        $daoName = ucfirst($table);
        $dirPath = app_path() . DS . "Dao" . DS . $path ;
        $controllerFilePath = $dirPath . DS . $daoName . ".php";

        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        if (file_exists($controllerFilePath)) {
            outPutError($daoName . ".php文件已存在");
            exit;
        }
    }
    public function make($table, $path, $other)
    {
        $daoTpl = dirname(dirname(__DIR__)) . '/tpl/dao.tpl';
        $daoTplContent = file_get_contents($daoTpl);

        $daoName = ucfirst(camelize($table));
        $modelName = ucfirst(camelize($table));

        $dirPath = app_path() . DS . "Dao" . DS . $path ;
        $daoFilePath = $dirPath . DS . $daoName . 'Dao.php';

        $daoTplContent = str_replace('<namespace>', $path, $daoTplContent);
        $daoTplContent = str_replace('<table>', $daoName, $daoTplContent);
        $daoTplContent = str_replace('<model>', $modelName, $daoTplContent);
        $daoTplContent = str_replace('<path>', $path, $daoTplContent);
        $daoTplContent = str_replace('<dao>', $daoName, $daoTplContent);

        file_put_contents($daoFilePath, $daoTplContent);

        $baseDaoPath = app_path() . DS . "Dao"  . DS . "BaseDao.php";
        // 检测base是否存在
        if (!file_exists($baseDaoPath)) {
            $baseDaoTpl = dirname(dirname(__DIR__)) . '/tpl/baseDao.tpl';
            $tplContent = file_get_contents($baseDaoTpl);
            $tplContent = str_replace('<namespace>', $path, $tplContent);
            file_put_contents($baseDaoPath, $tplContent);
        }

    }
}