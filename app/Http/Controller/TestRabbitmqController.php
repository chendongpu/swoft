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
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;

/**
 * Class TestRabbitmqController
 *
 * @since 2.0
 *
 * @Controller(prefix="rabbitmq")
 */
class TestRabbitmqController
{



    /**
     * 该方法路由地址为 /rabbitmq/push/5
     * @RequestMapping(route="push/{id}")
     */
    public function push(int $id)
    {
/*      $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
      $channel = $connection->channel();
      $channel->queue_declare("sandy",false,false,false,false);
      $msg = new AMQPMessage("Sandy:".time());
      $channel->basic_publish($msg,'',"sandy");
      $channel->close();
      $connection->close();*/


/*        $table = new AMQPTable();
        $table->set("x-message-ttl",5000);
        $table->set("x-dead-letter-exchange","delay.5s.topic");

        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();
        $channel->queue_declare("delay.5s.sandy",false,true,false,false,false,$table);
        $msg = new AMQPMessage("Sandy:".time());
        $channel->basic_publish($msg,'',"delay.5s.sandy");
        $channel->close();
        $connection->close();*/

        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();

        // 创建交换机
        $exchange = "delay.sandy.topic";
        $channel->exchange_declare($exchange,"fanout",false,true,false);
        $channel->queue_bind("sandy",$exchange);

        // 创建队列
        $num = $id;
        $queue = "delay.{$num}s.topic";
        $table = new AMQPTable();
        $table->set("x-message-ttl",intval($num.'000'));
        $table->set("x-dead-letter-exchange",$exchange);

        $channel->queue_declare($queue,false,true,false,false,false,$table);
        $msg = new AMQPMessage("Sandy:".time());
        $channel->basic_publish($msg,'',$queue);
        $channel->close();
        $connection->close();

      return "Success";

    }

    


}
