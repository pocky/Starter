<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Component\Common\Infrastructure\Doctrine;

/**
 * Interface Manager
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface Manager
{
    /**
     * Return the object manager
     *
     * @return mixed
     */
    public function getManager();

    /**
     * Flush the curent manager
     *
     * @return mixed
     */
    public function flush();
}
