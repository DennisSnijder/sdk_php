<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\BunqModel;

/**
 * Manages user's conversations.
 *
 * @generated
 */
class ChatConversation extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_LISTING = 'user/%s/chat-conversation';
    const ENDPOINT_URL_READ = 'user/%s/chat-conversation/%s';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'ChatConversation';

    /**
     * @var ChatConversationSupportExternal
     */
    protected $supportConversationExternal;

    /**
     * @var ChatConversationReference
     */
    protected $chatConversationReference;

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseChatConversationList
     */
    public static function listing(ApiContext $apiContext, int $userId, array $params = [], array $customHeaders = []): BunqResponseChatConversationList
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseChatConversationList::castFromBunqResponse(
            static::fromJsonList($responseRaw)
        );
    }

    /**
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $chatConversationId
     * @param string[] $customHeaders
     *
     * @return BunqResponseChatConversation
     */
    public static function get(ApiContext $apiContext, int $userId, int $chatConversationId, array $customHeaders = []): BunqResponseChatConversation
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $chatConversationId]
            ),
            [],
            $customHeaders
        );

        return BunqResponseChatConversation::castFromBunqResponse(
            static::fromJson($responseRaw)
        );
    }

    /**
     * @return ChatConversationSupportExternal
     */
    public function getSupportConversationExternal()
    {
        return $this->supportConversationExternal;
    }

    /**
     * @param ChatConversationSupportExternal $supportConversationExternal
     */
    public function setSupportConversationExternal($supportConversationExternal)
    {
        $this->supportConversationExternal = $supportConversationExternal;
    }

    /**
     * @return ChatConversationReference
     */
    public function getChatConversationReference()
    {
        return $this->chatConversationReference;
    }

    /**
     * @param ChatConversationReference $chatConversationReference
     */
    public function setChatConversationReference($chatConversationReference)
    {
        $this->chatConversationReference = $chatConversationReference;
    }
}
