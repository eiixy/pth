<?php
namespace Pth\Search;

use Pth\Contract\ISearch;
use Elasticsearch\ClientBuilder;

abstract class Search implements ISearch
{
    protected $es;  // ElasticSearch 实例
    protected $index = [];  // 默认索引
    protected $field = [];  // 模糊搜索字段

    public function __construct()
    {
        $hosts = config('es.hosts');
        $this->es = ClientBuilder::create()
            ->setHosts([$hosts])
            ->setRetries(2) //设置重试次数
            ->build();
    }

    /**
     * 获取查询数据列表
     * @param $query
     * @param array $filter
     * @param int $page
     * @param int $limit
     * @return Array
     */
    public function search($query, $filter = [], $page = 1, $limit = 10): Array
    {
        $params = $this->getParams($query, $filter, $page, $limit);
        $data = $this->es->search($params);
        return $this->resolve($data);
    }

    /**
     * 获取搜索请求参数
     * @param $query        模糊匹配字段
     * @param $filter       筛选条件
     * @param int $page     页码
     * @param int $limit    页数
     * @return array
     */
    protected function getParams($query,$filter, $page = 1, $limit = 10){
        $params = [
            'index' => $this->index,
            'type' => $this->type,
            "size" => $limit,
            "from" => ($page - 1) * $limit,
            'body' => []
        ];
        $_query = $this->getQuery($query);
        $_filter = $this->getFilter($filter);

        if ($_query || $_filter){
            $params['body'] = [
                'query' => [
                    'bool' => []
                ]
            ];
            if ($_filter){
                $params['body']['query']['bool']['must'] = $_filter;
            }
            if ($_query){
                $params['body']['query']['bool']['should'] = $_query;
            }
        }
        return $params;
    }

    /**
     * 根据$filter的K/V值生成筛选条件
     * @param $filter       匹配条件
     * @return array|null
     */
    protected function getFilter($filter){
        $_filter = null;
        if ($filter && $filter != null && $filter != []){
            $_filter = [];
            foreach ($filter as $key=>$val){
                $_filter[] =  ["match" => [$key=>$val]];
            }
        }
        return $_filter;
    }

    /**
     * 根据$this->field和$query参数生成匹配条件
     * @param $query        
     * @return array|null
     */
    protected function getQuery($query){
        $_query = null;
        if ($query && $query != ''){
            $_query = [];
            foreach ($this->field as $value){
                $_query[] =  ["match" => [$value=>$query]];
            }
        }
        return $_query;
    }

    /**
     * 转换数据
     * @param $data
     * @return array
     */
    protected function resolve($data){
        $count = $data['hits']['total'];
        $data = $data['hits']['hits'];
        $_data = [];
        foreach ($data as $value){
            $item = $value['_source'];
            $item['_type'] = $value['_type'];
            $item['_index'] = $value['_index'];
            $item['_score'] = $value['_score'];
            if (isset($value['highlight'])) {
                $item['_highlight'] = $value['highlight'];
            }
            $_data[] = $item;
        }
        return ['data'=>$_data,'count'=>$count];
    }
}