<?php

namespace iMSCP\Frontend\User\Entity;

use DateTime;

/**
 * Interface UserInterface
 * @package iMSCP\Frontend\User\Entity
 */
interface UserInterface
{
    const
        STATUS_TOADD = 1, // User being added
        STATUS_TOCHANGE = 2, // User being updated
        STATUS_TOCHANGEPWD = 3, // User password being updated
        STATUS_TODELETE = 4, // User being removed
        STATUS_TODISABLE = 5, // User being disabled
        STATUS_TOENABLE = 6,// User being enabled
        STATUS_DISABLED = 7, // User suspended
        STATUS_OK = 8; // Active user

    /**
     * Returns user unique identifier
     *
     * @return integer
     */
    public function getId();

    /**
     * Set user id
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id);

    /**
     * Get user creator (owner)
     *
     * @return UserInterface|null
     */
    public function getCreatedBy();

    /**
     * Set user creator (owner)
     *
     * @param $createdBy
     * @return UserInterface
     */
    public function setCreatedBy($createdBy);

    /**
     * Get user role
     *
     * @return string
     */
    public function getRole();

    /**
     * Sets user role
     *
     * @param string $role
     * @return UserInterface
     */
    public function setRole($role);

    /**
     * Returns username
     *
     * @return string
     */
    public function getUsername();

    /**
     * Sets username
     *
     * @param string $username
     * @return UserInterface
     */
    public function setUsername($username);

    /**
     * Returns user email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Sets user email
     *
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email);

    /**
     * Returns user password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Sets password
     *
     * @param string $password
     * @return UserInterface
     */
    public function setPassword($password);

    /**
     * Returns status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Sets status
     *
     * @param int $status
     * @return UserInterface
     */
    public function setStatus($status);

    /**
     * Returns user status as string.
     *
     * @return string
     */
    public function getStatusAsString();

    /**
     * Get user previous status
     *
     * @return string
     */
    public function getStatusPrev();

    /**
     * Returns user previous status as string.
     *
     * @return string
     */
    public function getStatusPrevAsString();

    /**
     * Returns the date of user creation
     *
     * @return DateTime
     */
    public function getCreatedOn();

    /**
     * Sets the date when this user was created
     *
     * @param DateTime $createdOn
     * @return UserInterface
     */
    public function setCreatedOn(DateTime $createdOn);

    /**
     * Returns the date last user update
     *
     * @return DateTime
     */
    public function getUpdatedOn();

    /**
     * Sets the date of last user update
     *
     * @param DateTime $updatedOn
     * @return UserInterface
     */
    public function setUpdatedOn(DateTime $updatedOn);

    /**
     * Returns password reset token
     *
     * @return string
     */
    public function getPasswordResetToken();

    /**
     * Sets password reset token
     *
     * @param string $token
     * @return UserInterface
     */
    public function setPasswordResetToken($token);

    /**
     * Returns password reset token's creation date
     *
     * @return string
     */
    public function getPasswordResetTokenCreatedOn();

    /**
     * Sets password reset token's creation date.
     * @param DateTime $createdOn
     * @return UserInterface
     */
    public function setPasswordResetTokenCreationDate(DateTime $createdOn);
}
