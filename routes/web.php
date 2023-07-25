<?php 
use App\core\Routing\Route;


Route::get($_ENV['SampleRoute'].'/','HomeController@index');
Route::post($_ENV['SampleRoute'].'/contact/add','ContactController@add');
Route::get($_ENV['SampleRoute'].'/contact/delete/{id}','ContactController@delete');






 


// Route::get($_ENV['SampleRoute'].'/','HomeController@index');
// Route::get($_ENV['SampleRoute'] . '/post/{slug}', 'PostController@single');
// Route::get($_ENV['SampleRoute'] . '/post/{slug}/comment/{cid}', 'PostController@comment');
// Route::get($_ENV['SampleRoute'].'/todo/list','TodoController@list',[BlockFirefox::class , BlockIE::class, BlockChrome::class]);
// Route::get($_ENV['SampleRoute'].'/todo/add','TodoController@add');
// Route::get($_ENV['SampleRoute'].'/todo/remove','TodoController@remove');
// Route::get($_ENV['SampleRoute'].'/archive','ArchiveController@index');
// Route::get($_ENV['SampleRoute'].'/archive/articles','ArchiveController@articles');
// Route::get($_ENV['SampleRoute'] . '/archive/products', 'ArchiveController@products');



   

