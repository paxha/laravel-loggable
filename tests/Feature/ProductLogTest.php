<?php

namespace Loggable\Tests\Feature;

use Loggable\Tests\TestCase;


class ProductLogTest extends TestCase
{
    public function testProductShouldHaveLogs()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $beforeActedUpon = $product->getActedUpon();
        $actor = $user->getActor();

        $product->update([
            'name' => 'Changed Name',
        ]);

        $afterActedUpon = $product->getActedUpon();

        $product->delete();
        $logs = $product->logs;

        $this->assertCount(3, $logs);

        $this->assertEquals("New Record ($beforeActedUpon) Created by - $actor", $logs->first()->description);
        $this->assertEquals("A Record ($afterActedUpon) Updated by - $actor", $logs[1]->description);
        $this->assertEquals("A Record ($afterActedUpon) Deleted by - $actor", $logs->last()->description);
    }
}