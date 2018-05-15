<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 10;
        $this->assertEquals($expected, $actual);
    }

    public function testAmountCollectedGetter()
    {
        //Etant donné qu'une commission est de 10%
        $donationFees = new DonationFee(100, 10);

        //Lorsqu'un don est versé
        $actual = $donationFees->getAmountCollected();

        //Alors la montant perçu est de Montant versé  - Commission
        $expected = 90;
        $this->assertEquals($expected, $actual);
    }
}
