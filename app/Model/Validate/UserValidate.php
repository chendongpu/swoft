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
class UserValidate extends Validate
{
        protected  $rule=[
            'email'=>'require|email',
            'nickname'=>'require',
            'password'=>'require|min:6|max:32',
            'passwords'=>'require|confirm:password',
        ];

        protected $message=[
            'email.require'=>'请输入邮箱',
            'email.email'=>'请输入正确邮箱',
            'nickname.require'=>'请输入昵称',
            'password.require'=>'请输入密码',
            'password.min'=>'密码最少需要6位字符',
            'password.max'=>'密码最大长度不超过32位字符',
            'passwords.require'=>'请输入确认密码',
            'passwords.confirm'=>'两次密码输入不一致',
        ];

        protected $scene=[
            'create'=>'email,nickname,password,passwords'
        ];
}