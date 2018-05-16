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

    public function testExceptionGetter()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 40);
   }


//Autre méthode pour lever une exception mais cette fois, l'exception est rouge et non pas verte

//    public function testExceptionGetter()
//    {
//        //Etant donné qu'une commission doit être comprise entre 0 et 30%
//       $donationFees = new DonationFee(100, 31);
//
//        //Lorsqu'une commission est prélevée
//        $actual = $donationFees->getCommissionAmount();
//
//        //Alors on retourne une exception
//        $expected = 31;
//        $this->assertGreaterThan($actual, $expected);
//    }

    public function testFeeAmountGetter()
    {
        //Etant donné qu'un don doit être un entier positif >=100
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(1555.55, 10);

        //Lorsqu'un don est inférieur à 100 ou a des décimales ou est un négatif


        //Alors il faut lever une exception
    }

    public function testFixedAndCommissionFeedAmountGetter()
    {
        //Etant donné qu'un don de 100 doit être taxé de 10%
        $donationFees = new DonationFee(100, 10);

        //Lorsqu'on appelle getFixedAndCommissionFeeAmount()
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        //Alors la commission doit être égale aux frais fixes + 10%
        $expected = 60;
        $this->assertEquals($actual, $expected);
    }
}
