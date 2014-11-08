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
 * Class OrSpecification
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class OrSpecification implements Specification
{
    /**
     * @var Specification
     */
    protected $spec1;

    /**
     * @var Specification
     */
    protected $spec2;

    /**
     * @param Specification $spec1
     * @param Specification $spec2
     */
    public function __construct(Specification $spec1, Specification $spec2)
    {
        $this->s1 = $spec1;
        $this->s2 = $spec2;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return $this->s1->isSatisfiedBy($subject)
            || $this->s2->isSatisfiedBy($subject);
    }
}
