<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Process;

use App\Http\Bean\Sandy;
use App\Model\Logic\MonitorLogic;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Db\Exception\DbException;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;
use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoole\Coroutine;

/**
 * Class RabbitMqProcess
 *
 * @since 2.0
 *
 * @Bean()
 */
class RabbitMqProcess extends UserProcess
{

    /**
     * @param Process $process
     */
    public function run(Process $process): void
    {
        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();
        $channel->queue_declare("sandy",false,false,false,false);
        $callback = function($msg) use ($channel){
            $channel->queue_delete($msg->delivery_info["routing_key"]);
            echo "接收时间:".time()."接收到数据：".$msg->body."\n";
        };

        $channel->basic_consume("sandy","",false,true,false,false,$callback);
        while(count($channel->callbacks)){
            $channel->wait();
        }
        $channel->close();
        $connection->close();

        Coroutine::sleep(1);

    }
}
