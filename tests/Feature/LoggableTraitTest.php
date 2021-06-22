<?php

namespace Loggable\Tests\Feature;

use Loggable\Tests\Models\Product;
use Loggable\Tests\TestCase;

class LoggableTraitTest extends TestCase
{
    public function testOnRecordCreateLogShouldBeCreated()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $productName = 'Product 1';
        $product = Product::create([
            'name' => $productName,
        ]);

        $this->assertDatabaseHas('logs', [
            'user_id'       => $user->id,
            'loggable_type' => get_class($product),
            'loggable_id'   => $product->id,
            'description'   => "New Record ($productName) Created by - $user->name",
        ]);
    }
}
