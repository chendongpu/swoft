<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/16
 * Time: 11:54
 */

namespace App\Listener;

use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;

/**
 * @Listener("sandy")
 */
class SandyListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event):void
    {
        var_dump('打印传过来的参数! ', $event->getParams());
    }
}