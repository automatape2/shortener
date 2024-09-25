<?php

use App\Models\Url;

it('redirects a short URL to the correct long URL', function () {
    $url = Url::factory()->create();

    $response = $this->get('/' . $url->shortener_url);

    $response->assertRedirect($url
        ->original_url);
        
});
