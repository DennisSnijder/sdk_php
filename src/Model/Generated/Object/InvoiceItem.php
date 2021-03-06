<?php
namespace bunq\Model\Generated\Object;

use bunq\Model\Core\BunqModel;

/**
 * @generated
 */
class InvoiceItem extends BunqModel
{
    /**
     * The billing date of the item.
     *
     * @var string
     */
    protected $billingDate;

    /**
     * The price description.
     *
     * @var string
     */
    protected $typeDescription;

    /**
     * The translated price description.
     *
     * @var string
     */
    protected $typeDescriptionTranslated;

    /**
     * The unit item price excluding VAT.
     *
     * @var Amount
     */
    protected $unitVatExclusive;

    /**
     * The unit item price including VAT.
     *
     * @var Amount
     */
    protected $unitVatInclusive;

    /**
     * The VAT tax fraction.
     *
     * @var float
     */
    protected $vat;

    /**
     * The number of items priced.
     *
     * @var float
     */
    protected $quantity;

    /**
     * The item price excluding VAT.
     *
     * @var Amount
     */
    protected $totalVatExclusive;

    /**
     * The item price including VAT.
     *
     * @var Amount
     */
    protected $totalVatInclusive;

    /**
     * The billing date of the item.
     *
     * @return string
     */
    public function getBillingDate()
    {
        return $this->billingDate;
    }

    /**
     * @param string $billingDate
     */
    public function setBillingDate($billingDate)
    {
        $this->billingDate = $billingDate;
    }

    /**
     * The price description.
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->typeDescription;
    }

    /**
     * @param string $typeDescription
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;
    }

    /**
     * The translated price description.
     *
     * @return string
     */
    public function getTypeDescriptionTranslated()
    {
        return $this->typeDescriptionTranslated;
    }

    /**
     * @param string $typeDescriptionTranslated
     */
    public function setTypeDescriptionTranslated($typeDescriptionTranslated)
    {
        $this->typeDescriptionTranslated = $typeDescriptionTranslated;
    }

    /**
     * The unit item price excluding VAT.
     *
     * @return Amount
     */
    public function getUnitVatExclusive()
    {
        return $this->unitVatExclusive;
    }

    /**
     * @param Amount $unitVatExclusive
     */
    public function setUnitVatExclusive($unitVatExclusive)
    {
        $this->unitVatExclusive = $unitVatExclusive;
    }

    /**
     * The unit item price including VAT.
     *
     * @return Amount
     */
    public function getUnitVatInclusive()
    {
        return $this->unitVatInclusive;
    }

    /**
     * @param Amount $unitVatInclusive
     */
    public function setUnitVatInclusive($unitVatInclusive)
    {
        $this->unitVatInclusive = $unitVatInclusive;
    }

    /**
     * The VAT tax fraction.
     *
     * @return float
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * The number of items priced.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * The item price excluding VAT.
     *
     * @return Amount
     */
    public function getTotalVatExclusive()
    {
        return $this->totalVatExclusive;
    }

    /**
     * @param Amount $totalVatExclusive
     */
    public function setTotalVatExclusive($totalVatExclusive)
    {
        $this->totalVatExclusive = $totalVatExclusive;
    }

    /**
     * The item price including VAT.
     *
     * @return Amount
     */
    public function getTotalVatInclusive()
    {
        return $this->totalVatInclusive;
    }

    /**
     * @param Amount $totalVatInclusive
     */
    public function setTotalVatInclusive($totalVatInclusive)
    {
        $this->totalVatInclusive = $totalVatInclusive;
    }
}
