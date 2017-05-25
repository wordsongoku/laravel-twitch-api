<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/users/.
 */
class Users extends Api
{
    /**
     * Gets a user object based on the OAuth token provided.
     * Get User returns more data than Get User by ID, because Get User is privileged.
     *
     * @param string $token Twitch token
     *
     * @return JSON Authenticated user object
     */
    public function getUser($token = null)
    {
        return $this->sendRequest('GET', 'user', $this->getToken($token));
    }

    /**
     * Gets a specified user object by Id (default v5 standard) or option 'login' => 'username'
     *
     * @param integer $id Twitch User ID
     * @param $options List options
     *
     * @return JSON Users object
     */
    public function getUserById($id, $options = [])
    {
        $availableOptions = ['login'];

        return $this->sendRequest('GET', 'users/'.$id, false, $options, $availableOptions);
    }

     /**
     * Gets a specified user object by Name
     *
     * @param $options List options
     *
     * @return JSON Users object
     */
    public function getUserByName($options = [])
    {
        $availableOptions = ['login'];

        return $this->sendRequest('GET', 'users', false, $options, $availableOptions);
    }

    /**
     * Gets a list of the emojis and emoticons that the specified user can use in chat. These are both the globally available ones and the 
     * channel-specific ones (which can be accessed by any user subscribed to the channel).
     *
     * @param integer $id  Twitch User ID
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function getUserEmotes($id, $token = null) 
    {
        return $this->sendRequest('GET', 'users/'.$id.'/emotes', $this->getToken($token));
    }

    /**
     * Checks if a specified user is subscribed to a specified channel.
     *
     * @param integer $id  Twitch User ID
     * @param integer $cid Twitch Channel ID
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function checkUserSubscriptionByChannel($id, $cid, $token = null) 
    {
        return $this->sendRequest('GET', 'users/'.$id.'/subscriptions/'.$cid, $this->getToken($token));
    }

    /**
     * Gets a list of all channels followed by a specified user, sorted by the date when they started following each channel.
     *
     * @param integer $id  Twitch User ID
     * @param $options List options
     * 
     * @return JSON Users object
     */
    public function getUserFollows($id, $options = []) 
    {
        $availableOptions = ['limit', 'offset', 'direction', 'sortby'];

        return $this->sendRequest('GET', 'users/'.$id.'/follows/channels', false, $options, $availableOptions);
    }

    /**
     * Checks if a specified user follows a specified channel. If the user is following the channel, a follow object is returned.
     *
     * @param integer $id  Twitch User ID
     * @param integer $cid Twitch Channel ID
     * 
     * @return JSON Users object
     */
    public function checkUserFollowsByChannel($id, $cid)
    {
     return $this->sendRequest('GET', 'users/'.$id.'/follows/channels/'.$cid);
    }

    /**
     * Adds a specified user to the followers of a specified channel.
     *
     * @param integer $id  Twitch User ID
     * @param integer $cid Twitch Channel ID
     * @param string $token Twitch token
     * @param $options List options
     * 
     * @return JSON Users object
     */
    public function followChannel($id, $cid, $token = null, $options = [])
    {
        $availableOptions = ['notifications'];

        return $this->sendRequest('PUT', 'users/'.$id.'/follows/channels/'.$cid, $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Deletes a specified user from the followers of a specified channel.
     *
     * @param integer $id  Twitch User ID
     * @param integer $cid Twitch Channel ID
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function unfollowChannel($id, $cid, $token = null)
    {
        return  $this->sendRequest('DELETE', 'users/'.$id.'/follows/channels/'.$cid, $this->getToken($token));
    }

    /**
     * Gets a specified user’s block list. List sorted by recency, newest first.
     *
     * @param integer $id  Twitch User ID
     * @param string $token Twitch token
     * @param $options List options
     * 
     * @return JSON Users object
     */
    public function getUserBlockList($id, $token = null, $options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'users/'.$id.'/blocks', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Blocks a user; that is, adds a specified target user to the blocks list of a specified source user.
     *
     * @param integer $id  Twitch User ID
     * @param integer $block Twitch User ID to be blocked
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function blockUser($id, $block, $token = null)
    {
        return $this->sendRequest('PUT', 'users/'.$id.'/blocks/'.$block, $this->getToken($token));
    }

    /**
     * Unblocks a user; that is, deletes a specified target user from the blocks list of a specified source user.
     *
     * @param integer $id  Twitch User ID
     * @param integer $unblock Twitch User ID to be unblocked
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function unblockUser($id, $unblock, $token = null)
    {
        return $this->sendRequest('DELETE', 'users/'.$id.'/blocks/'.$unblock, $this->getToken($token));
    }

    /**
     * Creates a connection between a user (an authenticated Twitch user, linked to a game user) and VHS, and starts returning the user’s VHS data in 
     * each heartbeat. The game user is specified by a required identifier parameter.
     *
     * @param string $identifier The game user is specified by a required identifier parameter.
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function createUserConnectionToVHS($identifier, $token = null, $options = [])
    {
        $availableOptions = ['identifier'];
        $options = ['identifier' => $identifier];

        return $this->sendRequest('PUT', 'user/vhs', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Checks whether an authenticated Twitch user is connected to VHS.
     *
     * If a connection to the service exists for the specified user, the linked game user’s ID is returned; otherwise, an HTTP 404 response is returned.
     *
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function checkUserConnectionToVHS($token = null)
    {
        return $this->sendRequest('GET', 'user/vhs', $this->getToken($token));
    }

    /**
     * Deletes the connection between an authenticated Twitch user and VHS.
     *
     * @param string $token Twitch token
     * 
     * @return JSON Users object
     */
    public function deleteUserConnectionToVHS($token = null)
    {
        return $this->sendRequest('DELETE', 'user/vhs', $this->getToken($token));
    }    
}
