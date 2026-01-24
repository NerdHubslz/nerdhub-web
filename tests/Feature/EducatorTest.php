<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EducatorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_educators_page_can_be_rendered(): void
    {
        // Arrange
        $role = Role::create(['name' => 'Educador']);
        $user = User::factory()->create([
            'name' => 'Test Educator',
            'last_name' => 'Silva',
            'position' => 'Professor',
            'bio' => 'Bio test',
        ]);
        $user->roles()->attach($role);

        // Act
        $response = $this->get('/educadores');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Test Educator');
        $response->assertSee('Professor');
        $response->assertSee('Bio test');
    }

    public function test_non_educator_users_are_not_shown(): void
    {
         // Arrange
         $role = Role::create(['name' => 'Educador']);
         $user = User::factory()->create([
             'name' => 'Test Educator',
         ]);
         $user->roles()->attach($role);
 
         $otherUser = User::factory()->create([
            'name' => 'Regular User',
         ]);
 
         // Act
         $response = $this->get('/educadores');
 
         // Assert
         $response->assertStatus(200);
         $response->assertSee('Test Educator');
         $response->assertDontSee('Regular User');
    }
}