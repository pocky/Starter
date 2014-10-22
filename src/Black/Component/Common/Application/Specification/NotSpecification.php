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
 * Class NotSpecification
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class NotSpecification implements Specification
{
    /**
     * @var Specification
     */
    protected $spec;

    /**
     * @param Specification $spec
     */
    public function __construct(Specification $spec)
    {
        $this->spec = $spec;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return !$this->spec->isSatisfiedBy($subject);
    }
}
