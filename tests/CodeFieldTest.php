<?php

use Creagia\FilamentCodeField\CodeField;

it('can setup the desired programming language', function () {
    $codeField = CodeField::make('test');

    $codeField->phpField();
    expect($codeField->language)->toEqual(CodeField::PHP);

    $codeField->jsField();
    expect($codeField->language)->toEqual(CodeField::JS);

    $codeField->jsonField();
    expect($codeField->language)->toEqual(CodeField::JSON);

    $codeField->htmlField();
    expect($codeField->language)->toEqual(CodeField::HTML);

    $codeField->xmlField();
    expect($codeField->language)->toEqual(CodeField::XML);

    $codeField->cssField();
    expect($codeField->language)->toEqual(CodeField::CSS);
});

it('can disable code autocompletion', function () {
    $codeField = CodeField::make('test');

    expect($codeField->autocompletion)->toBeTrue();

    $codeField->disableAutocompletion();

    expect($codeField->autocompletion)->toBeFalse();
});

it('can enable the gutter line numbers', function () {
    $codeField = CodeField::make('test');

    expect($codeField->lineNumbers)->toBeFalse();

    $codeField->withLineNumbers();

    expect($codeField->autocompletion)->toBeTrue();
});
