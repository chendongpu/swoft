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
use App\Model\Logic\RequestBean;
use App\Model\Logic\RequestBeanTwo;
use Firebase\JWT\JWT;
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
 * Class TestJwtController
 *
 * @since 2.0
 *
 * @Controller(prefix="jwt")
 */
class TestJwtController
{



    /**
     * 该方法路由地址为 /jwt/test
     * @RequestMapping(route="test")
     */
    public function test()
    {

        $key=\config('jwt.key');
        $exp=\config('jwt.exp');

        $tokenParam=[
            "userId"=>1,
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            'iat'=>time(),
            'nbf'=>time(),
            'exp'=>time()+$exp
        ];
        $token = JWT::encode($tokenParam, $key);
        return $token;
    }



    /**
     * 该方法路由地址为 /jwt/check
     * @Middleware(TestAuthMiddleware::class,method=RequestMethod::POST)
     * @RequestMapping(route="check")
     * @param Request $request
     * @return array
     */
    public function get_message(Request $request):array {
        return  $request->userInfo;
    }


    


}
