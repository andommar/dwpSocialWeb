<?php

require_once('DbConn.php');

class Vote
{

    public function isPostPreviouslyRated($user_id, $post_id)
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT count(*) FROM user_votes_post WHERE user_id=? AND post_id=?';
            $arr = [$user_id, $post_id];
            $result = $db->selectQueryBindArrSingleFetch($sql, $arr);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function isOldVotePositive($user_id, $post_id)
    {
        try {


            $db = new Dbconn();
            $sql = 'SELECT is_positive FROM user_votes_post WHERE `user_id`=? AND post_id=?';
            $arr = [$user_id, $post_id];
            $result = $db->selectQueryBindArrSingleFetch($sql, $arr);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function ratePost($user_id, $post_id, $newVote)
    {

        try {

            $db = new Dbconn();
            $result = false;
            $isOldVotePositive = $this->isOldVotePositive($user_id, $post_id);
            $isPostPreviouslyRated = $this->isPostPreviouslyRated($user_id, $post_id);

            // We send to the view code results in order to apply the specific css class after the query is done
            // code -1: post is unrated
            // code 2: post is rated > upvote
            // code 3: post is rated > downvote

            // Post is rated again
            if ($isPostPreviouslyRated[0]) {

                // User cancels their vote (DELETE query)
                if (($isOldVotePositive[0] && $newVote) || (!$isOldVotePositive[0] && !$newVote)) {
                    $sql =  'DELETE from user_votes_post WHERE `user_id`=? AND post_id=?';
                    $arr = [$user_id, $post_id];
                    $query_result = $db->executeQueryBindArr($sql, $arr);
                    if ($query_result) $result = -1;
                }
                // User votes the opposite  (UPDATE query)
                else if (($isOldVotePositive[0] && !$newVote) || (!$isOldVotePositive[0] && $newVote)) {

                    $sql =  'UPDATE user_votes_post SET is_positive=? WHERE `user_id`=? AND post_id=?';
                    $arr = [$newVote, $user_id, $post_id];
                    $query_result = $db->executeQueryBindArr($sql, $arr);
                    if ($query_result) $result = $newVote ? 2 : 3;
                }
            } else { // First time rating the post (INSERT QUERY)

                $sql =  'INSERT INTO user_votes_post (`user_id`,post_id,is_positive) VALUES (?, ?, ?)';
                $arr = [$user_id, $post_id, $newVote];
                $query_result = $db->executeQueryBindArr($sql, $arr);
                if ($query_result) $result = $newVote ? 2 : 3;
            }

            return $result; // If query fails, the result will be false (0)

        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    // Gets the votes of all the posts the user ever voted 
    public function getUserRatedPosts($user_id)
    {
        try {
            $db = new Dbconn();
            $result = false;
            $sql = 'SELECT post_id, is_positive FROM user_votes_post WHERE user_id = ?';
            $result = $db->selectQueryBind($sql, $user_id);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    // Gets the votes of a specified post by a specific user
    public function getUserRatedPostByPostId($user_id, $post_id)
    {
        try {
            $db = new Dbconn();
            $result = false;
            $sql = 'SELECT post_id,is_positive FROM user_votes_post WHERE user_id = ? and post_id =?';
            $arr = [$user_id, $post_id];
            $result = $db->selectQueryBindArrSingleFetch($sql, $arr);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function getPostVotes($post_id)
    {
        try {
            $db = new Dbconn();
            $result = false;
            $sql = 'SELECT up_votes,down_votes FROM post WHERE post_id = ?';
            $result = $db->selectQueryBindSingleFetch($sql, $post_id);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
}
