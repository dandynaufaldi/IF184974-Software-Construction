<?php

namespace Phalcon\RateIdea\Repositories\Models;

use Phalcon\RateIdea\Repositories\IdeaRepository;
use Phalcon\RateIdea\Models\Ideas;

class IdeaRepositoryImpl implements IdeaRepository
{
    /**
     * @param string $title
     * @param string $description
     * @param integer $userID
     * @return boolean
     */
    public function createIdea(string $title, string $description, int $userID): bool
    {
        $idea = new Ideas();
        $idea->setTitle($title);
        $idea->setDescription($description);
        $idea->setUserId($userID);
        return $idea->create();
    }
    
    /**
     * @return \Phalcon\RateIdea\Models\Ideas[]
     */
    public function getAllIdea()
    {
        $ideas = Ideas::find();
        return $ideas;
    }
    
    public function findIdeaByID(int $ideaID)
    {
        $idea = Ideas::findFirst($ideaID);
        return $idea;
    }
    
    public function updateIdeaRating(int $ideaID, int $rating)
    {
        $idea = Ideas::findFirst($ideaID);
        if (!$idea){
            return false;
        }
        $oldVotes = $idea->getVotes();
        $oldRating = $idea->getRating();

        $oldTotal = $oldVotes * $rating;
        $newVotes = $oldVotes + 1;
        $newRating = ($oldTotal + $oldRating)/$newVotes;

        $idea->setVotes($newVotes);
        $idea->setRating($newRating);
        return $idea->update();
    }
    
    public function findUserByIdeaID(int $ideaID): ?int
    {
        $idea = Ideas::findFirst($ideaID);
        if (!$idea){
            return null;
        }
        return $idea->user->getId();
    }
}