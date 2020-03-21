<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use App\Http\Controller\TestPointBeanController;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Http\Message\Request;

/**
 * Class SandyAspect
 * @Aspect()
 * @PointBean(
 *     include={TestPointBeanController::class}
 * )
 * @since 2.0
 */
class SandyAspect
{
    /**
     * 前置通知
     * @param JoinPoint $joinPoint
     * @Before()
     */
    public function before(JoinPoint $joinPoint){
        $map = $joinPoint->getArgsMap();
        print_r($map);
        echo "before\n";
    }


    /**
     * 后置通知
     * @After()
     */
    public function after(){
        echo "after\n";
    }


}
