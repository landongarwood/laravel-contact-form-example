<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ajax'], function () {
    Route::post('send-contact-email', ['uses' => 'SendContactEmailController@index']);
});
