<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
 
 // you can add some custom functions.

namespace App\Http\Controller;

use App\Model\Service\CodeService;
use App\Util\Message;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;

/**
 * Class TestApiCodeController
 *
 * @since 2.0
 *
 * @Controller(prefix="api")
 */
class TestApiCodeController
{



    /**
     * 该方法路由地址为 /api/code
     * @RequestMapping(route="code")
     */
    public function test()
    {

        return "Success";
    }



    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;


    /**
     * 获取验证码
     * @RequestMapping(route="getCode")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ServiceException
     */
    public function getCode(Request $request){
        $mobile = $request->post('mobile','');
        $time = $this->codeService->getCode($mobile);
        return Message::success('success',Message::CODE_SUCCESS,['time'=>$time]);
    }



}
