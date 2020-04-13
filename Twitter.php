<?php

require_once "ListNode.php";

/**
 * 355. 设计推特
 * Class Twitter
 * https://leetcode-cn.com/problems/design-twitter/
 */
class Twitter
{

    const TOP_NUM = 10;

    /**
     * 关注列表
     * @example : [1=>[2,3,4],2=>[4]]
     * @var array
     */
    private $follow_list = [];

    /**
     * 每个用户发送的twitter
     * @example : [1=>ListNode(3->2->1),2=>ListNode(4)]
     * @var array
     */
    private $user_twitter = [];

    /**
     * twitter发送时间
     * @example : [1=>1,2=>2,3=>3]
     * @var array
     */
    private $twitter_time = [];

    private $time = 1;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
    }

    /**
     * Compose a new tweet.
     * @param Integer $userId
     * @param Integer $tweetId
     * @return NULL
     */
    function postTweet($userId, $tweetId)
    {
        $tweetNode = new ListNode($tweetId);
        if (isset($this->user_twitter[$userId])) {
            $tweetNode->next = $this->user_twitter[$userId];
        }
        $this->user_twitter[$userId] = $tweetNode;
        $this->twitter_time[$tweetId] = $this->time;
        $this->time++;
    }

    /**
     * Retrieve the 10 most recent tweet ids in the user's news feed. Each item in the news feed must be posted by users who the user followed or by the user herself. Tweets must be ordered from most recent to least recent.
     * @param Integer $userId
     * @return Integer[]
     */
    function getNewsFeed($userId)
    {
        $tmp = new SplPriorityQueue();
        isset($this->user_twitter[$userId]) && $tmp->insert($this->user_twitter[$userId], $this->twitter_time[$this->user_twitter[$userId]->val]);
        $res = [];
        foreach ($this->follow_list[$userId] as $u) {
            isset($this->user_twitter[$u]) && $tmp->insert($this->user_twitter[$u], $this->twitter_time[$this->user_twitter[$u]->val]);
        }
        for ($i = 0; $i < self::TOP_NUM && $tmp->valid(); $i++) {
            $tmp->top();
            $user_twitter = $tmp->extract();
            $res[] = $user_twitter->val;
            if ($user_twitter->next) {
                $user_twitter = $user_twitter->next;
                $tmp->insert($user_twitter, $this->twitter_time[$user_twitter->val]);
            }
        }
        return $res;
    }

    /**
     * Follower follows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    function follow($followerId, $followeeId)
    {
        if ($followerId == $followeeId) return;
        if (isset($this->follow_list[$followerId])) {
            if (in_array($followeeId, $this->follow_list[$followerId])) return;
            $this->follow_list[$followerId][] = $followeeId;
        } else {
            $this->follow_list[$followerId] = [$followeeId];
        }
    }

    /**
     * Follower unfollows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    function unfollow($followerId, $followeeId)
    {
        $key = array_search($followeeId, $this->follow_list[$followerId]);
        $key !== false && array_splice($this->follow_list[$followerId], $key, 1);
    }
}

/**
 * Your Twitter object will be instantiated and called as such:
 * $obj = Twitter();
 * $obj->postTweet($userId, $tweetId);
 * $ret_2 = $obj->getNewsFeed($userId);
 * $obj->follow($followerId, $followeeId);
 * $obj->unfollow($followerId, $followeeId);
 */
