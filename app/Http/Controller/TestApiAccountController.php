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


use App\Model\Logic\MemberLogic;
use App\Model\Service\MemberService;
use App\Util\Message;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;

/**
 * Class TestApiAccountController
 *
 * @since 2.0
 *
 * @Controller(prefix="api")
 */
class TestApiAccountController
{


    /**
     * 该方法路由地址为 /api/account
     * @RequestMapping(route="account")
     */
    public function test()
    {

        return "Success";
    }






    /**
     * @Inject()
     * @var MemberLogic
     */
    private $memberLogic;


    /**
     * @Inject()
     * @var MemberService
     */
    private $memberService;


    /**
     * 创建用户
     * @RequestMapping(route="create")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ValidateException
     * @throws \App\Exception\ServiceException
     */
    public function create(Request $request)
    {
        $post = $request->post();
        $this->memberLogic->create($post);
        $this->memberService->create($post);
        return Message::success();
    }



    /**
     * 用户登陆
     * @RequestMapping(route="login")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ServiceException
     * @throws \App\Exception\ValidateException
     */
    public function login(Request $request){
        $post = $request->post();
        $this->memberLogic->login($post);
        $token = $this->memberService->login($post['mobile'],$post['passwd']);
        return Message::success('success',Message::CODE_SUCCESS,['token'=>$token]);
    }



//数据库
//USE test;
//CREATE TABLE `sandy_article` (
//`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
//`title` VARCHAR(100) NOT NULL COMMENT '标题',
//`desc` VARCHAR(255) NOT NULL COMMENT '描述',
//`content` VARCHAR(45) NOT NULL,
//`create_time` DATETIME NOT NULL COMMENT '发布时间',
//`name` VARCHAR(45) DEFAULT NULL,
//PRIMARY KEY (`id`)
//) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='文章';
//
//
//CREATE TABLE `sandy_good` (
//`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
//`stock` INT(10) UNSIGNED NOT NULL COMMENT '库存',
//PRIMARY KEY (`id`)
//) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='产品';
//
//CREATE TABLE `sandy_member` (
//`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
//`mobile` CHAR(11) NOT NULL COMMENT '手机号码',
//`passwd` CHAR(32) NOT NULL,
//`create_time` DATETIME NOT NULL COMMENT '注册时间',
//PRIMARY KEY (`id`)
//) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='用户';
//
//CREATE TABLE `sandy_member_info` (
//`member` INT(10) UNSIGNED NOT NULL COMMENT '用户id',
//`avatar` VARCHAR(255) DEFAULT NULL,
//`age` TINYINT(3) DEFAULT NULL,
//PRIMARY KEY (`member`)
//) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='用户信息';








}
