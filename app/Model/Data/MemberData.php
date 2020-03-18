<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/17
 * Time: 21:29
 */

namespace App\Model\Data;

use App\Model\Entity\SandyMemberInfo;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean()
 */
class MemberData  extends Repository
{
    /**
     * 获取用户信息
     * @param int $memberId
     * @return bool|\Closure|string
     */
    public function getMemberInfo(int $memberId)
    {
        return $this->setModel(SandyMemberInfo::new())
            ->setTag("memberInfo")
            ->remeber($this->getTag() . ":" . $memberId, function () use ($memberId) {
                return $this->getModel()::find($memberId);
            });
    }
}