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
 * Class TestAnnotationController
 *
 * @since 2.0
 * @\App\Annotation\Mapping\Sandy(name="aaaaa")
 * @Controller(prefix="annotation")
 */
class TestAnnotationController
{



    /**
     * 该方法路由地址为 /annotation/test
     * @RequestMapping(route="test")
     * @\App\Annotation\Mapping\Sandy(name="bbbbb")
     */
    public function test()
    {
        return "Success";
    }

    


}
