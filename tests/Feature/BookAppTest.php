<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookAppTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_user_can_authenticate_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_authenticated_user_can_view_books_and_create_book(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Pemrograman',
            'description' => 'Buku Pemrograman',
        ]);

        $this->actingAs($user);

        // Test list books
        $response = $this->get('/books');
        $response->assertStatus(200);

        // Test create book
        $response = $this->post('/books', [
            'title' => 'Laravel Masterclass',
            'author' => 'Developer',
            'publisher' => 'Media Press',
            'year' => 2024,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $response->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'title' => 'Laravel Masterclass',
        ]);
    }
}
