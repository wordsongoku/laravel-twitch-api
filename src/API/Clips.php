<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/clips/.
 */
class Clips extends Api
{
	/**
     * Gets details about a specified Clip. Clips are referenced by a globally unique string called a slug.
     *
     * @param string $slug Clip Slug
     *
     * @return JSON Clips object
     */
    public function getClips($slug)
    {
        return $this->sendRequest('GET', 'clips/'.$slug);
    }

    /**
     * Gets the top Clips which meet a specified set of parameters.
     *
     * @param array  $options Channel options
     *
     * @return JSON Clips object
     */
    public function getTopClips($options = [])
    {
    	$availableOptions = ['channel', 'cursor', 'game', 'language', 'limit', 'period', 'trending'];

        return $this->sendRequest('GET', 'clips/top', false, $options, $availableOptions);
    }

    /**
     * Gets the top Clips for the games followed by a specified user, identified by an OAuth token.
     *
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Clips object
     */
    public function getFollowedClips($token = null, $options = [])
    {
    	$availableOptions = ['limit', 'cursor', 'trending'];

        return $this->sendRequest('GET', 'clips/followed', $this->getToken($token), $options, $availableOptions);
    }
}