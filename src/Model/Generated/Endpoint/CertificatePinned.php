<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\BunqModel;

/**
 * This endpoint allow you to pin the certificate chains to your account.
 * These certificate chains are used for SSL validation whenever a callback
 * is initiated to one of your https callback urls.
 *
 * @generated
 */
class CertificatePinned extends BunqModel
{
    /**
     * Field constants.
     */
    const FIELD_CERTIFICATE_CHAIN = 'certificate_chain';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/certificate-pinned';
    const ENDPOINT_URL_DELETE = 'user/%s/certificate-pinned/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/certificate-pinned';
    const ENDPOINT_URL_READ = 'user/%s/certificate-pinned/%s';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'CertificatePinned';

    /**
     * The certificate chain in .PEM format. Certificates are glued with newline
     * characters.
     *
     * @var string
     */
    protected $certificateChain;

    /**
     * The id generated for the pinned certificate chain.
     *
     * @var int
     */
    protected $id;

    /**
     * Pin the certificate chain.
     *
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param string[] $customHeaders
     *
     * @return BunqResponseInt
     */
    public static function create(ApiContext $apiContext, array $requestMap, int $userId, array $customHeaders = []): BunqResponseInt
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [$userId]
            ),
            $requestMap,
            $customHeaders
        );

        return BunqResponseInt::castFromBunqResponse(
            static::processForId($responseRaw)
        );
    }

    /**
     * Remove the pinned certificate chain with the specific ID.
     *
     * @param ApiContext $apiContext
     * @param string[] $customHeaders
     * @param int $userId
     * @param int $certificatePinnedId
     *
     * @return BunqResponseNull
     */
    public static function delete(ApiContext $apiContext, int $userId, int $certificatePinnedId, array $customHeaders = []): BunqResponseNull
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->delete(
            vsprintf(
                self::ENDPOINT_URL_DELETE,
                [$userId, $certificatePinnedId]
            ),
            $customHeaders
        );

        return BunqResponseNull::castFromBunqResponse(
            new BunqResponse(null, $responseRaw->getHeaders())
        );
    }

    /**
     * List all the pinned certificate chain for the given user.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseCertificatePinnedList
     */
    public static function listing(ApiContext $apiContext, int $userId, array $params = [], array $customHeaders = []): BunqResponseCertificatePinnedList
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

        return BunqResponseCertificatePinnedList::castFromBunqResponse(
            static::fromJsonList($responseRaw, self::OBJECT_TYPE)
        );
    }

    /**
     * Get the pinned certificate chain with the specified ID.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $certificatePinnedId
     * @param string[] $customHeaders
     *
     * @return BunqResponseCertificatePinned
     */
    public static function get(ApiContext $apiContext, int $userId, int $certificatePinnedId, array $customHeaders = []): BunqResponseCertificatePinned
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $certificatePinnedId]
            ),
            [],
            $customHeaders
        );

        return BunqResponseCertificatePinned::castFromBunqResponse(
            static::fromJson($responseRaw, self::OBJECT_TYPE)
        );
    }

    /**
     * The certificate chain in .PEM format. Certificates are glued with newline
     * characters.
     *
     * @return string
     */
    public function getCertificateChain()
    {
        return $this->certificateChain;
    }

    /**
     * @param string $certificateChain
     */
    public function setCertificateChain($certificateChain)
    {
        $this->certificateChain = $certificateChain;
    }

    /**
     * The id generated for the pinned certificate chain.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
