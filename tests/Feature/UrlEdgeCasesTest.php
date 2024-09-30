<?php

it('handles an extremely long URL', function () {
    
    $response = $this->postJson('/api/urls', [
        'original_url' => 'https://www.facebook.com/' . str_repeat('a', 255),
        'title' => 'Facebook'
    ]);

    $response->assertStatus(200);

    $response->assertJsonStructure([
        'message',
        'errors' => [
            'original_url'
        ]
    ]);

    $response->assertJsonValidationErrors([
        'original_url'
    ]);

});

it('rejects an empty URL', function () {

    $response = $this->postJson('/api/urls', [
        'original_url' => '',
        'title' => 'Facebook'
    ]);

    $response->assertStatus(422);
    
    $response->assertJsonStructure([
        'message',
        'errors' => [
            'original_url'
        ]
    ]);

    $response->assertJsonValidationErrors([
        'original_url'
    ]);

    $response->assertJsonFragment([
        'The original url field is required.'
    ]);
    
});
