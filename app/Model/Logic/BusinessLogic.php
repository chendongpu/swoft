<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 9:37
 */

namespace App\Model\Logic;

use App\Exception\ValidateException;
use Swoft\Bean\Annotation\Mapping\Inject;
use App\Model\Validate\UserValidate;
use Swoft\Bean\Annotation\Mapping\Bean;


/**
 * @Bean()
 */
class BusinessLogic
{

    /**
     * @Inject()
     * @var UserValidate
     */
    private $validate;


    public function create(array $data){
        if(!$this->validate->scene('create')->check($data)){
            throw new ValidateException($this->validate->getError());
        }
    }
}