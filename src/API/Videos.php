<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/videos/.
 */
class Videos extends Api
{
    /**
     * Gets a specified video object.
     *
     * @param string $id Video ID, including the prefixed letter, example: c6055863
     *
     * @return JSON Video object
     */
    public function getVideo($id)
    {
        return $this->sendRequest('GET', 'videos/'.$id);
    }

    /**
     *  Gets the top videos based on viewcount, optionally filtered by game or time period.
     *
     * @param array $options Video list options
     *
     * @return JSON List of videos
     */
    public function getTopVideos($options = [])
    {
        $availableOptions = ['limit', 'offset', 'game', 'period', 'broadcast_type', 'language', 'sort'];

        return $this->sendRequest('GET', 'videos/top', false, $options, $availableOptions);
    }

    /**
     * Gets the videos from channels followed by a user, based on a specified OAuth token.
     *
     * @param string $token Twitch token
     * @param array  $options Video list options
     *
     * @return JSON List of videos
     */
    public function getFollowedVideos($token = null, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'broadcast_type', 'language', 'sort'];

        return $this->sendRequest('GET', 'videos/followed', $this->getToken($token), $options, $availableOptions);
    }

    /*
    MISSING:
    Create Video
    Upload Video Part
    Complete Video Upload
    Update Video
    Delete Video
    */
}
