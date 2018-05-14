<?php
/**
 * i-MSCP - internet Multi Server Control Panel
 * Copyright (C) 2010-2018 by Laurent Declercq <l.declercq@nuxwin.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

namespace iMSCP\Frontend\User\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @ORM\Entity()
 * @ORM\Table(
 *  name="user",
 *  options={"charset":"utf8mb4", "collate":"utf8mb4_general_ci"},
 *  indexes={@ORM\Index(name="status_idx", columns="status", options={"length":255})}
 * )
 * @ORM\HasLifecycleCallbacks
 * @package iMSCP\Frontend\User\Entity
 */
class User implements UserInterface
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=true, unique=false)
     */
    protected $createdBy;

    /**
     * @var string
     * @ORM\Column(name="role", type="enumrole", nullable=false)
     */
    protected $role;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var DateTime
     * @ORM\Column(name="created_on", type="datetime")
     */
    protected $createdOn;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     */
    protected $updatedOn;

    /**
     * @var string
     * @ORM\Column(name="status", type="text", length=1024)
     */
    protected $status;

    /**
     * @var string
     * @ORM\Column(name="status_prev", type="text", length=1024, nullable=true)
     */
    protected $statusPrev;

    /**
     * @var string
     * @ORM\Column(name="password_reset_token", type="string", length=255, nullable=true)
     */
    protected $passwordResetToken;

    /**
     * @var DateTime
     * @ORM\Column(name="password_reset_token_created_on", type="datetime", nullable=true)
     */
    protected $passwordResetTokenCreatedOn;

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @inheritdoc
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get user role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets user role
     *
     * @param string $role
     * @return UserInterface
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritdoc
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritdoc
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @inheritdoc
     */
    public function setStatus($status)
    {
        if (!isset(self::getStatusList()[$status])) {
            throw new \InvalidArgumentException('Invalid user status');
        }

        $this->statusPrev = $status;
        $this->status = $status;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getStatusAsString()
    {
        return self::getStatusList()[$this->status] ?? $this->status;
    }

    /**
     * @inheritdoc
     */
    public function getStatusPrev()
    {
        return $this->statusPrev ?: $this->status;
    }

    /**
     * @inheritdoc
     */
    public function getStatusPrevAsString()
    {
        return self::getStatusList()[$this->statusPrev] ?? $this->statusPrev;
    }

    /**
     * @inheritdoc
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @inheritdoc
     */
    public function setCreatedOn(DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedOn(DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPasswordResetToken()
    {
        return $this->passwordResetToken;
    }

    /**
     * @inheritdoc
     */
    public function setPasswordResetToken($token)
    {
        $this->passwordResetToken = $token;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPasswordResetTokenCreatedOn()
    {
        return $this->passwordResetTokenCreatedOn;
    }

    /**
     * @inheritdoc
     */
    public function setPasswordResetTokenCreationDate(DateTime $createdOn)
    {
        $this->passwordResetTokenCreatedOn = $createdOn;

        return $this;
    }

    /**
     * Returns possible user statuses as array
     *
     * @return array
     */
    protected function getStatusList(): array
    {
        return [
            static::STATUS_TOADD       => 'toadd',
            static::STATUS_TOCHANGE    => 'tochange',
            static::STATUS_TOCHANGEPWD => 'tochangepwd',
            static::STATUS_TODELETE    => 'todelete',
            static::STATUS_TOENABLE    => 'toenable',
            static::STATUS_TODISABLE   => 'todisable',
            static::STATUS_DISABLED    => 'disabled',
            static::STATUS_OK          => 'ok'
        ];
    }

    /**
     * Set time field
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * @return void
     */
    public function setTimeFields()
    {
        $datetime = new \DateTime('now');

        if ($this->getCreatedOn() == NULL) {
            $this->setCreatedOn($datetime);
            return;
        }

        $this->setUpdatedOn($datetime);
    }
}
