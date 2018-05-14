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

namespace iMSCP\Frontend\User\Mapper;

use iMSCP\Frontend\User\Entity\UserInterface as UserEntityInterface;

/**
 * Interface UserMapperInterface
 * @package iMSCP\Frontend\User\Mapper
 */
interface UserMapperInterface
{
    /**
     * Find user by unique identifier
     *
     * @param int $id
     * @return UserEntityInterface
     */
    public function findById(int $id);

    /**
     * Find user by username
     *
     * @param string $username
     * @return UserEntityInterface
     */
    public function findByUsername(string $username);

    /**
     * Find user by email
     *
     * @param string $email
     * @return UserEntityInterface[]
     */
    public function findByEmail(string $email);

    /**
     * Add user
     *
     * @param UserEntityInterface $user
     * @return mixed
     */
    public function addUser(UserEntityInterface $user);

    /**
     * Update user
     * @param UserEntityInterface $user
     * @return mixed
     */
    public function updateUser(UserEntityInterface $user);

    /**
     * Delete user
     *
     * @param UserEntityInterface $user
     * @return mixed
     */
    public function deleteUser(UserEntityInterface $user);
}
