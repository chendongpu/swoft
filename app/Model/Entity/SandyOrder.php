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
 * Class SandyOrder
 *
 * @since 2.0
 *
 * @Entity(table="sandy_order")
 */
class SandyOrder extends Model
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
     * @var int|null
     */
    private $good;


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
     * @param int|null $stock
     *
     * @return void
     */
    public function setGood(?int $good): void
    {
        $this->good = $good;
    }






    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getGood(): ?int
    {
        return $this->good;
    }




}