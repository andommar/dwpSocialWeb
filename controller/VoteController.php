<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../models/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

class VoteController
{

    public function ratePost($userId, $postId, $newVote)
    {
        $v = new Vote();
        $res = $v->ratePost($userId, $postId, $newVote);
        return $res;
    }
    public function isPostPreviouslyRated($userId, $postId)
    {
        $v = new Vote();
        $res = $v->isPostPreviouslyRated($userId, $postId);
        return $res;
    }
    public function isOldVotePositive($userId, $postId)
    {
        $v = new Vote();
        $res = $v->isOldVotePositive($userId, $postId);
        return $res;
    }
    public function getUserRatedPosts($userId)
    {
        $v = new Vote();
        $res = $v->getUserRatedPosts($userId);
        return $res;
    }
    public function getPostVotes($post_id)
    {
        $v = new Vote();
        $res = $v->getPostVotes($post_id);
        return $res;
    }
}
