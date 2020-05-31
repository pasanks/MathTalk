<?php
Route::group([
    'prefix'     => 'report',
    'namespace' => 'MasterData\Report',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //master controller
//    Route::resource('grade', 'GradeController');
    Route::get('tranReportIndex', 'ReportController@tranReportIndex')->name('report.tranReportIndex');
    Route::get('getData_mainTranReport', 'ReportController@getData_mainTranReport')->name('report.getData_mainTranReport');
    Route::get('sessionList', 'ReportController@sessionList')->name('report.sessionList');
//    Route::post('updateGrade', 'ReportController@updateGrade')->name('grade.updateGrade');
//    Route::get('getDataForEdit', 'ReportController@getDataForEdit')->name('grade.getDataForEdit');
});
