<?php

namespace Loggable\Tests\Feature;

use Loggable\Tests\Models\Product;
use Loggable\Tests\TestCase;

class LogDeleteTest extends TestCase
{
    public function testLogShouldBeUpdatedOnDelete()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $product->delete();

        $this->assertDatabaseHas('logs',[
            'user_id'       => $user->id,
            'loggable_type' => get_class($product),
            'loggable_id'   => $product->id,
            'description'   => "A Record ($product->name) Deleted by - $user->name",
        ]);

    }
}
