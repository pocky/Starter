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
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Class User
 */
class User extends BaseUser implements AdvancedUserInterface
{
    /**
     * @var
     */
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

    /**
     * @param UserId $userId
     * @param string $name
     * @param string $email
     */
    public function __construct(UserId $userId, $name, $email)
    {
        parent::__construct($userId, $name, $email);

        $this->roles = [];
        $this->groups = [];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->name;
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

    /**
     * @param $role
     * @return $this
     */
    public function addRole($role)
    {
        if (!in_array($role, $this->roles)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * @param $role
     * @return $this
     */
    public function removeRole($role)
    {
        if (!in_array($role, $this->roles)) {
            unset($this->roles[$role]);
        }

        return $this;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return (boolean) false === $this->isLocked();
    }

    /**
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (boolean) true === $this->isActive();
    }
}
