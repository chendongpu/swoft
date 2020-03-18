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
 * Class MemberAuthMiddleware
 *
 * @Bean()
 */
class MemberAuthMiddleware implements MiddlewareInterface
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
        $token = $request->getHeaderLine("token");
        $key=\config('jwt.key');
        try {

            JWT::$leeway = 60; // $leeway in seconds
            $auth= JWT::decode($token, $key, array('HS256'));
            $request->member = $auth->member;
        } catch (\Exception $e) {
            return context()->getResponse()->withData(['code'=>101,'msg'=>'授权失败']);
        }

        $response = $handler->handle($request);
        // after request handle
        return $response;
    }
}
