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
    protected $spec1;

    /**
     * @var Specification
     */
    protected $spec2;

    /**
     * @param Specification $s1
     * @param Specification $s2
     */
    public function __construct(Specification $spec1, Specification $spec2)
    {
        $this->spec1 = $spec1;
        $this->spec2 = $spec2;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return $this->spec1->isSatisfiedBy($subject)
            && $this->spec2->isSatisfiedBy($subject);
    }
}
