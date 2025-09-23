<?php

use App\Enums\Card;
use Symfony\Component\HttpFoundation\Response;

test('get will return expected case', function() {
    $expected = Card::_10C;

    expect(Card::get($expected->value))->toBe(Card::_10C);
});

test('get will throw not found exception on undefined case', function() {
    $this->expectExceptionCode(Response::HTTP_NOT_FOUND);

    Card::get(999);
});