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
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class TestRequestController
 *
 * @since 2.0
 *
 * @Controller(prefix="test")
 */
class TestRequestController
{



    /**
     * 该方法路由地址为 /test/request
     * @RequestMapping(route="request",method={RequestMethod::GET,RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return array|mixed|string
     */
    public function request(Request $request,Response $response)
    {
//        return $request->query('name');//获取GET参数
//        return $request->post('name');//获取POST参数
//        return $request->input('name');//获取GET或者POST参数
//        return $request->header();//获取请求头信息
//        return $request->server('remote_addr');//获取请求客户端的ip地址
//        return $response->redirect("http://www.baidu.com");//重定向
//        return ["name"=>"sandy","sex"=>"女"];//响应内容格式为json
        return $response->withAddedHeader("sandy","my name is sandy");//向响应头中加入属性值

    }

    


}
