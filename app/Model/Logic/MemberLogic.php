<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Model\Logic;

use App\Exception\ValidateException;
use App\Model\Validate\MemberValidate;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * @Bean()
 */
class MemberLogic
{
    /**
     * @Inject()
     * @var MemberValidate
     */
    private $memberValidate;

    /**
     * 创建用户
     * @param array $data
     * @throws ValidateException
     */
    public function create(array $data){
        if (!$this->memberValidate->scene('create')->check($data)){
            throw new ValidateException($this->memberValidate->getError());
        }
    }

    /**
     * 用户登陆
     * @param array $data
     * @throws ValidateException
     */
    public function login(array $data){
        if (!$this->memberValidate->scene('login')->check($data)){
            throw new ValidateException($this->memberValidate->getError());
        }
    }
}
