<?php
namespace bunq\test\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\Model\Generated\Endpoint\DraftShareInviteBank;
use bunq\Model\Generated\Endpoint\DraftShareInviteBankQrCodeContent;
use bunq\Model\Generated\Object\DraftShareInviteBankEntry;
use bunq\Model\Generated\Object\ShareDetail;
use bunq\Model\Generated\Object\ShareDetailReadOnly;
use bunq\test\BunqSdkTestBase;
use bunq\test\Config;

/**
 * Tests
 *  DraftShareInviteBankEntry
 *  DraftShareInviteBankQrCodeContent
 */
class DraftShareInviteBankQrCodeContentTest extends BunqSdkTestBase
{
    /**
     * The file path to where to write the generated qr code.
     */
    const PATH_QR_OUTPUT = 'connectQr.png';

    /**
     * The format the date should formatted as before the request is send.
     */
    const FORMAT_MICROTIME = 'm/d/Y h:i:s.000000';

    /**
     *  Amount of time to add to the expiration date when creating a draft share.
     */
    const EXPIRATION_ADDED_TIME = '+1 hour';

    /**
     * @var int
     */
    private static $userId;

    /**
     * @var string
     */
    private static $expirationDate;

    /**
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        static::$userId = Config::getUserId();
        static::$expirationDate = date(self::FORMAT_MICROTIME, strtotime(self::EXPIRATION_ADDED_TIME));
    }

    /**
     * Test creating a draft share invite and get its qr code.
     *
     * This test has no assertion as of its testing to see if the code runs without errors.
     */
    public function testCreateDraftShareAndGetGr()
    {
        $apiContext = static::getApiContext();

        $draftShareId = $this->createConnect($apiContext);
        $qrContent = $this->getQrContent($apiContext, $draftShareId);
        file_put_contents(self::PATH_QR_OUTPUT, $qrContent);
    }

    /**
     * @param ApiContext $apiContext
     *
     * @return int
     */
    private function createConnect(ApiContext $apiContext): int
    {
        $readOnly = new ShareDetailReadOnly(true, true, true);
        $shareDetail = new ShareDetail();
        $shareDetail->setReadOnly($readOnly);
        $draftMap = [
            DraftShareInviteBank::FIELD_EXPIRATION => static::$expirationDate,
            DraftShareInviteBank::FIELD_DRAFT_SHARE_SETTINGS => new DraftShareInviteBankEntry($shareDetail),
        ];

        return DraftShareInviteBank::create($apiContext, $draftMap, static::$userId)->getValue();
    }

    /**
     * @param ApiContext $apiContext
     * @param int $draftShareId
     *
     * @return string
     */
    private function getQrContent(ApiContext $apiContext, int $draftShareId): string
    {
        return DraftShareInviteBankQrCodeContent::listing($apiContext, static::$userId, $draftShareId)->getValue();
    }
}
