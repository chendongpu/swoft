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
use Swoft\Task\Task;

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
        Task::async("SandyTask","async",[1,2]);
        echo "用户进程\n";
    }
}
