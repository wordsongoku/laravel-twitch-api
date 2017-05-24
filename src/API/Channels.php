<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/channels/.
 */
class Channels extends API
{
    /**
     *  Gets a channel object based on a specified OAuth token.
     *  Get Channel returns more data than Get Channel by ID because Get Channel is privileged.
     *
     * @param string $token Twitch token
     *
     * @return JSON Channel object
     */
    public function getChannel($token = null)
    {
        return $this->sendRequest('GET', 'channel', $this->getToken($token));
    }

    /**
     * Gets a specified channel object.
     *
     * @param integer $id Twitch Channel ID
     *
     * @return JSON Channel object
     */
    public function getChannelById($id)
    {
        return $this->sendRequest('GET', 'channels/'.$id);
    }


    /**
     * Updates specified properties of a specified channel.
     * In the request, the new properties are specified as a JSON object or a form-encoded representation.
     *
     * @param integer $id Twitch Channel ID
     * @param array  $options Channel options
     * @param string $token   Twitch token
     *
     * @return JSON Request result
     */
    public function updateChannel($id, $token = null, $rawOptions = [])
    {
        $options = [];

        foreach ($rawOptions as $key => $value) {
            $options['channel['.$key.']'] = $value;
        }

        return $this->sendRequest('PUT', 'channels/'.$id, $this->getToken($token), $options);
    }

    /**
     * Gets a list of users who are editors for a specified channel.
     *
     * @param integer $id Twitch Channel ID
     * @param string $token   Twitch token
     *
     * @return JSON Channel object
     */
    public function getChannelEditors($id, $token = null)
    {
        return $this->sendRequest('GET', 'channels/'.$id.'/editors', $this->getToken($token));
    }

    /**
     * Gets a list of users who follow a specified channel, sorted by the date when they started following the channel (newest first, unless specified 
     * otherwise).
     *
     * @param integer $id Twitch Channel ID
     * @param array  $options Channel options
     *
     * @return JSON Channel object
     */
    public function getChannelFollowers($id, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'cursor', 'direction'];

        return $this->sendRequest('GET', 'channels/'.$id.'/follows', false, $options, $availableOptions);
    }

    /**
     * Gets a list of teams to which a specified channel belongs.
     *
     * @param integer $id Twitch Channel ID
     *
     * @return JSON Channel object
     */
    public function getChannelTeams($id)
    {
        return $this->sendRequest('GET', 'channels/'.$id.'/teams');
    }

    /**
     * Gets a list of users subscribed to a specified channel, sorted by the date when they subscribed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel object
     */
    public function getChannelSubscribers($id, $token = null, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'direction'];
        return $this->sendRequest('GET', 'channels/'.$id.'/subscriptions', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Checks if a specified channel has a specified user subscribed to it. Intended for use by channel owners.
     * Returns a subscription object which includes the user if that user is subscribed. Requires authentication for the channel.
     *
     * @param integer $cid Twitch Channel ID
     * @param integer $id Twitch User ID
     *
     * @return JSON Channel object
     */
    public function checkChannelSubscriptionByUser($cid, $id, $token = null)
    {
        return $this->sendRequest('GET', 'channels/'.$cid.'/subscriptions/'.$id, $this->getToken($token));
    }

    /**
     * Gets a list of VODs (Video on Demand) from a specified channel.
     *
     * @param inter $id Twitch Channel ID
     * @param array  $options Channel options
     *
     * @return JSON Channel object
     */
    public function getChannelVideos($id, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'broadcast_type', 'language', 'sort'];
        return $this->sendRequest('GET', 'channels/'.$id.'/videos', false, $options, $availableOptions);
    }

    /**
     * Run commercial.
     *
     * @param string $id Twitch Channel ID
     * @param number $length  Commercial length
     * @param string $token   Twitch token
     *
     * @return JSON Request result
     */
    public function startChannelCommercial($id, $token = null, $length = 30)
    {
        $availableOptions = ['length'];
        $options = ['length' => $length];

        return $this->sendRequest('POST', 'channels/'.$id.'/commercial', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Deletes the stream key for a specified channel. Once it is deleted, the stream key is automatically reset.
     *
     * A stream key (also known as authorization key) uniquely identifies a stream. Each broadcast uses an RTMP URL that includes the stream key. Stream 
     * keys are assigned by Twitch.
     *
     * @param string $id Twitch Channel ID
     * @param string $token   Twitch token
     *
     * @return JSON Request result with new stream key
     */
    public function resetChannelStreamKey($id, $token = null)
    {
        return $this->sendRequest('DELETE', 'channels/'.$id.'/stream_key', $this->getToken($token));
    }

    /**
     * Gets the community for a specified channel.
     *
     * @param integer $id Twitch Channel ID
     * @param string $token   Twitch token
     *
     * @return JSON Channel object
     */
    public function getChannelCommunity($id, $token = null)
    {
        return $this->sendRequest('GET', 'channels/'.$id.'/community', $this->getToken($token));
    }

    /**
     * Sets a specified channel to be in a specified community.
     *
     * @param integer $id Twitch Channel ID
     * @param string $community Twitch Community ID
     * @param string $token   Twitch token
     *
     * @return JSON Channel object
     */
    public function setChannelCommunity($id, $community, $token = null)
    {
        return $this->sendRequest('PUT', 'channels/'.$id.'/community/'.$community, $this->getToken($token));
    }

    /**
     * Deletes a specified channel from its community.
     *
     * @param integer $id Twitch Channel ID
     * @param string $token   Twitch token
     *
     * @return JSON Channel object
     */
    public function deleteChannelFromCommunity($id, $token = null)
    {
        return $this->sendRequest('DELETE', 'channels/'.$id.'/community', $this->getToken($token));
    }
}
