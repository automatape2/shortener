<?php

use App\Models\Url;

it('expands a short URL to the correct long URL', function () {
    $url = Url::factory()->create();

    $response = $this->get('/' . $url->shortener_url);

    $response->assertRedirect($url->original_url);

});

it('returns an error for a non-existent short URL', function () {
    
    $response = $this->getJson('/' . 'non-existent');

    $response->assertStatus(500);

    $response->assertJsonStructure([
        'message'
    ]);

    $response->assertJsonFragment([
        'The short URL does not exist.'
    ]);
});