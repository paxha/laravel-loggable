<?php


namespace Loggable\Tests\Feature;


use Loggable\Models\Log;
use Loggable\Tests\TestCase;

class LogCreateTest extends TestCase
{
    public function testLogShouldBeCreated()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

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

        $log = Log::where('loggable_type', get_class($product))->where('loggable_id', $product->id)->first();

        $this->assertEquals("New Record ($product->name) Created by - $user->name", $log->description);

        $this->assertEquals('[]', $log->before);

        $this->assertJsonStringEqualsJsonString($product->toJson(), $log->after);
    }
}