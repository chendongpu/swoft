<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/17
 * Time: 21:18
 */

namespace App\Model\Data;

use Swoft\Redis\Redis;

class Repository
{
    protected $ttl = 10;

    protected $model;
    protected $tag;

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @param int $ttl
     */
    public function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }


    public function findById($id)
    {
        return $this->remeber($this->getTag() . ":" . $id, function () use ($id) {
            return $this->getModel()::find($id);
        });
    }

    public function remeber($key,\Closure $entity)
    {
        $value = Redis::get($key);
        if (empty($value)) {
            $value = $entity();
            if (!empty($value)) {
                Redis::set($key, $value, $this->getTtl());
            }
        }
        return $value;
    }

}