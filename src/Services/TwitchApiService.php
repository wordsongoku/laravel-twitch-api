<?php

namespace Zarlach\TwitchApi\Services;

use Zarlach\TwitchApi\API\Api;
use Zarlach\TwitchApi\API\Authentication;
use Zarlach\TwitchApi\API\Bits;
use Zarlach\TwitchApi\API\Channels;
use Zarlach\TwitchApi\API\ChannelFeed;
use Zarlach\TwitchApi\API\Chat;
use Zarlach\TwitchApi\API\Clips;
use Zarlach\TwitchApi\API\Games;
use Zarlach\TwitchApi\API\Ingests;
use Zarlach\TwitchApi\API\Search;
use Zarlach\TwitchApi\API\Streams;
use Zarlach\TwitchApi\API\Teams;
use Zarlach\TwitchApi\API\Users;
use Zarlach\TwitchApi\API\Videos;

class TwitchApiService extends Api
{
    /**
     * Authentication.
     */
    public function getAuthenticationUrl($state = null, $forceVerify = false)
    {
        $authentication = new Authentication();

        return $authentication->getAuthenticationUrl($state, $forceVerify);
    }

    public function getAccessToken($code, $state = null)
    {
        $authentication = new Authentication();

        return $authentication->getAccessToken($code, $state);
    }

    public function getAccessObject($code, $state = null)
    {
        $authentication = new Authentication();

        return $authentication->getAccessObject($code, $state);
    }

    /**
     * Bits
     */
    
    public function getCheermotes($options = [])
    {
        $bits = new Bits();

        return $bits->getCheermotes($options);
    }

    /**
     * Channels.
     */

    public function getChannel($token = null)
    {
        $channels = new Channels();

        return $channels->getChannel($this->getToken($token));
    }

    public function getChannelById($id)
    {
        $channels = new Channels($id);

        return $channels->getChannelById($id);
    }

    public function updateChannel($id, $token = null, $options = [])
    {
        $channels = new Channels();

        return $channels->updateChannel($id, $this->getToken($token), $options);
    }

    public function getChannelEditors($id, $token = null)
    {
        $channels = new Channels();

        return $channels->getChannelEditors($id, $this->getToken($token));
    }

    public function getChannelFollowers($id, $options = [])
    {
        $channels = new Channels();

        return $channels->getChannelFollowers($id, $options);
    }

    public function getChannelTeams($id)
    {
        $channels = new Channels();

        return $channels->getChannelTeams($id);
    }

    public function getChannelSubscribers($id, $token = null, $options = [])
    {
        $channels = new Channels();

        return $channels->getChannelSubscribers($id, $this->getToken($token), $options);
    }

    public function checkChannelSubscriptionByUser($cid, $id, $token = null)
    {
        $channels = new Channels();

        return $channels->checkChannelSubscriptionByUser($cid, $id, $this->getToken($token));
    }

    public function getChannelVideos($id, $options = []) 
    {
        $channels = new Channels();

        return $channels->getChannelVideos($id, $options);
    }

    public function startChannelCommercial($id, $token = null, $length = 30)
    {
        $channels = new Channels();

        return $channels->startChannelCommercial($id, $this->getToken($token), $length);
    }

    public function resetChannelStreamKey($id, $token = null)
    {
        $channels = new Channels();

        return $channels->resetChannelStreamKey($id, $this->getToken($token));
    }

    public function getChannelCommunity($id, $token = null)
    {
        $channels = new Channels();

        return $channels->getChannelCommunity($id, $this->getToken($token));
    }

    public function setChannelCommunity($id, $community, $token = null)
    {
        $channels = new Channels();

        return $channels->setChannelCommunity($id, $community, $this->getToken($token));
    }

    public function deleteChannelFromCommunity($id, $token = null)
    {
        $channels = new Channels();

        return $channels->deleteChannelFromCommunity($id, $this->getToken($token));
    }

    /**
     * Channel Feed.
     */
    // getMultipleFeedPosts needs a fix as this can also be used with and without token, but when not submitting a token Api.php will throw an exception
     public function getMultipleFeedPosts($id, $token = null, $options = [])
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->getMultipleFeedPosts($id, $token, $options);
    }

    public function getFeedPost($id, $post, $token = null, $options = [])
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->getFeedPost($id, $post, $token, $options);
    }

    public function createFeedPost($id, $content, $token = null, $options = [])
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->createFeedPost($id, $content, $this->getToken($token), $options);
    }

    public function deleteFeedPost($id, $post, $token = null)
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->deleteFeedPost($id, $post, $this->getToken($token));
    }

    public function createReactionToAFeedPost($id, $post, $emote, $token = null)
     {
        $channel_feed = new ChannelFeed();

        return $channel_feed->createReactionToAFeedPost($id, $post, $emote, $this->getToken($token));
    }

     public function deleteReactionToAFeedPost($id, $post, $emote, $token = null)
     {
        $channel_feed = new ChannelFeed();

        return $channel_feed->deleteReactionToAFeedPost($id, $post, $emote, $this->getToken($token));
    }

    public function getFeedComments($id, $post, $token = null, $options = [])
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->getFeedComments($id, $post, $token, $options);
    }

    public function createFeedComment($id, $post, $content, $token = null, $options = [])
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->createFeedComment($id, $post, $content, $this->getToken($token), $options);
    }

    public function deleteFeedComment($id, $post, $comment, $token = null)
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->deleteFeedComment($id, $post, $comment, $this->getToken($token));
    }

    public function createReactionToAFeedComment($id, $post, $comment, $emote, $token = null)
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->createReactionToAFeedComment($id, $post, $comment, $emote, $this->getToken($token));
    }

    public function deleteReactionToAFeedComment($id, $post, $comment, $emote, $token = null)
    {
        $channel_feed = new ChannelFeed();

        return $channel_feed->deleteReactionToAFeedComment($id, $post, $comment, $emote, $this->getToken($token));
    }

    /**
     * Chat.
     */
    public function getChatBadgesByChannel($id)
    {
        $chat = new Chat();

        return $chat->getChatBadgesByChannel($id);
    }

    public function getChatEmoticonsBySet($options = [])
    {
        $chat = new Chat();

        return $chat->getChatEmoticonsBySet($options);
    }

    public function getAllChatEmoticons()
    {
        $chat = new Chat();

        return $chat->getAllChatEmoticons();
    }

    /**
     * Clips.
     */
      public function getClips($slug)
    {
        $chat = new Clips();

        return $chat->getClips($slug);
    }

    public function getTopClips($options = [])
    {
        $chat = new Clips();

        return $chat->getTopClips($options);
    }

    public function getFollowedClips($token = null, $options = [])
    {
        $chat = new Clips();

        return $chat->getFollowedClips($this->getToken($token), $options);
    }           

    /**
     * Games.
     */
    public function getTopGames($options = [])
    {
        $games = new Games();

        return $games->getTopGames($options);
    }

    /**
     * Ingests.
     */
    public function getIngestServerList($options = [])
    {
        $ingests = new Ingests();

        return $ingests->getIngestServerList($options);
    }

    /**
     * Search.
     */
    public function searchChannels($query = null, $options = [])
    {
        $search = new Search();

        return $search->searchChannels($query, $options);
    }

    public function searchGames($query, $options = [])
    {
        $search = new Search();
        return $search->searchGames($query, $options);
    }

    public function searchStreams($query, $options = [])
    {
        $search = new Search();
        return $search->searchStreams($query, $options);
    }

    /**
     * Streams.
     */
    public function getStreamByUser($id, $options = [])
    {
        $streams = new Streams();

        return $streams->getStreamByUser($id, $options);
    }

    public function getLiveStreams($options = [])
    {
        $streams = new Streams();

        return $streams->getLiveStreams($options);
    }

    public function getStreamsSummary($options = [])
    {
        $streams = new Streams();

        return $streams->getStreamsSummary($options);
    }

    public function getFeaturedStreams($options = [])
    {
        $streams = new Streams();

        return $streams->getFeaturedStreams($options);
    }

    public function getFollowedStreams($token = null, $options = [])
    {
        $streams = new Streams();

        return $streams->getFollowedStreams($this->getToken($token), $options);
    }

    /**
     * Teams.
     */
    public function getAllTeams($options = [])
    {
        $teams = new Teams();

        return $teams->getAllTeams();
    }

    public function getTeam($team)
    {
        $teams = new Teams();

        return $teams->getTeam($team);
    }

    /**
     * Users.
     */
    public function getUser($token = null)
    {
        $user = new Users();

        return $user->getUser($this->getToken($token));
    }

    public function getUserById($id, $options = [])
    {
        $users = new Users();

        return $users->getUserById($id, $options);
    }

    public function getUserByName($options = [])
    {
        $users = new Users();

        return $users->getUserByName($options);
    }

    public function getUserEmotes($id, $token = null) {
        
        $users = new Users();

        return $users->getUserEmotes($id, $this->getToken($token));
    }

    public function checkUserSubscriptionByChannel($id, $cid, $token = null) 
    {
        $users = new Users();
        return $users->checkUserSubscriptionByChannel($id, $cid, $this->getToken($token));
    }

    public function getUserFollows($id, $options = []) 
    {
        $users = new Users();
        return $users->getUserFollows($id, $options);
    }

    public function checkUserFollowsByChannel($id, $cid) 
    {
        $users = new Users();
        return $users->checkUserFollowsByChannel($id, $cid);
    }

    public function followChannel($id, $cid, $token = null, $options = [])
    {
        $users = new Users();
        return $users->followChannel($id, $cid, $this->getToken($token), $options);
    }

    public function unfollowChannel($id, $cid, $token = null)
    {
        $users = new Users();
        return $users->unfollowChannel($id, $cid, $this->getToken($token));
    }
    

    /**
     * Videos.
     */
    public function getVideo($id)
    {
        $videos = new Videos();

        return $videos->getVideo($id);
    }

    public function getTopVideos($options = [])
    {
        $videos = new Videos();

        return $videos->getTopVideos($options);
    }

    public function getFollowedVideos($token = null, $options = [])
    {
        $videos = new Videos();

        return $videos->getFollowedVideos($this->getToken($token), $options);
    }
}