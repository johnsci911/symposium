<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it imports a conference', function () {
    $command = new ImportConferences;

    $data = [
        'name' => 'This is the new name from the API',
        '_rel' => ['cfp_uri' => 'v1/cfp/o1i34ion124io4n1'],
    ];

    $command->importOrUpdateConference($data);

    $first = Conference::first();

    $this->assertEquals($first->title, $data['name']);
    $this->assertEquals($first->callingallpapers_id, $data['_rel']['cfp_uri']);
});

test('it updates a conference', function () {
    $command = new ImportConferences;

    Conference::create([
        'title' => 'Original DB Title',
        'callingallpapers_id' => 'v1/cfp/o1i34ion124io4n1',
    ]);

    $data = [
        'name' => 'This is the name from the API',
        '_rel' => ['cfp_uri' => 'v1/cfp/o1i34ion124io4n1'],
    ];

    $command->importOrUpdateConference($data);

    $first = Conference::first();

    $this->assertEquals($first->title, $data['name']);
    $this->assertEquals($first->callingallpapers_id, $data['_rel']['cfp_uri']);
    $this->assertEquals(1, Conference::count());
});
