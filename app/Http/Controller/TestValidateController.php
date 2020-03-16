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
use App\Model\Validate\UserValidate;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;

/**
 * Class TestValidateController
 *
 * @since 2.0
 *
 * @Controller(prefix="tv")
 */
class TestValidateController
{

    /**
     * @Inject()
     * @var UserValidate
     */
    private $validate;

    /**
     * 该方法路由地址为 /tv/test
     * @RequestMapping(route="test")
     */
    public function test()
    {
        $data=[
            'email'=>"2323178881@qq.com",
            'nickname'=>'sandy',
            'password'=>'123456',
            'passwords'=>'123456',
        ];
        if(!$this->validate->scene('create')->check($data)){
            return $this->validate->getError();
        }else{
            return "success";
        }

    }

    


}
