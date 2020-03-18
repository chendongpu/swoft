<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/18
 * Time: 7:03
 */

namespace App\Model\Service;


use App\Util\Validate\Validate;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Redis\Redis;
use App\Exception\ServiceException;

/**
 * @Bean()
 */
class CodeService
{

    /**
     * 获取验证码
     * @param string $mobile
     * @return mixed
     * @throws ServiceException
     */
    public function getCode(string $mobile)
    {
        $key = "code:{$mobile}";
        $ttl = 120;
        $this->checkMobile($mobile);
        $code = rand_num();
        echo "code : $code \n";

        $second = Redis::ttl($key);
        if ($second > 0) {
            throw new ServiceException("请在{$second}秒后再获取验证码");
        }
        Redis::set($key, $code, $ttl);

        // 验证码发送，可以使用异步
        return $ttl;
    }

    /**
     * 验证验证码
     * @param string $mobile
     * @param string $code
     * @throws ServiceException
     */
    public function checkCode(string $mobile, string $code)
    {
        $key = "code:{$mobile}";
        $val = Redis::get($key);
        if ($val!=$code){
            throw new ServiceException('验证码错误');
        }
    }

    /**
     * 检查手机号码
     * @param string $mobile
     * @throws ServiceException
     */
    public function checkMobile(string $mobile)
    {
        $rule = [
            'mobile' => 'require|mobile',
        ];
        $msg = [
            'mobile.require' => '请输入手机号码',
            'mobile.mobile' => '请输入正确手机号码'
        ];

        $validate = Validate::make($rule)->message($msg);
        $validate->rule($rule);
        $result = $validate->check(['mobile' => $mobile]);
        if (!$result) {
            throw new ServiceException($validate->getError());
        }
    }

}