<?php

namespace Zarlach\TwitchApi\Services;

use Zarlach\TwitchApi\API\Api;
use Zarlach\TwitchApi\API\Authentication;
use Zarlach\TwitchApi\API\Bits;
use Zarlach\TwitchApi\API\Channels;
use Zarlach\TwitchApi\API\Chat;
use Zarlach\TwitchApi\API\Follow;
use Zarlach\TwitchApi\API\Games;
use Zarlach\TwitchApi\API\Ingests;
use Zarlach\TwitchApi\API\Root;
use Zarlach\TwitchApi\API\Search;
use Zarlach\TwitchApi\API\Streams;
use Zarlach\TwitchApi\API\Subscriptions;
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
     * Chat.
     */
    public function chat($channel)
    {
        $chat = new Chat();

        return $chat->chatChannel($channel);
    }

    public function chatBadges($channel)
    {
        $chat = new Chat();

        return $chat->chatBadges($channel);
    }

    public function chatEmoticons($channel)
    {
        $chat = new Chat($channel);

        return $chat->chatEmoticons($channel);
    }

    /**
     * Follow.
     */
    public function followers($channel, $options = [])
    {
        $follow = new Follow();

        return $follow->channelFollows($channel, $options);
    }

    public function followings($user, $options)
    {
        $follow = new Follow();

        return $follow->userFollowsChannels($user, $options);
    }

    public function userIsFollowing($user, $channel)
    {
        $follow = new Follow();

        return $follow->userFollowsChannel($user, $channel);
    }

    public function follow($user, $channel, $options = [], $token = null)
    {
        $follow = new Follow($this->getToken($token));

        return $follow->authenticatedUserFollowsChannel($user, $channel, $options);
    }

    public function unfollow($user, $channel, $token = null)
    {
        $follow = new Follow($this->getToken($token));

        return $follow->authenticatedUserUnfollowsChannel($user, $channel);
    }

    /**
     * Games.
     */
    public function topGames($options = [])
    {
        $games = new Games();

        return $games->topGames($options);
    }

    /**
     * Ingests.
     */
    public function ingests($options = [])
    {
        $ingests = new Ingests();

        return $ingests->ingests($options);
    }

    /**
     * Root.
     */
    public function root()
    {
        $root = new Root();

        return $root->root();
    }

    public function authRoot($token = null)
    {
        $root = new Root($this->getToken($token));

        return $root->authRoot();
    }

    /**
     * Search.
     */
    public function searchChannels($options)
    {
        $search = new Search();

        return $search->searchChannels($options);
    }

    /* Coming Soon, use streams() for now

    public function searchStreams($options)
    {
        $search = new Search();
        return $search->searchStreams($options);
    }*/

    /* Coming Soon

    public function searchGames($options)
    {
        $search = new Search();
        return $search->searchGames($options);
    }*/

    /**
     * Streams.
     */
    public function liveChannel($channel)
    {
        $streams = new Streams();

        return $streams->streamsChannel($channel);
    }

    public function streams($options)
    {
        $streams = new Streams();

        return $streams->streams($options);
    }

    public function featuredStreams($options = [])
    {
        $streams = new Streams();

        return $streams->streamsFeatured($options);
    }

    public function streamSummaries($options = [])
    {
        $streams = new Streams();

        return $streams->streamSummaries($options);
    }

    /**
     * Subscriptions.
     */
    public function subscribers($channel, $options = [], $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->channelsSubscriptions($channel, $options, $this->getToken($token));
    }

    public function subscriber($channel, $user, $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->channelSubscriptionUser($channel, $user, $this->getToken($token));
    }

    public function subscribedToChannel($channel, $user, $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->userSubscriptionChannel($channel, $user, $this->getToken($token));
    }

    /**
     * Teams.
     */
    public function teams()
    {
        $teams = new Teams();

        return $teams->teams();
    }

    public function team($team)
    {
        $teams = new Teams();

        return $teams->team($team);
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
    public function video($id)
    {
        $videos = new Videos();

        return $videos->video($id);
    }

    public function topVideos($options = [])
    {
        $videos = new Videos();

        return $videos->videosTop($options);
    }

    public function channelVideos($channel, $options = [])
    {
        $videos = new Videos();

        return $videos->channelVideos($channel, $options);
    }
}