<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class Sandy
 *
 * @since 2.0
 *
 * @Annotation
 * @Target("ALL")
 */
class Sandy
{


    /**
     * @var string
     */
    private $name = '';

    /**
     * StringType constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {

        if (isset($values['name'])) {
            $this->name = $values['name'];
            var_dump($values);
        }
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Sandy
     */
    public function setName($name){
        $this->name=$name;
        return $this;
    }
}
