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

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use function context;

/**
 * Class TestMiddleware
 *
 * @Bean()
 */
class TestMiddleware implements MiddlewareInterface
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
        echo "before request handle \n";
        $request->user="qqq";
        $response = $handler->handle($request);
        echo "after request handle \n";
        // after request handle

        return $response->withAddedHeader('User-Middleware', 'success');
    }
}
