<?php

namespace Phalcon\RateIdea\Repositories;

interface UserRepository
{
    public function createUser(string $name, string $email, string $password);
    public function findUserByEmail(string $email);
    public function findUserByEmailAndPassword(string $email, string $password);
}