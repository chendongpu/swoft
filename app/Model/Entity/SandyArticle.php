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
 * Class SandyArticle
 *
 * @since 2.0
 *
 * @Entity(table="sandy_article")
 */
class SandyArticle extends Model
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
    private $title;



    /**
     * @Column()
     *
     * @var string
     */
    private $desc;

    /**
     * @Column()
     *
     * @var string
     */
    private $content;


    /**
     * @Column(name="create_time")
     *
     * @var string
     */
    private $createTime;

    /**
     * @Column()
     *
     * @var string
     */
    private $name;



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
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $desc
     *
     * @return void
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }


    /**
     * @param string $content
     *
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->desc = $content;
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
     * @param string $desc
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
    public function getTitle(): string
    {
        return $this->title;
    }



    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


    /**
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->createTime;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}