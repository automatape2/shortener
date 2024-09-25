<?php

it('rejects an invalid long URL', function () {
    $response = $this->postJson('/api/urls', [
        'title' => 'Test',
        'original_url' => 'invalid-url'
    ]);

    $response->assertStatus(422);

    $response->assertJsonStructure([
        'message',
        'errors' => [
            'original_url'
        ]
    ]);

    $response->assertJsonFragment([
        'The original url field must be a valid URL.'
    ]);
});
