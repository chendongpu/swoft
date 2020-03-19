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
 * Class SandyMember
 *
 * @since 2.0
 *
 * @Entity(table="sandy_member")
 */
class SandyMember extends Model
{

    /**
     * @Id()
     *
     * @Column()
     *
     * @var int|null
     */
    private $id;

    /**
     * @Column()
     *
     * @var string
     */
    private $mobile;



    /**
     * @Column(hidden=true)
     *
     * @var string
     */
    private $passwd;


    /**
     * @Column(name="create_time")
     *
     * @var string
     */
    private $createTime;



    /**
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $mobile
     *
     * @return void
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @param string $passwd
     *
     * @return void
     */
    public function setPasswd(string $passwd): void
    {
        $this->passwd = $passwd;
    }


    /**
     * @param string $createTime
     *
     * @return void
     */
    public function setCreateTime(string $createTime): void
    {
        $this->createTime = $createTime;
    }





    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }



    /**
     * @return string
     */
    public function getPasswd(): string
    {
        return $this->passwd;
    }


    /**
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->createTime;
    }

}