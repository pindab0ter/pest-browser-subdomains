<?php

declare(strict_types=1);

it('serves non-subdomain routes in the correct environment', function () {
    expect(app()->environment())->toBe('testing'); // Passes

    visit(route('no-subdomain.test'))
        ->assertHostIs('127.0.0.1') // Passes
        ->assertSee('testing');     // Passes
});

it('serves subdomain routes in the correct environment', function () {
    expect(app()->environment())->toBe('testing'); // Passes

    visit(route('subdomain.test'))
        ->assertHostIs('test.'.config('app.domain')) // Passes
        ->assertSee('testing');                            // Fails, displays 'local' instead
});
