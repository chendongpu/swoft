<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use phpDocumentor\Reflection\Types\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use function context;

/**
 * Class TestAuthMiddleware
 *
 * @Bean()
 */
class TestAuthMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface|Request $request
     * @param RequestHandlerInterface        $handler
     *
     * @return ResponseInterface
     * @inheritdoc
     * @throws SwoftException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // before request handle


        $header = $request->getHeaders();

        var_dump($header) ;

        $jwt = $header["token"][0];

        echo "======token=====".$jwt."==========";

        $key=\config('jwt.key');
        $userInfo=[];
        try {

            JWT::$leeway = 60; // $leeway in seconds

            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $userInfo         = (array) $decoded;

        } catch (\Exception $e) {
            return context()->getResponse()->withData(["msg"=> "授权出错"]);
        }

        $request->userInfo=$userInfo;

        $response = $handler->handle($request);

        // after request handle

        return $response->withAddedHeader('User-Middleware', 'success');
    }
}
