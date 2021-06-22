<?php


namespace Loggable\Tests\Feature;


use Loggable\Tests\Models\Product;
use Loggable\Tests\TestCase;

class LogCreateTest extends TestCase
{
    public function testLogShouldBeCreated()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $this->assertDatabaseHas('logs', [
            'user_id'       => $user->id,
            'loggable_type' => get_class($product),
            'loggable_id'   => $product->id,
            'description'   => "New Record ($product->name) Created by - $user->name",
        ]);
    }
}