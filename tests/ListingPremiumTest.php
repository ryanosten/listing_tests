<?php

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
    protected $listingPremium;

    protected function setup(): void
    {
        $data = [
            'id' => '1',
            'title' => 'title',
            'website' => 'website',
            'email' => 'email',
            'twitter' => 'twitter',
            'description' => 'description'
        ];

        $this->listingPremium = new ListingPremium($data);
    }

    /** @test */
    public function checkGetStatus()
    {

        $this->assertEquals(
            'premium',
            $this->listingPremium->getStatus(),
            'ListingPremium getStatus not working'
        );
    }

    /** @test */
    public function checkGetDescription()
    {

        $this->assertEquals(
            'description',
            $this->listingPremium->getDescription(),
            'ListingPremium getStatus not working'
        );
    }
}
