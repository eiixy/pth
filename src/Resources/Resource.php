<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/2/18
 * Time: 15:29
 */

namespace Pth\Resource;


use Pth\Contract\IResource;
use http\Env\Request;
abstract class Resource implements IResource
{
    protected $model;

    abstract protected function setModel();

    public function __construct()
    {
        $this->model = $this->setModel();
    }

    public function getList(Request $request)
    {
        $data = GetList::getList($this->model,$request);

    }

    public function create(Request $request)
    {

        // TODO: Implement create() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }


    protected function returnJson(){

    }

}