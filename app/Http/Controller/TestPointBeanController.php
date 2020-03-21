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

/**
 * Class TestPointBeanController
 *
 * @since 2.0
 *
 * @Controller(prefix="pb")
 */
class TestPointBeanController
{

    /**
     * 该方法路由地址为 /pb/test1/5
     * @RequestMapping(route="test1/{id}")
     * @param int $id
     */
    public function test1(int $id)
    {
        echo "Success1\n";
        return "Success1";
    }


    /**
     * 该方法路由地址为 /pb/test2
     * @RequestMapping(route="test2")
     */
    public function test2()
    {
        echo "Success2\n";
        return "Success2";
    }

    /**
     * 该方法路由地址为 /pb/test3
     * @RequestMapping(route="test3")
     */
    public function test3()
    {
        echo "Success3\n";
        return "Success3";
    }





}
