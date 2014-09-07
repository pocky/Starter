<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Component\Common\Application\Specification;

use Black\DDD\DDDinPHP\Application\Specification\Specification;

/**
 * Class AndSpecification
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class AndSpecification implements Specification
{
    /**
     * @var Specification
     */
    protected $s1;

    /**
     * @var Specification
     */
    protected $s2;

    /**
     * @param Specification $s1
     * @param Specification $s2
     */
    public function __construct(Specification $s1, Specification $s2)
    {
        $this->s1 = $s1;
        $this->s2 = $s2;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return $this->s1->isSatisfiedBy($subject)
            && $this->s2->isSatisfiedBy($subject);
    }
}
