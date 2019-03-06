<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/2/18
 * Time: 15:34
 */

namespace Pth\Contract;

use http\Env\Request;

interface IResource
{
    /**
     * 获取列表
     * @param Request $request
     * @return mixed
     */
    public function getList(Request $request);

    /**
     * 创建资源
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request);

    /**
     * 获取资源
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * 更新资源
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request);

    /**
     * 删除资源
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}