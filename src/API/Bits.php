<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/bits/.
 */
class Bits extends Api
{
    /**
     * Retrieves the list of available cheermotes, animated emotes to which viewers can assign bits, to cheer in chat. The cheermotes returned are 
     * available throughout Twitch, in all bits-enabled channels.
     *
     * @param $options List options
     *
     * @return JSON Bits object
     */
    public function getCheermotes($options = [])
    {
        $availableOptions = ['channel_id'];

        return $this->sendRequest('GET', 'bits/actions', false, $options, $availableOptions);
    }
}
