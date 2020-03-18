<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/17
 * Time: 20:49
 */

namespace App\Model\Service;

use App\Exception\ServiceException;
use App\Model\Dao\MemberDao;
use App\Model\Data\MemberData;
use App\Model\Entity\SandyMember;
use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * @Bean()
 */
class MemberService
{
    /**
     * @Inject()
     * @var MemberDao
     */
    private $memberDao;


    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;


    /**
     * @Inject()
     * @var MemberData
     */
    private $memberData;

    /**
     * 创建用户
     * @param array $data
     * @return mixed
     * @throws ServiceException
     */
    public function create(array $data)
    {
        $data['create_time'] = date("Y-m-d H:i:s");
        $this->codeService->checkCode($data['mobile'], $data['code']);
        $user = $this->getMemberByMobile($data['mobile']);
        if ($user) {
            throw new ServiceException('该手机号已经注册');
        }
        return $this->memberDao->create($data);
    }

    /**
     * 获取用户信息
     * @param string $mobile
     * @return mixed
     */
    public function getMemberByMobile(string $mobile)
    {
        return $this->memberDao->getMemberByMobile($mobile);
    }


    /**
     * 用户登陆
     * @param string $mobile
     * @param string $passwd
     * @return String
     * @throws ServiceException
     */
    public function login(string $mobile, string $passwd)
    {
        /** @var SandyMember $member */
        $member = $this->getMemberByMobile($mobile);
        if (!$member) {
            throw new ServiceException('该手机号码未注册');
        }
        if ($passwd != $member->getPasswd()) {
            throw new ServiceException('密码错误');
        }
        return $this->getTokenByMemberId($member->getId());
    }


    /**
     * 生成Token
     * @param int $userId
     * @return String
     */
    public function getTokenByMemberId(int $memberId)
    {
        // 登陆成功使用jwt返回token
        $key = \config('jwt.key');
        $exp = \config('jwt.exp');


        $tokenParam = [
            'member' => $memberId,// 用户id
            'iat'=>time(),
            'nbf'=>time(),
            'exp'=>time()+$exp
        ];
        $token = JWT::encode($tokenParam, $key);
        return $token;
    }



    /**
     * 获取用户信息
     * @param int $memberId
     * @return bool|\Closure|string
     */
    public function getMemberInfo(int $memberId){
        return $this->memberData->getMemberInfo($memberId);
    }


}