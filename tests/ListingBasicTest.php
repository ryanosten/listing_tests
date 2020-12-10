<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
    protected $data;

    protected function setup(): void
    {
        $data = [
            'id' => '1',
            'title' => 'title',
            'website' => 'website',
            'email' => 'email',
            'twitter' => 'twitter',
            'image' => null
        ];

        $this->data = $data;
    }

    /** @test */
    function createListingBasicMustReceiveDataArgumentMessage()
    {

        $this->expectExceptionMessage('Unable to create a listing, data unavailable');
        $listingBasic = new ListingBasic();
    }

    /** @test  */

    function setValuesMustReceiveIdMessage()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid id');
        unset($this->data['id']);
        $listingBasic = new ListingBasic($this->data);
    }

    /** @test  */
    function setValuesMustReceiveTitleMessage()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid title');
        unset($this->data['title']);
        $listingBasic = new ListingBasic($this->data);
    }

    /** @test */
    function checkSetValues() {
        $listingBasic = new ListingBasic($this->data);

        $newData = [
            'id' => '2',
            'title' => 'newtitle',
            'website' => 'newwebsite',
            'email' => 'newemail',
            'twitter' => 'newtwitter',
            'status' => 'newstatus',
            'image' => 'newimage'
        ];

        $listingBasic->setValues($newData);

        $this->assertEquals(
            [
                'id' => '2',
                'title' => 'newtitle',
                'website' => 'http://newwebsite',
                'email' => 'newemail',
                'twitter' => 'newtwitter',
                'status' => 'newstatus',
                'image' => '//newimage'
            ],
            $listingBasic->toArray()
        );
    }

    /** @test */
    function listingBasicObjectIsCreated()
    {
        $minimumData = [
            'id' => '1',
            'title' => 'title',
        ];

        $listingBasic = new ListingBasic($minimumData);

        $this->assertInstanceOf(ListingBasic::class, $listingBasic);
    }

    /** @test */
    function checkGetStatusReturnsBasic()
    {


        $listingBasic = new ListingBasic($this->data);

        $this->assertEquals(
            'basic',
            $listingBasic->getStatus()
        );

    }

    /** @test */
    function checkGetProperties()
    {

        $listingBasic = new ListingBasic($this->data);

        $this->assertEquals(
            '1',
            $listingBasic->getId(),
            "id doesnt match"
        );

        $this->assertEquals(
            'title',
            $listingBasic->getTitle(),
            "Title doesnt match"
        );

        $this->assertEquals(
            'http://website',
            $listingBasic->getWebsite(),
            "Website doesnt match"
        );

        $this->assertEquals(
            'email',
            $listingBasic->getEmail(),
            "email doesnt match"
        );

        $this->assertEquals(
            'twitter',
            $listingBasic->getTwitter(),
            "Twitter doesnt match"
        );
    }

    /** @test */
    function checktoArray()
    {

        $listingBasic = new ListingBasic($this->data);

        $this->assertEquals(
            [
                'id' => '1',
                'title' => 'title',
                'website' => 'http://website',
                'email' => 'email',
                'twitter' => 'twitter',
                'status' => "basic",
                'image' => null
            ],
            $listingBasic->toArray(),
            "array does not match"
        );

    }

    /** @test  */
    function testSetImage()
    {
        $listingBasic = new ListingBasic($this->data);

        $listingBasic->setImage('https://test.com');

        $this->assertEquals(
            'https://test.com',
            $listingBasic->getImage()
        );
    }

    /** @test */
    function testSetWebsite()
    {
        unset($this->data['website']);
        $listingBasic = new ListingBasic($this->data);

        $listingBasic->setWebsite('http://newwebsite.com');

        $this->assertEquals(
            'http://newwebsite.com',
            $listingBasic->getWebsite()
        );

        $newListingBasic = new ListingBasic($this->data);

        $newListingBasic->setWebsite(null);

        $this->assertEquals(
            null,
            $newListingBasic->getWebsite()
        );

    }

    /** @test */
    function testSetStatus()
    {
        unset($this->data['website']);
        $listingBasic = new ListingBasic($this->data);

        $listingBasic->setStatus('');

        $this->assertEquals(
            'basic',
            $listingBasic->getStatus()
        );

        $newListingBasic = new ListingBasic($this->data);

        $newListingBasic->setStatus('premium');

        $this->assertEquals(
            'premium',
            $newListingBasic->getStatus()
        );

    }
}