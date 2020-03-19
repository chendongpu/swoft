<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Task\Task;

use App\Util\Sms;
use Swoft\Task\Annotation\Mapping\Task;
use Swoft\Task\Annotation\Mapping\TaskMapping;

/**
 * Class SmsTask
 *
 * @since 2.0
 *
 * @Task(name="SmsTask")
 */
class SmsTask
{

    /**
     * @TaskMapping(name="send")
     * @param $PhoneNumbers
     * @param $code
     */
   public  function send($PhoneNumbers,$code){

      $content = Sms::sendSms($PhoneNumbers,$code);

      var_dump($content);
   }




}
