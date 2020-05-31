<?php
Route::group([
    'prefix'     => 'lms',
    'namespace' => 'MasterData\Session',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //master controller
    Route::resource('class_session', 'SessionController');
    Route::get('getData_classSessions', 'ClassController@SessionController')->name('class_session.getData_classSessions');
//    Route::get('getData_classes', 'ClassController@getData_classes')->name('class.getData_classes');
//    Route::post('updateClass', 'ClassController@updateClass')->name('class.updateClass');
//    Route::get('getDataForClassEdit', 'ClassController@getDataForClassEdit')->name('class.getDataForClassEdit');
});
