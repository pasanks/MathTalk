<?php
Route::group([
    'prefix'     => 'lms',
    'namespace' => 'MasterData\Grade',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //master controller
    Route::resource('grade', 'GradeController');
    Route::get('getData_grades', 'GradeController@getData_grades')->name('grade.getData_grades');
    Route::post('updateGrade', 'GradeController@updateGrade')->name('grade.updateGrade');
    Route::get('getDataForEdit', 'GradeController@getDataForEdit')->name('grade.getDataForEdit');
});
