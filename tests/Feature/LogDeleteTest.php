<?php

namespace Loggable\Tests\Feature;

use Loggable\Models\Log;
use Loggable\Tests\TestCase;

class LogDeleteTest extends TestCase
{
    public function testLogShouldBeUpdatedOnDelete()
    {
        $user = $this->getUser();
        $this->actingAs($user);

        $product = $this->getProduct();

        $product->delete();

        $log = Log::where('loggable_type', get_class($product))->where('loggable_id', $product->id)->get()->last();

        $this->assertEquals("A Record ($product->name) Deleted by - $user->name", $log->description);

        $this->assertEquals($product->toJson(), $log->before);

        $this->assertEquals($product->toJson(), $log->after);
    }
}
