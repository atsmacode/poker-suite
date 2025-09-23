<?php

use App\Enums\Card;

test('get will return expected case', function() {
    $expected = Card::_10C;

    expect(Card::get($expected->value))->toBe(Card::_10C);
});

test('get will throw runtime exception on undefined case', function() {
    $this->expectException(RuntimeException::class);

    Card::get(999);
});