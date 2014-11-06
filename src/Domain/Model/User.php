<?php
/*
 * This file is part of the ${FILE_HEADER_PACKAGE} package.
 *
 * ${FILE_HEADER_COPYRIGHT}
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Domain\Model;

use Black\Component\User\Domain\Model\User as BaseUser;
use Black\Component\User\Domain\Model\UserId;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 */
class User extends BaseUser
{
    protected $id;

    /**
     * The groups for the user
     *
     * @var ArrayCollection
     */
    protected $groups;

    /**
     * The roles for the user. It's an array of ROLE_* or FEATURE_*
     *
     * @var ArrayCollection
     */
    protected $roles;

    public function __construct(UserId $userId, $name, $email)
    {
        parent::__construct($userId, $name, $email);

        $this->groups = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return ArrayCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}