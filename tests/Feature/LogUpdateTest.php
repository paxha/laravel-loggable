<?php

namespace Loggable\Tests\Feature;

use Loggable\Models\Log;
use Loggable\Tests\TestCase;

class LogUpdateTest extends TestCase
{
    public function testLogShouldBeUpdated()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $product->update([
            'name' => 'Changed Name'
        ]);

        $this->assertDatabaseHas('logs', [
            'user_id' => $user->id,
            'loggable_type' => get_class($product),
            'loggable_id' => $product->id,
        ]);

    }

    public function testLogData()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $existingProduct = $product->toJson();

        $product->update([
            'name' => 'Changed Name',
        ]);

        $log = Log::where('loggable_type', get_class($product))->where('loggable_id', $product->id)->get()->last();

        $this->assertEquals("A Record ($product->name) Updated by - $user->name", $log->description);

        $this->assertEquals($existingProduct, $log->before);

        $this->assertEquals($product->toJson(), $log->after);
    }
}
