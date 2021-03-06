<?php
Route::group([
    'prefix'     => 'lms',
    'namespace' => 'MasterData\ClassD',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //master controller
    Route::resource('class', 'ClassController');
    Route::get('getData_classes', 'ClassController@getData_classes')->name('class.getData_classes');
    Route::post('updateClass', 'ClassController@updateClass')->name('class.updateClass');
    Route::get('getDataForClassEdit', 'ClassController@getDataForClassEdit')->name('class.getDataForClassEdit');
});
