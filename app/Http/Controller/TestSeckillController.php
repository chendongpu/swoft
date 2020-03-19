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
use App\Model\Entity\SandyGood;
use App\Model\Entity\SandyOrder;
use App\Model\Logic\RequestBean;
use App\Model\Logic\RequestBeanTwo;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Db\DB;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;
use Swoft\Redis\Redis;

/**
 * Class TestSeckillController
 *
 * @since 2.0
 *
 * @Controller(prefix="seckill")
 */
class TestSeckillController
{



    /**
     * 该方法路由地址为 /seckill/good
     * @RequestMapping(route="good")
     */
    public function test()
    {

        /** @var SandyGood $good */
       /* $good = SandyGood::find(1,['id', 'stock']);
        $stock = $good->getStock();
        if ($stock > 0) {
            SandyGood::find(1)->update(['stock'=>$stock-1]);

            $order = SandyOrder::new();
            $order->setGood(1);
            $order->save();
            return "success\n";
        }else{
            return "error\n";
        }*/

        /*$count = Redis::lLen("good");
       if ($count > 0) {
           $goodId = Redis::rPop("good");
           $good = SandyGood::find(1,['id', 'stock']);
           $stock = $good->getStock();

           SandyGood::find(1)->update(['stock'=>$stock-1]);

           $order = SandyOrder::new();
           $order->setGood(1);
           $order->save();
           return "success\n";
       } else {
           return "error\n";
       }*/
        $goodsId = Redis::rPop("good");
        if ($goodsId > 0) {
            $good = SandyGood::find(1,['id', 'stock']);
            $stock = $good->getStock();

            DB::update('UPDATE `sandy_good` SET  stock=stock-1 where id=?', [1]);

            $order = SandyOrder::new();
            $order->setGood(1);
            $order->save();
            return "success\n";
        } else {
            return "error\n";
        }

    }


    /**
     * @RequestMapping(route="start")
     * @return string
     */
    public function start()
    {
        $i = 1;
        for ($i; $i <= 10; $i++) {
            Redis::rPush("good", "1");
        }
        return Redis::lLen("good") . "\n";
    }



//数据库
//USE test
//CREATE TABLE `sandy_order` (
//`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
//`good` INT(10) UNSIGNED NOT NULL COMMENT '库存',
//PRIMARY KEY (`id`)
//) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='订单';
    


}
