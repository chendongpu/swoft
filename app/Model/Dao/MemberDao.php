<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/17
 * Time: 20:49
 */

namespace App\Model\Dao;

use App\Model\Entity\SandyMember;
use App\Model\Entity\SandyMemberInfo;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class MemberDao
{
    /**
     * 创建用户
     * @param array $data
     * @return mixed
     */

    public function create(array $data){
        $member= SandyMember::new($data);
        $member->save();
        $memberId = $member->getId();

        $memberInfo =SandyMemberInfo::new();
        $memberInfo->setMember($memberId);
        $memberInfo->save();
        return $memberId;
    }

    /**
     * 获取用户信息
     * @param string $mobile
     * @return mixed
     */

    public function getMemberByMobile(string $mobile){
       return SandyMember::where('mobile', $mobile)->first(['id', 'mobile','passwd','create_time']);
    }
}