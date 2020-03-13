<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/13
 * Time: 8:35
 */

namespace App\Http\Controller\MyController;


use Swoft;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;
/**
 * Class MyController
 * @Controller()
 */
class MyController
{
    /**
     * @RequestMapping("/my")
     *
     * @return Response
     */
    public function my(): Response
    {
        return context()->getResponse()->withContent('my');
    }
}