<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/chat/.
 */
class Chat extends Api
{
    /**
     * Gets a list of badges that can be used in chat for a specified channel.
     *
     * @param integer $id Twitch Channel ID
     *
     * @return JSON Chat badges
     */
    public function getChatBadgesByChannel($id)
    {
        return $this->sendRequest('GET', 'chat/'.$id.'/badges');
    }

    /**
     * Gets all chat emoticons (not including their images) in one or more specified sets.
     *
     * @param integer $id Twitch Channel ID
     *
     * @return JSON Chat badges
     */
    public function getChatEmoticonsBySet($options = [])
    {
        $availableOptions = ['emotesets'];
        return $this->sendRequest('GET', 'chat/emoticon_images', false, $options, $availableOptions);
    }

    /**
     * Gets all chat emoticons (including their images)..
     *
     * @return JSON List of emoticons
     */
    public function getAllChatEmoticons()
    {
        return $this->sendRequest('GET', 'chat/emoticons');
    }
}
