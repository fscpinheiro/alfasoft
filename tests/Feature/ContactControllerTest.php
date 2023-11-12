<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Str;


class ContactControllerTest extends TestCase
{
    protected $user;

    public function setUp(): void{
        parent::setUp();
        $this->user = User::where('email', 'fscpinheiro@gmail.com')->first();
    }
    
    public function testIndex(){
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }

    public function testCreate(){
        $response = $this->actingAs($this->user)->get('/contacts/create');
        $response->assertStatus(200);
    }

    public function testStore(){
        $contact = Contact::factory()->make();
        $response = $this->actingAs($this->user)->post('/contacts', $contact->toArray());
        $response->assertRedirect('/contacts');
    }

    public function testShow(){
        $contact = Contact::factory()->create();
        $response = $this->actingAs($this->user)->get('/contacts/' . $contact->id);
        $response->assertStatus(200);
    }

    public function testEdit(){
        $contact = Contact::factory()->create();
        $response = $this->actingAs($this->user)->get('/contacts/' . $contact->id . '/edit');
        $response->assertStatus(200);
    }

    public function testUpdate(){
        $contact = Contact::factory()->create();
        $updatedData = [
            'name' => 'Teste' . Str::random(10),
            'contact' => rand(100000000, 999999999), 
            'email' => Str::random(10) . '@testecontact.com.br',
        ];
        $response = $this->actingAs($this->user)->put('/contacts/' . $contact->id, $updatedData);
        $response->assertRedirect('/contacts');
    }

    public function testDestroy(){
        $contact = Contact::factory()->create();
        $response = $this->actingAs($this->user)->delete('/contacts/' . $contact->id);
        $response->assertRedirect('/contacts');
    }

}
