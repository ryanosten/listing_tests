<?php

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
    protected $listingFeatured;

    protected function setup(): void
    {
        $data = [
            'id' => '1',
            'title' => 'title',
            'website' => 'website',
            'email' => 'email',
            'twitter' => 'twitter',
            'description' => 'description',
            'coc' => 'coc'
        ];

        $this->listingFeatured = new ListingFeatured($data);
    }

    /** @test */

    public function checkGetStatus()
    {
        $this->assertEquals(
          'featured',
          $this->listingFeatured->getStatus(),
          'status doesnt equal featured'
        );
    }

    /** @test */
    public function checkGetCoc()
    {
        $this->assertEquals(
            'coc',
            $this->listingFeatured->getCoc(),
            'status doesnt equal featured'
        );
    }

}