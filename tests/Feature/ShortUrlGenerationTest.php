<?php

const URL_API = '/api/urls';

it('generates a short URL correctly', function () {

    $faker = app()->make(\Faker\Generator::class);


    $response = $this->post(URL_API, [
        'original_url' => $faker->url,
        'title' => $faker->sentence
    ]);
    
    $response->assertStatus(201);
    
    $response->assertJsonStructure([
        'id',
        'title',
        'original_url',
        'shortener_url',
        'created_at',
        'updated_at'
    ]);
});

it('generates unique short URLs for different long URLs', function () {
    
    $faker = app()->make(\Faker\Generator::class);
    
    $response1 = $this->post(URL_API, [
        'original_url' => $faker->url,
        'title' => $faker->sentence
    ]);

    $response2 = $this->post(URL_API, [
        'original_url' => $faker->url,
        'title' => $faker->sentence
    ]);

    $response1->assertStatus(201);

    $response2->assertStatus(201);

    $this->assertNotEquals(
        $response1->json('shortener_url'),
        $response2->json('shortener_url')
    );

});

it('returns the same short URL for duplicate long URLs', function () {
    
    $faker = app()->make(\Faker\Generator::class);

    $url = $faker->url;
    $title = $faker->sentence;

    $jsonBody = [
        'original_url' => $url,
        'title' => $title
    ];

    $response1 = $this->post(URL_API, $jsonBody);

    $response2 = $this->post(URL_API, $jsonBody);
    
    $response1->assertStatus(201);

    $response2->assertStatus(200);

    $this->assertEquals(
        $response1->json('shortener_url'),
        $response2->json('shortener_url')
    );
    
});


it('fetches the list of urls successfully', function () {
    $response = $this->get(URL_API);
    
    $response->assertStatus(200);

    $response->assertJsonStructure([
        'current_page',
        'data' => [
            '*' => [
                'id',
                'title',
                'original_url',
                'shortener_url',
                'created_at',
                'updated_at'
            ]
        ],
        'first_page_url',
        'from',
        'last_page',
        'last_page_url',
        'links' => [
            [
                'url',
                'label',
                'active'
            ]
        ],
        'next_page_url',
        'path',
        'per_page',
        'prev_page_url',
        'to',
        'total'
    ]);
    
});
