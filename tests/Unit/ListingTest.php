<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Listing;

class ListingTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test the listing model's factory method.
     *
     * @return void
     */
    
    public function setUp(): void
    {
        parent::setUp();
        $this->listing = factory(Listing::class)->create();
    }

    public function testListingFactory()
    {

        $this->assertDatabaseHas('listings', [
            'location' => $this->listing->location,
            'price' => $this->listing->price,
            'availability' => $this->listing->availability,
            'type' => $this->listing->type,
            'square_metres' => $this->listing->square_metres,
        ]);
    }

    /**
     * Test the listing model's location attribute.
     *
     * @return void
     */
    public function testListingLocationAttribute()
    {
        $listing = factory(Listing::class)->create();

        $this->assertIsString($this->listing->location);
    }

    /**
     * Test the listing model's price attribute.
     *
     * @return void
     */
    public function testListingPriceAttribute()
    {
        $listing = factory(Listing::class)->create();

        $this->assertIsInt($this->listing->price);
    }

    /**
     * Test the listing model's availability attribute.
     *
     * @return void
     */
    public function testListingAvailabilityAttribute()
    {
        $listing = factory(Listing::class)->create();

        $this->assertContains($this->listing->availability, ['rent', 'sale']);
    }

    /**
     * Test the listing model's type attribute.
     *
     * @return void
     */
    public function testListingTypeAttribute()
    {
        $listing = factory(Listing::class)->create();

        $this->assertContains($this->listing->type, [
            'apartment', 'studio', 'loft', 'maisonette'
        ]);
    }

    /**
     * Test the listing model's square_metres attribute.
     *
     * @return void
     */
    public function testListingSquareMetresAttribute()
    {
        $listing = factory(Listing::class)->create();

        $this->assertGreaterThanOrEqual(20, $this->listing->square_metres);
        $this->assertLessThanOrEqual(10000, $this->listing->square_metres);
    }
}
