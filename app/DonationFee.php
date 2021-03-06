<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    public $commissionPercentage;

    /**
     * @return mixed
     */

    public function __construct($donation, $commissionPercentage)
    {
        if ($commissionPercentage > 30 || $commissionPercentage <= 0) {
            throw new \Exception("Vous ne pouvez pas avoir une commission inférieure ou égale à 0 ou supérieure à 30%");
        }
        if ($donation < 100 || !is_int($donation / 100)) {
            throw new \Exception("Le montant de votre don n'est pas correct, ce doit être un entier supérieur ou égal à 1€");
        }
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getCommissionAmount()
    {
        $commission = (($this->donation / 100) * $this->commissionPercentage);
        return $commission;
    }

    public function getAmountCollected()
    {
        $amount = $this->donation - $this->getCommissionAmount();
        return $amount;
    }

    public function getFixedAndCommissionFeeAmount()
    {
        $commission = (($this->donation / 100) * $this->commissionPercentage) + Commission::fixedFee;
        return $commission;
    }

    public function getMaximumCommissionAmount()
    {
        $commission = (($this->donation / 100) * $this->commissionPercentage) + Commission::fixedFee;

        if ($commission <= 500) {
            $commission = $commission;
        } else {
            $commission = 500;
        }
        return $commission;
    }

    public function getSummary(){
        $summary = array(
            'donation' => $this->donation,
            'fixedFee'=>Commission::fixedFee,
            'commission'=>$this->getCommissionAmount(),
            'fixedAndCommission'=>$this->getFixedAndCommissionFeeAmount(),
            'amountCollected'=>$this->donation - $this->getFixedAndCommissionFeeAmount()
        );
            return $summary;

    }

}