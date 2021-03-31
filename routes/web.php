<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index');

Route::get('admin', 'AdminController@admin');

Route::get('setups','AdminController@setups');

Route::post('addSettings','CrudController@insertData');

Route::get('categories','AdminController@categories');

Route::post('addCategory','CrudController@insertData');

Route::get('editCategory/{id}','AdminController@editCategory');

Route::post('updateCategory/{id}','CrudController@updateData');

Route::get('deleteCategory/{id}','AdminController@deleteCategory');

Route::get('new-post', 'AdminController@newPost');

Route::post('addPost', 'CrudController@insertData');

Route::get('all-posts', 'AdminController@allPosts');

Route::get('editPost/{id}', 'AdminController@editPost');

Route::post('updatePost/{id}','CrudController@updateData');

Route::get('deletePost/{id}','AdminController@deletePost');

Route::get('new-service', 'AdminController@newService');

Route::post('addService', 'CrudController@insertData');

Route::get('allService', 'AdminController@allService');

Route::get('editService/{id}', 'AdminController@editService');

Route::post('updateService/{id}','CrudController@updateData');

Route::get('deleteService/{id}','AdminController@deleteService');

Route::get('portcats','AdminController@portcats');

Route::post('addPortcat','CrudController@insertData');

Route::get('editPortcat/{id}','AdminController@editPortcat');

Route::post('updatePortcat/{id}','CrudController@updateData');

Route::get('deletePortcat/{id}','AdminController@deletePortcat');

Route::post('addPc','CrudController@insertData');

Route::get('editPc/{id}','AdminController@editPc');

Route::post('updatePc/{id}','CrudController@updateData');

Route::get('deletePc/{id}','AdminController@deletePc');

Route::get('new-portifolio','AdminController@newPortifolio');

Route::get('all-portifolio','AdminController@allPortifolio');

Route::post('addPortifolio','CrudController@insertData');

Route::post('updatePortifolio/{id}','CrudController@updateData');

Route::get('clients', 'AdminController@clients');

Route::post('addClient','CrudController@insertData');

Route::get('editClient/{id}','AdminController@editClient');

Route::post('updateClient/{id}','CrudController@updateData');

Route::get('deleteClient/{id}','AdminController@deleteClient');

Route::get('new-member','AdminController@newMember');

Route::post('addMember','CrudController@insertData');

Route::get('sendMessage','FrontController@sendMessage');

Route::get('allMembers', 'AdminController@allMembers');

Route::get('editMember/{id}','AdminController@editMember');

Route::post('updateMember/{id}','CrudController@updateData');

Route::get('deleteMember/{id}','AdminController@deleteMember');