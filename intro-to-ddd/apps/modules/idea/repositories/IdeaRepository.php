<?php

namespace Phalcon\RateIdea\Repositories;

interface IdeaRepository 
{
    public function createIdea(string $title, string $description, int $userID);
    public function getAllIdea();
    public function findIdeaByID(int $ideaID);
    public function updateIdeaRating(int $ideaID, int $rating);
    public function findUserByIdeaID(int $ideaID);
}