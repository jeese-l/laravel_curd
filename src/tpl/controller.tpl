<?php

namespace App\Http\Controllers\<namespace>;

use App\Dao\<path>\<dao>Dao;
use Illuminate\Http\Request;


// Route::get('<controller>List',[\App\Http\Controllers\<path>\<controller>::class,"getList"]);
// Route::get('<controller>Detail',[\App\Http\Controllers\<path>\<controller>::class,"detail"]);
// Route::get('<controller>Insert',[\App\Http\Controllers\<path>\<controller>::class,"save"]);
// Route::get('<controller>Del',[\App\Http\Controllers\<path>\<controller>::class,"del"]);

class <controller> extends Base
{

    //查询
    public function getList(Request $request)
    {
        $input =  $request->all();
        $list =  (new <dao>Dao())->_getList($input);
        outPutSucc($list);
    }

    //详情
    public function detail(Request $request)
    {
        $id = $request->get("id");
        $info = (new <dao>Dao())->_detail($id);
        outPutSucc($info);
    }

    //删除
    public function del(Request $request)
    {
        $id = $request->post("id");
        $info = (new <dao>Dao())->_del($id);
        outPutSucc($info, "操作成功");
    }

    //插入
    public function save(Request $request)
    {
        $data = $request->all();
        $res = (new <dao>Dao())->_save($data);
        outPutSucc($res, "请求成功");
    }


}
