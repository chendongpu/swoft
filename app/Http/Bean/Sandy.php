<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/16
 * Time: 10:45
 */

namespace App\Http\Bean;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class Sandy
{
    private $name;
    public function __construct()
    {
        echo "Sandy\n";
    }

    public function setName(string $name){
        $this->name = $name;
        return $this;
    }

    public function getName():string{
        return $this->name;
    }
}