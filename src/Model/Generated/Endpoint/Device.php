<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\BunqModel;

/**
 * Used to get a Device or a listing of Devices. Creating a DeviceServer
 * should happen via /device-server
 *
 * @generated
 */
class Device extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'device/%s';
    const ENDPOINT_URL_LISTING = 'device';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'Device';

    /**
     * @var DevicePhone
     */
    protected $devicePhone;

    /**
     * @var DeviceServer
     */
    protected $deviceServer;

    /**
     * Get a single Device. A Device is either a DevicePhone or a DeviceServer.
     *
     * @param ApiContext $apiContext
     * @param int $deviceId
     * @param string[] $customHeaders
     *
     * @return BunqResponseDevice
     */
    public static function get(ApiContext $apiContext, int $deviceId, array $customHeaders = []): BunqResponseDevice
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$deviceId]
            ),
            [],
            $customHeaders
        );

        return BunqResponseDevice::castFromBunqResponse(
            static::fromJson($responseRaw)
        );
    }

    /**
     * Get a collection of Devices. A Device is either a DevicePhone or a
     * DeviceServer.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseDeviceList
     */
    public static function listing(ApiContext $apiContext, array $params = [], array $customHeaders = []): BunqResponseDeviceList
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                []
            ),
            $params,
            $customHeaders
        );

        return BunqResponseDeviceList::castFromBunqResponse(
            static::fromJsonList($responseRaw)
        );
    }

    /**
     * @return DevicePhone
     */
    public function getDevicePhone()
    {
        return $this->devicePhone;
    }

    /**
     * @param DevicePhone $devicePhone
     */
    public function setDevicePhone($devicePhone)
    {
        $this->devicePhone = $devicePhone;
    }

    /**
     * @return DeviceServer
     */
    public function getDeviceServer()
    {
        return $this->deviceServer;
    }

    /**
     * @param DeviceServer $deviceServer
     */
    public function setDeviceServer($deviceServer)
    {
        $this->deviceServer = $deviceServer;
    }
}
