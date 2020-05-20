<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecordTest extends TestCase
{
    public function testsRecordsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $this->json('POST', '/api/records', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'name' => 'Lorem', 'body' => 'Ipsum']);
    }

    public function testsrecordsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = factory(Record::class)->create([
            'name' => 'First Record',
            'body' => 'First Body',
        ]);

        $payload = [
            'name' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/records/' . $record->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([ 
                'id' => 1, 
                'name' => 'Lorem', 
                'body' => 'Ipsum' 
            ]);
    }

    public function testsRecordsAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = factory(Record::class)->create([
            'name' => 'First Record',
            'body' => 'First Body',
        ]);
    }

    public function testsRecordsAreListedCorrectly()
    {
        factory(Record::class)->create([
            'name' => 'First Record',
            'body' => 'First Body'
        ]);

        factory(Record::class)->create([
            'name' => 'Second Record',
            'body' => 'Second Body'
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/records', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'name' => 'First Record', 'body' => 'First Body' ],
                [ 'name' => 'Second Record', 'body' => 'Second Body' ]
            ])

            ->assertJsonStructure([
                '*' => ['id', 'body', 'name', 'created_at', 'updated_at'],
            ]);
    }
}
