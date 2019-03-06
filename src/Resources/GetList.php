<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/2/18
 * Time: 15:33
 */

namespace Pth\Resource;

use \Illuminate\Http\Request;

class GetList
{
    static public function getList(Request $request){
        try {
            $page = $request->input('page', 1);
            $limit = $request->input('limit', 10);
            $orderBy = explode(',', $request->input('orderBy', 'id,desc'));
            $search = $request->input('search', false);
            $where = $request->input('where', false);

            if ($request->isMethod('get')) {
                $search = $search ? json_decode($search, true) : false;
                $where = $where ? json_decode($where, true) : false;
            }
            if ($where) {
                $where = array_filter($where, function ($var) {
                    return $var !== '' || $var !== null;
                });
                foreach ($where as $k => $v) {
                    if (is_array($v)) {
                        $model = $this->model->whereIn($k, $v);
                        unset($where[$k]);
                    }
                }
                if (count($where) > 0) {
                    $model = $model->where($where);
                }
            }

            if ($search && $search['value'] !== '' && $search['value'] !== null) {
                $model = $model->where($search['field'], 'like', '%' . $search['value'] . '%');
            }
            $count = $model->count();
            $data = $model->skip(($page - 1) * $limit)->take($limit)->orderBy($orderBy[0], $orderBy[1])->get();
            return $data;
        } catch (\Exception $exception) {
            return $exception;
        }
    }

}