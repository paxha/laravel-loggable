<?php

namespace Loggable\Tests\Feature;

use Loggable\Tests\Models\Product;
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

        $this->assertDatabaseHas('logs',[
            'user_id'       => $user->id,
            'loggable_type' => get_class($product),
            'loggable_id'   => $product->id,
            'description'   => "A Record ($product->name) Updated by - $user->name",
        ]);

    }
}
