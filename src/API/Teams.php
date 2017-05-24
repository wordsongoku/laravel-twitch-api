<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/teams/.
 */
class Teams extends Api
{
    /**
     * List of active streams.
     *
     * @param array $options Active stream list options
     *
     * @return JSON List of streams
     */
    public function getAllTeams($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'teams', false, $options, $availableOptions);
    }

    /**
     * Get a team object.
     *
     * @param string $team Team name
     *
     * @return JSON Team object
     */
    public function getTeam($team)
    {
        return $this->sendRequest('GET', 'teams/'.$team);
    }
}
