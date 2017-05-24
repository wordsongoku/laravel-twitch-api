<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/ingests/.
 */
class Ingests extends Api
{
    /**
     * Gets a list of Twitch ingest servers.
     *
     * @return JSON List of servers/ingests
     */
    public function getIngestServerList()
    {
        return $this->sendRequest('GET', 'ingests');
    }
}
