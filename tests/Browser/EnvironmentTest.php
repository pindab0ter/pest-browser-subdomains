<?php

declare(strict_types=1);

it('serves non-subdomain routes in the correct environment', function () {
    expect(app()->environment())->toBe('testing'); // Passes

    // Visits `http://localhost:<random port>/test`, Passes
    visit(route('no-subdomain.test'))->assertSee('testing');
});

it('serves non-subdomain routes in the correct environment', function () {
    expect(app()->environment())->toBe('testing'); // Passes

    // Visits `http(s)://test.<domain>.<tld>/test`, Fails, displays 'local' instead
    visit(route('subdomain.test'))->assertSee('testing');
});
