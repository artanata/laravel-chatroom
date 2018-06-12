<?php

namespace Tests\Unit;

use App\User;
use App\Room;
use App\Message;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanAddRoom()
    {
        $user = factory(User::class)->create();
        $room = factory(Room::class)->create();

        $user->addRoom($room);

        $found = $user->rooms->where('id', $room->id)->first();

        $this->assertInstanceOf(Room::class, $found);
        $this->assertEquals($room->id, $found->id);
    }
}