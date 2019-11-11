<?php

namespace Phalcon\RateIdea\Repositories\Models;

use Phalcon\RateIdea\Repositories\UserRepository;
use Phalcon\RateIdea\Models\Users;

class UserRepositoryImpl implements UserRepository
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function createUser(string $name, string $email, string $password): bool
    {
        $user = new Users();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        return $user->create();
    }

    /**
     * @param string $email
     * @return \Phalcon\RateIdea\Models\Users|null
     */
    public function findUserByEmail(string $email): ?\Phalcon\RateIdea\Models\Users
    {
        $user = Users::findFirstByEmail($email);
        return $user;
    }

    /**
     * @param string $email
     * @param string $password
     * @return \Phalcon\RateIdea\Models\Users|null
     */
    public function findUserByEmailAndPassword(string $email, string $password): ?\Phalcon\RateIdea\Models\Users
    {
        $user = Users::findFirst([
            'email = :email: AND password = :password:',
            'bind' => [
                'email' => $email,
                'password' => $password,
            ],
        ]);
        return $user;
    }
}