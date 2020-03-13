<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/13
 * Time: 8:04
 */

namespace App\Http\Controller\Bean;

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