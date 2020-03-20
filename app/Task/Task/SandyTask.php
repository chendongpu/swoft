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

use Swoft\Task\Annotation\Mapping\Task;
use Swoft\Task\Annotation\Mapping\TaskMapping;

/**
 * Class SandyTask
 *
 * @since 2.0
 *
 * @Task(name="SandyTask")
 */
class SandyTask
{

    /**
     * @TaskMapping(name="co")
     * @param $data
     * @param $data1
     * @param $data2
     * @return mixed
     */
   public  function co($data,$data1,$data2){
       sleep(1);
       echo ($data+$data1+$data2)."\n";
       return $data+$data1+$data2;
   }

    /**
     * @TaskMapping(name="async")
     * @param $data
     * @param $data1
     * @return mixed
     */
    public  function async($data,$data1){
        echo ($data+$data1)."\n";
        return $data+$data1;
    }

    /**
     * @TaskMapping(name="redis")
     * @param $data
     */
    public  function redis($data){
        echo $data."\n";
    }


}
