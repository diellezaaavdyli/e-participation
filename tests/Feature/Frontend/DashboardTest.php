<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/dashboard')->assertRedirect('/login');

        $this->actingAs(factory(User::class)->state('user')->create());

        $this->get('/dashboard')->assertOk();
    }
}
