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
use App\Http\Middleware\TestAuthMiddleware;
use App\Http\Middleware\TestMiddleware;
use App\Model\Logic\RequestBean;
use App\Model\Logic\RequestBeanTwo;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;


/**
 * Class TestRouteController
 *
 * @since 2.0
 * @Middleware(TestMiddleware::class)
 * @Controller(prefix="tm")
 */
class TestMiddlewareController
{



    /**
     * 该方法路由地址为 /tm/test
     * @RequestMapping(route="test")
     * @param Request $request
     * @return string
     */
    public function test(Request $request):string
    {

        echo "in controller\n";

        return $request->user;
    }

    /**
     * 该方法路由地址为 /tm/meth
     * @RequestMapping(route="meth", method=RequestMethod::GET)
     * @Middleware(TestAuthMiddleware::class)
     * @param Request $request
     * @return string
     */
    public function meth(Request $request): string
    {
        return "访问成功！";
    }

    


}
