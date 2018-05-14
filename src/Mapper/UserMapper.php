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

use Doctrine\ORM\EntityManagerInterface;
use iMSCP\Frontend\User\Entity\User as UserEntity;
use iMSCP\Frontend\User\Entity\UserInterface as UserEntityInterface;

/**
 * Class UserMapper
 * @package iMSCP\Frontend\User\Mapper
 */
class UserMapper implements UserMapperInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * UserMapper constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Find user by its unique identifier
     *
     * @param int $id
     * @return UserEntityInterface
     */
    public function findById(int $id)
    {
        $userRepository = $this->em->getRepository(UserEntity::class);

        return $userRepository->find($id);
    }

    /**
     * Find all users by creator unique identifier
     *
     * @param int $id
     * @return UserEntityInterface[]
     */
    public function findAllByCreatorId(int $id)
    {
        $userRepository = $this->em->getRepository(UserEntity::class);

        return $userRepository->findBy(['created_by' => $id]);
    }

    /**
     * Find user by username
     *
     * @param string $username
     * @return UserEntityInterface
     */
    public function findByUsername(string $username)
    {
        $userRepository = $this->em->getRepository(UserEntity::class);

        return $userRepository->findOneBy(['username' => $username]);
    }

    /**
     * Find user by email
     *
     * @param string $email
     * @return UserEntityInterface[]
     */
    public function findByEmail(string $email): array
    {
        $userRepository = $this->em->getRepository(UserEntity::class);

        return $userRepository->findBy(['email' => $email]);
    }

    /**
     * Add user
     *
     * @param UserEntityInterface $user
     * @return mixed
     */
    public function addUser(UserEntityInterface $user)
    {
        return $this->persist($user);
    }

    /**
     * Update user
     * @param UserEntityInterface $user
     * @return mixed
     */
    public function updateUser(UserEntityInterface $user)
    {
        return $this->persist($user);
    }

    /**
     * Delete user
     *
     * @param UserEntityInterface $user
     * @return void
     */
    public function deleteUser(UserEntityInterface $user)
    {
        $this->em->remove($user);
        $this->em->flush();
    }

    /**
     * Persist the given User
     * @param UserEntityInterface $user
     * @return UserEntityInterface
     */
    protected function persist(UserEntityInterface $user)
    {
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}
