<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/search/.
 */
class Search extends Api
{
    /**
     * Searches for channels based on a specified query parameter. A channel is returned if the query parameter is matched entirely or partially, in the 
     * channel description or game name.
     *
     * @param string $query Search term
     * @param string $options Search options
     *
     * @return JSON Search results
     */
    public function searchChannels($query = null, $options)
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'search/channels?query='.$query, false, $options, $availableOptions);
    }

    /**
     * Searches for channels based on a specified query parameter. A channel is returned if the query parameter is matched entirely or partially, in the 
     * channel description or game name.
     *
     * @param string $query Search term
     * @param string $options Search options
     *
     * @return JSON Search results
     */
    public function searchGames($query = null, $options)
    {
        $availableOptions = ['live'];

        return $this->sendRequest('GET', 'search/games?query='.$query, false, $options, $availableOptions);
    }

    /**
     * Searches for streams based on a specified query parameter. A stream is returned if the query parameter is matched entirely or partially, in the 
     * channel description or game name.
     *
     * @param string $query Search term
     * @param string $options Search options
     *
     * @return JSON Search results
     */
    public function searchStreams($query = null, $options)
    {
        $availableOptions = ['limit', 'offset', 'hls'];

        return $this->sendRequest('GET', 'search/streams?query='.$query, false, $options, $availableOptions);
    }
}
