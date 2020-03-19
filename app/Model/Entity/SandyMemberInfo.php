<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;

/**
 *
 * Class SandyMemberInfo
 *
 * @since 2.0
 *
 * @Entity(table="sandy_member_info")
 */
class SandyMemberInfo extends Model
{
    /**
     * @Id()
     *
     * @Column()
     *
     * @var int|null
     */
    private $member;




    /**
     * @Column()
     *
     * @var string
     */
    private $avatar;





    /**
     * @Column()
     *
     * @var int|null
     */
    private $age;



    /**
     * @param int|null $member
     *
     * @return void
     */
    public function setMember(?int $member): void
    {
        $this->member = $member;
    }

    /**
     * @param string $mobile
     *
     * @return void
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @param int|null $age
     *
     * @return void
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }







    /**
     * @return int|null
     */
    public function getMember(): ?int
    {
        return $this->member;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }


    /**
     * @return int|null
     */
    public function geAge(): ?int
    {
        return $this->age;
    }




}