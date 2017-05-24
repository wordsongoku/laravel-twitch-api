<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://dev.twitch.tv/docs/v5/reference/channel-feed/.
 */
class ChannelFeed extends Api
{
	/**
     * Gets posts from a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel Feed object
     */
    public function getMultipleFeedPosts($id, $token = null, $options = [])
    {
        $availableOptions = ['limit', 'cursor', 'comments'];

        return $this->sendRequest('GET', 'feed/'.$id.'/posts', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Gets a specified post from a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel Feed object
     */
    public function getFeedPost($id, $post, $token = null, $options = [])
    {
    	$availableOptions = ['comments'];

        return $this->sendRequest('GET', 'feed/'.$id.'/posts/'.$post, $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Creates a post in a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $content Content to post on the Channel Feed
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel Feed object
     */
    public function createFeedPost($id, $content, $token = null, $options = [])
    {
    	$availableOptions = ['content', 'share'];
        $options = ['content' => $content];

        return $this->sendRequest('POST', 'feed/'.$id.'/posts', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Deletes a specified post in a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $token   Twitch token
     *
     * @return JSON Channel Feed object
     */
    public function deleteFeedPost($id, $post, $token = null)
    {
        return $this->sendRequest('DELETE', 'feed/'.$id.'/posts/'.$post, $this->getToken($token));
    }

    /**
     * Creates a reaction to a specified post in a specified channel feed. The reaction is specified by an emote value, which is either an ID (for 
     * example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param integer $emote Emote ID OR string $emote Emote Name
     * @param string $token   Twitch token
     *
     * @return JSON Channel Feed object
     */
    public function createReactionToAFeedPost($id, $post, $emote, $token = null)
    {
        return $this->sendRequest('POST', 'feed/'.$id.'/posts/'.$post.'/reactions?emote_id='.$emote, $this->getToken($token));
    }

    /**
     * Deletes a specified reaction to a specified post in a specified channel feed. The reaction is specified by an emote ID (for example, “25” is 
     * Kappa) or the string “endorse” (which corresponds to a default face emote).
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param integer $emote Emote ID OR string $emote Emote Name
     * @param string $token   Twitch token
     *
     * @return JSON Channel Feed object
     */
    public function deleteReactionToAFeedPost($id, $post, $emote, $token = null)
    {
        return $this->sendRequest('DELETE', 'feed/'.$id.'/posts/'.$post.'/reactions?emote_id='.$emote, $this->getToken($token));
    }

    /**
     * Gets all comments on a specified post in a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel Feed object
     */
    public function getFeedComments($id, $post, $token = null, $options = [])
    {
        $availableOptions = ['limit', 'cursor'];

        return $this->sendRequest('GET', 'feed/'.$id.'/posts/'.$post.'/comments', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Creates a comment to a specified post in a specified channel feed.
     * The comment content can be specified either as a query-string parameter or in the request body (in x-www-form-urlencoded format).
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $content Content to post on the Channel Feed
     * @param string $token   Twitch token
     * @param array  $options Channel options
     *
     * @return JSON Channel Feed object
     */
    public function createFeedComment($id, $post, $content, $token = null, $options = [])
    {
        $availableOptions = ['content'];
        $options = ['content' => $content];

        return $this->sendRequest('POST', 'feed/'.$id.'/posts/'.$post.'/comments', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Deletes a specified comment on a specified post in a specified channel feed.
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $comment Twitch Comment ID
     *
     * @return JSON Channel Feed object
     */
    public function deleteFeedComment($id, $post, $comment, $token = null)
    {
        return $this->sendRequest('DELETE', 'feed/'.$id.'/posts/'.$post.'/comments/'.$comment, $this->getToken($token));
    }

    /**
     * Creates a reaction to a specified comment on a specified post in a specified channel feed. The reaction is specified by an emote value, which is 
     * either an ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).
     *
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $comment Twitch Comment ID
     * @param integer $emote Emote ID OR string $emote Emote Name
     * @param string $token Twitch token
     *
     * @return JSON Channel Feed object
     */
    public function createReactionToAFeedComment($id, $post, $comment, $emote, $token = null)
    {
        return $this->sendRequest('POST', 'feed/'.$id.'/posts/'.$post.'/comments/'.$comment.'/reactions?emote_id='.$emote, $this->getToken($token));
    }

    /**
     * Deletes a reaction to a specified comment on a specified post in a specified channel feed. The reaction is specified by an emote value, which is 
     * either an ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).
     * @param integer $id Twitch Channel ID
     * @param string $post Twitch Post ID
     * @param string $comment Twitch Comment ID
     * @param integer $emote Emote ID OR string $emote Emote Name
     * @param string $token  Twitch token
     *
     * @return JSON Channel Feed object
     */
    public function deleteReactionToAFeedComment($id, $post, $comment, $emote, $token = null)
    {
        return $this->sendRequest('DELETE', 'feed/'.$id.'/posts/'.$post.'/comments/'.$comment.'/reactions?emote_id='.$emote, $this->getToken($token));
    }

}