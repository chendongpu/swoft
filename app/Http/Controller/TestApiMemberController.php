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


use App\Util\Message;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;
use App\Model\Service\MemberService;
use App\Http\Middleware\MemberAuthMiddleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class TestApiMemberController
 *
 * @since 2.0
 * @Middleware(MemberAuthMiddleware::class)
 * @Controller(prefix="api")
 */
class TestApiMemberController
{




    /**
     * 该方法路由地址为 /api/member
     * @RequestMapping(route="member")
     */
    public function test()
    {

        return "Success";
    }


    /**
     * @Inject()
     * @var MemberService
     */
    private $memberService;
    /**
     * 获取用户信息
     * @RequestMapping(route="info",method=RequestMethod::POST)
     * @param Request $request
     * @return
     */
    public function getMemberInfo(Request $request){
        $memberId = $request->member;
        $memberInfo = $this->memberService->getMemberInfo($memberId);
        return Message::success('success',Message::CODE_SUCCESS,$memberInfo);
    }



}
