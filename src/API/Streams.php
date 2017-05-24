<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/streams/.
 */
class Streams extends Api
{
    /**
     * Gets stream information (the stream object) for a specified user.
     *
     * @param integer $id Twitch Channel ID
     * @param arrat $options List options
     *
     * @return JSON Stream object
     */
    public function getStreamByUser($id, $options = [])
    {
        $availableOptions = ['stream_type'];
        return $this->sendRequest('GET', 'streams/'.$id, false, $options, $availableOptions);
    }

    /**
     * Gets a list of live streams.
     *
     * @param arrat $options List options
     *
     * @return JSON List of streams
     */
    public function getLiveStreams($options = [])
    {
        $availableOptions = ['channel', 'game', 'language', 'stream_type', 'limit', 'offset'];

        return $this->sendRequest('GET', 'streams', false, $options, $availableOptions);
    }

    /**
     * Gets a summary of live streams.
     *
     * @param array $options Active streams list options
     *
     * @return JSON List of active streams
     */
    public function getStreamsSummary($options = [])
    {
        $availableOptions = ['game'];

        return $this->sendRequest('GET', 'streams/summary', false, $options, $availableOptions);
    }

    /**
     * Gets a list of all featured live streams.
     *
     * @param array $options Featured stream list options
     *
     * @return JSON List of featured/promoted streams
     */
    public function getFeaturedStreams($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'streams/featured', false, $options, $availableOptions);
    }

    /**
     * Gets a list of online streams a user is following, based on a specified OAuth token.
     *
     * @param string $token Twitch token
     * @param array $options Featured stream list options
     *
     * @return JSON List of online streams a user is following, based on a specified OAuth token.
     */
    public function getFollowedStreams($token = null, $options = [])
    {
        $availableOptions = ['stream_type', 'limit', 'offset'];

        return $this->sendRequest('GET', 'streams/followed', $this->getToken($token), $options, $availableOptions);
    }

}
