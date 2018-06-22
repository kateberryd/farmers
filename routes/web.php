<?php

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('login', 'AuthenticationController@login')->name('login');
Route::post('login', 'AuthenticationController@doLogin')->name('do_login');
Route::get('logout', 'AuthenticationController@logout')->name('logout');

Route::group(['prefix' => 'farmers', 'middleware' => ['auth']], function() {
    Route::get('/', 'FarmerController@allFarmers')->name('farmer_index')->middleware('acl.admin');
    Route::get('new', 'FarmerController@newFarmer')->name('new_farmer')->middleware('acl.adminentrant');
    Route::post('new', 'FarmerController@createFarmer')->name('create_farmer')->middleware('acl.adminentrant');
    Route::get('newagent', 'AgentController@index')->name('new_agent')->middleware('acl.adminentrant');
    Route::post('newagent', 'AgentController@createAgent')->name('create_agent')->middleware('acl.adminentrant');
    Route::get('{id}/edit', 'FarmerController@editFarmer')->name('edit_farmer')->middleware('acl.admin');
    Route::put('{id}/edit', 'FarmerController@updateFarmer')->name('update_farmer')->middleware('acl.admin');
    Route::delete('{id}/delete', 'FarmerController@deleteFarmer')->name('delete_farmer')->middleware('acl.admin');
    Route::get('search', 'FarmerController@search')->name('farmer_search')->middleware('acl.admin');
    
    Route::post('search/phonename', 'FarmerController@doPhoneNameSearch')->name('do_farmer_phone_search')->middleware('acl.admin');
    Route::get('search/phonename/{searchterm}/result', 'FarmerController@phoneNameSearchResult')->name('farmer_phone_search_result')->middleware('acl.admin');
    
    Route::post('search/livestock', 'FarmerController@doLivestockSearch')->name('do_farmer_livestock_search')->middleware('acl.admin');
    Route::get('search/livestock/{searchterm}/result', 'FarmerController@livestockSearchResult')->name('farmer_livestock_search_result')->middleware('acl.admin');
    
    Route::post('search/crops', 'FarmerController@doCropsSearch')->name('do_farmer_crops_search')->middleware('acl.admin');
    Route::get('search/crops/{searchterm}/result', 'FarmerController@cropsSearchResult')->name('farmer_crops_search_result')->middleware('acl.admin');
});

Route::group(['prefix' => 'localgovernments', 'middleware' => ['auth', 'acl.admin']], function() {
    Route::get('/', 'LgaController@index')->name('lga_index');
    Route::get('{id}/centers', 'LgaController@centers')->name('lga_centers');
    Route::get('{id}/farmers', 'LgaController@farmers')->name('lga_farmers');
    Route::get('{id}/wards', 'LgaController@wards')->name('lga_wards');
    Route::get('trucks', 'LgaController@allLgaTrucks')->name('all_lga_trucks');
    Route::get('{id}/truckdetails', 'LgaController@lgaTrucks')->name('lga_trucks');
    Route::get('trucks/new', 'LgaController@newTruck')->name('new_lga_truck');
    Route::post('trucks/new', 'LgaController@createTruck')->name('create_lga_truck');
});

Route::group(['prefix' => 'redemptioncenters', 'middleware' => ['auth', 'acl.admin']], function() {
    Route::get('/', 'RedemptionCenterController@index')->name('center_index');
    Route::get('{uniqueid}/wards', 'RedemptionCenterController@wards')->name('center_wards');
    Route::get('{uniqueid}/farmers', 'RedemptionCenterController@farmers')->name('center_farmers');
    Route::get('{uniqueid}/payments', 'RedemptionCenterController@farmerPayments')->name('center_farmer_payments');
});

Route::group(['prefix' => 'reports', 'middleware' => ['auth', 'acl.admin']], function() {
    Route::get('localgovernments', 'LgaController@report')->name('lgas_report');
    Route::get('redemptioncenters', 'RedemptionCenterController@report')->name('centers_report');
});

Route::post('api/farmer/sync', 'SyncedFarmerController@create')->name('sync_farmer')->middleware('cors');