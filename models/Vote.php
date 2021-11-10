<?php

require_once('DbConn.php');

class Vote
{

    public function isPostPreviouslyRated($userId, $postId)
    {
        $db = new Dbconn();
        $sql = 'SELECT count(*) FROM user_votes_post WHERE user_id=? AND post_id?';
        $arr = [$userId, $postId];
        $result = $db->selectQueryBindArr($sql, $arr);

        echo "isPostPreviouslyRated: $result" . "<br>";
        return $result;
    }
    public function isOldVotePositive($userId, $postId)
    {
        $db = new Dbconn();
        $sql = 'SELECT is_positive FROM user_votes_post WHERE `user_id`=? AND post_id?';
        $arr = [$userId, $postId];
        $result = $db->selectQueryBindArr($sql, $arr);

        echo "isOldVotePositive: $result" . "<br>";

        return $result;
    }
    public function ratePost($userId, $postId, $newVote)
    {

        try {
            // echo ($userId . " " . $postId . " " . $newVote);
            $db = new Dbconn();
            $result = false;
            $isOldVotePositive = $this->isOldVotePositive($userId, $postId);

            echo "old vote value:" . $isOldVotePositive . "<br>";
            // We send to the view code results in order to apply the specific css class after the query is done
            // code -1: post is unrated
            // code 2: post is rated > upvote
            // code 3: post is rated > downvote

            // Post is rated again
            if ($this->isPostPreviouslyRated($userId, $postId)) {

                echo "previously rated <br>";
                // User cancels their vote (DELETE query)
                if (($isOldVotePositive && $newVote) || (!$isOldVotePositive && !$newVote)) {

                    echo "unvote <br>";

                    $sql =  'DELETE from user_votes_post WHERE `user_id`=? AND post_id=?';
                    $arr = [$userId, $postId];
                    // $result = -1;
                }
                // User votes the opposite  (UPDATE query)
                else if (($isOldVotePositive && !$newVote) || (!$isOldVotePositive && $newVote)) {

                    echo "vote the opposite <br>";

                    $sql =  'UPDATE user_votes_post SET is_positive=? WHERE `user_id`=? AND post_id=?';
                    $arr = [$newVote, $userId, $postId];
                    // $result = $newVote ? 2 : 3;
                }
                $result = $db->executeQueryBindArr($sql, $arr);
            } else { // First time rating the post (INSERT QUERY)

                echo "rating for the first time <br>";

                $sql =  'INSERT INTO user_votes_post (`user_id`,post_id,is_positive) VALUES (?, ?, ?)';
                $arr = [$userId, $postId, $newVote];
                // $result = $newVote ? 2 : 3;
                $result = $db->executeQueryBindArr($sql, $arr);
            }

            return $result; // If query fails, the result will be false (0)

        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
}
