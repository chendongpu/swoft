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
     * 该方法路由地址为 /rabbitmq/push
     * @RequestMapping(route="push")
     */
    public function push()
    {
        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
      $channel = $connection->channel();
      $channel->queue_declare("sandy",false,false,false,false);
      $msg = new AMQPMessage("Sandy:".time());
      $channel->basic_publish($msg,'',"sandy");
      $channel->close();
      $connection->close();
      return "Success";

    }

    


}
