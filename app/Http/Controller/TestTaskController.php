<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Http\Bean\Sandy;
use App\Model\Logic\RequestBean;
use App\Model\Logic\RequestBeanTwo;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;
use Swoft\Task\Task;

/**
 * Class TestTaskController
 *
 * @since 2.0
 *
 * @Controller(prefix="task")
 */
class TestTaskController
{



    /**
     * 该方法路由地址为 /task/deliver
     * @RequestMapping(route="deliver")
     */
    public function deliver()
    {
        $data=[1,2,4];
        return Task::co("SandyTask","co",$data);
    }

    /**
     * 该方法路由地址为 /task/async
     * @RequestMapping(route="async")
     */
    public function async()
    {
        $data=[1,2];
        return Task::async("SandyTask","async",$data);
    }

    


}
