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
use Swoft\Task\Task;

/**
 * Class TestSmsController
 *
 * @since 2.0
 *
 * @Controller(prefix="sms")
 */
class TestSmsController
{



    /**
     * 该方法路由地址为 /tr/send
     * @RequestMapping(route="send")
     */
    public function send()
    {
        $code = rand_num();
        echo "====$code=====\n";

        $data=["15037476070",$code];
        return Task::async("SmsTask","send",$data);
    }

    


}
