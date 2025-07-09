<?php

namespace Test\Feature;

use App\Models\Customers;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;



class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/customer', [
            'name' => 'New Name',
            'phone' => 'New Phone',
            'address' => 'New Address',
        ]);

        $response->assertRedirect('/customer');
        $this->assertDatabaseHas('customers', [
            'name' => 'New Name',
            'phone' => 'New Phone',
            'address' => 'New Address',
        ]);

        $response->assertSessionHasErrors((['name' => 'name has already been taken', 'phone' => 'phone has already been taken']));
    }

    public function test_customer_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $customer = Customers::factory()->create([
            'name' => 'New Name',
            'phone' => 'New Phone',
            'address' => 'New Address',
        ]);

        $response = $this->put("/customer/{$customer->id}", [
            'name' => 'Update Name',
            'phone' => 'Update Phone',
            'address' => 'Update Address',
        ]);

        $response->assertRedirect('/customer');
        $this->assertDatabaseHas('customers', [
            'name' => 'Update Name',
            'phone' => 'Update Phone',
            'address' => 'Update Address',
        ]);
    }

    // public function test_customer_deletion()
    // {
    //     $user = User::factory()->create();
    //         $this->actingAs($user);

    //     $customer = Customers::factory()->create([
    //         'name' => 'New Name',
    //         'phone' => 'New Phone',
    //         'address' => 'New Address',
    //         ]);

    //     $response = $this->put("/customer/{$customer->id}", [
    //         'name' => 'Update Name',
    //         'phone' => 'Update Phone',
    //         'address' => 'Update Address',
    //         ]);

    //     $response->assertRedirect('/customer');
    //     $this->assertDatabaseHas('customers', [
    //         'name' => 'Update Name',
    //         'phone' => 'Update Phone',
    //         'address' => 'Update Address',
    //         ]);
    // }
}
