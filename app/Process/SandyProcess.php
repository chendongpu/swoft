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
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Db\Exception\DbException;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;
use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoole\Coroutine;

/**
 * Class SandyProcess
 *
 * @since 2.0
 *
 * @Bean()
 */
class SandyProcess extends UserProcess
{


    /**
     * @param Process $process
     */
    public function run(Process $process): void
    {

        $res = Redis::lpop('message');

        if($res){
           // echo $res."\n";

            Task::async("SandyTask","redis",[$res]);
        }
        Coroutine::sleep(1);

    }
}
