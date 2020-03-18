<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/14
 * Time: 21:26
 */

namespace App\Model\Validate;


use App\Util\Validate\Validate;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 * @package App\Model\Validate
 */
class MemberValidate extends Validate
{
        protected  $rule=[
            'mobile'=>'require|mobile',
            'code'=>'require',
            'passwd'=>'require|min:6|max:32',
            'passwds'=>'require|confirm:password',
        ];

        protected $message=[
            'mobile.require'=>'请输入手机号码',
            'mobile.email'=>'请输入正确手机号码',
            'code.require'=>'请输入验证码',
            'passwd.require'=>'请输入密码',
            'passwd.min'=>'密码最少需要6位字符',
            'passwd.max'=>'密码最大长度不超过32位字符',
            'passwds.require'=>'请输入确认密码',
            'passwds.confirm'=>'两次密码输入不一致',
        ];

        protected $scene=[
            'create'=>['mobile,code,passwd,passwds'],
            'login'=>['mobile','passwd']
        ];
}