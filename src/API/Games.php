<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/games/.
 */
class Games extends Api
{
    /**
     * Gets games sorted by number of current viewers on Twitch, most popular first.
     *
     * @param array $options List options
     *
     * @return JSON List of games
     */
    public function getTopGames($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'games/top', false, $options, $availableOptions);
    }
}
