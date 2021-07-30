<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('', 'UsersController@index')->middleware(['auth:api']);
        Route::post('', 'UsersController@store');
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'UsersController@show')->middleware(['auth:api']);
            Route::delete('', 'UsersController@destroy')->middleware(['auth:api']);
            Route::patch('', 'UsersController@update')->middleware(['auth:api']);

            Route::get('/roles', 'UsersController@getUserRoles')->middleware(['auth:api']);
            Route::post('/roles/{roleId}', 'UsersController@addUserRoles')->middleware(['auth:api']);
            Route::delete('/roles/{roleId}', 'UsersController@removeUserRoles')->middleware(['auth:api']);
        });
    });

    Route::get('user', 'UsersController@getUserInfo');

    #news
    Route::get('news', 'NewsController@index');
    Route::post('news', 'NewsController@create')->middleware(['auth:api']);;
    Route::get('news/{id}', 'NewsController@show');
    Route::patch('news/{id}', 'NewsController@update')->middleware(['auth:api']);;
    Route::delete('news/{id}', 'NewsController@destroy')->middleware(['auth:api']);;
    #end

    Route::get('cities/{id?}', 'CityController@getCities')->where('id', '[0-9]+');;

    Route::prefix('products')->group(function () {
        Route::get('', 'ProductController@index');
        Route::get('/latest', 'ProductController@latest');
        Route::post('', 'ProductController@store')->middleware(['auth:api']);
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'ProductController@show');
            Route::patch('', 'ProductController@update')->middleware(['auth:api']);
            Route::delete('', 'ProductController@destroy')->middleware(['auth:api']);
            Route::get('/tags', 'ProductController@showTags');

            Route::get('/configs', 'ProductController@showConfigs');
            Route::post('/configs', 'ProductController@addConfigs')->middleware(['auth:api']);
            Route::put('/configs', 'ProductController@updateConfigs')->middleware(['auth:api']);
            Route::delete('/configs', 'ProductController@deleteConfig')->middleware(['auth:api']);

            Route::get('/comments', 'CommentController@showComments');
            Route::get('/comments/{commentId}', 'CommentController@showComment');
            Route::post('/comments', 'CommentController@addComment');
            Route::patch('/comments/{commentId}', 'CommentController@updateComment')->middleware(['auth:api']);
            Route::delete('/comments/{commentId}', 'CommentController@deleteComment')->middleware(['auth:api']);
        });
        Route::post('/{productId}/tags/{tagId}', 'ProductController@addTag')->middleware(['auth:api']);
        Route::delete('/{productId}/tags/{tagId}', 'ProductController@deleteTag')->middleware(['auth:api']);

        Route::post('/{productId}/category/{id}', 'ProductController@addCategory')->middleware(['auth:api']);
        Route::delete('/{productId}/category/{id}', 'ProductController@deleteCategory')->middleware(['auth:api']);

        Route::post('/{productId}/subcategory/{id}', 'ProductController@addSubCategory')->middleware(['auth:api']);
        Route::delete('/{productId}/subcategory/{id}', 'ProductController@deleteSubCategory')->middleware(['auth:api']);
    });

    Route::prefix('tags')->group(function () {
        Route::get('', 'TagController@index');
        Route::post('', 'TagController@store')->middleware(['auth:api']);
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'TagController@show');
            Route::get('products', 'TagController@showProducts');
            Route::put('', 'TagController@update')->middleware(['auth:api']);
            Route::delete('', 'TagController@destroy')->middleware(['auth:api']);
        });
    });

    Route::prefix('bills')->group(function () {
        Route::get('', 'BillController@index');
        Route::post('', 'BillController@store');
        Route::get('result', 'BillController@paymentResult')->name('payment.verify');
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'BillController@show');
            Route::patch('', 'BillController@update')->middleware(['auth:api']);
            Route::delete('', 'BillController@destroy')->middleware(['auth:api']);
        });
    });


    Route::prefix('attributes')->group(function () {
        Route::get('', 'AtrributeController@index');
        Route::post('', 'AtrributeController@store');
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'AtrributeController@show');
            Route::patch('', 'AtrributeController@update');
            Route::delete('', 'AtrributeController@destroy');
        });
    });
    Route::prefix('sliders')->group(function () {
        Route::get('', 'SliderController@index');
        Route::post('', 'SliderController@store')->middleware(['auth:api']);
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'SliderController@show');
            Route::patch('', 'SliderController@update')->middleware(['auth:api']);
            Route::delete('', 'SliderController@destroy')->middleware(['auth:api']);
        });
    });

    Route::prefix('orders')->group(function () {
        Route::get('/{bill}/products', 'OrderController@showOrder');
        Route::post('/{bill}/products', 'OrderController@storeOrder');
        Route::patch('/{bill}/products/{product}', 'OrderController@updateProduct');
        Route::delete('/{bill}/products/{product}', 'OrderController@deleteProduct');
        Route::delete('/{bill}', 'OrderController@deleteOrder');
    });

    Route::prefix('banners')->group(function () {
        Route::get('', 'BannerController@index');
        Route::post('', 'BannerController@store')->middleware(['auth:api']);;
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'BannerController@show');
            Route::patch('', 'BannerController@update')->middleware(['auth:api']);;
            Route::delete('', 'BannerController@destroy')->middleware(['auth:api']);;
        });
    });

    Route::prefix('discount')->group(function () {
        Route::get('', 'DiscountController@index');
        Route::post('', 'DiscountController@store')->middleware(['auth:api']);
        Route::delete('/{id}', 'DiscountController@destroy')->middleware(['auth:api']);
    });

    Route::prefix('customers')->group(function () {
        Route::get('', 'OurCustomerController@index');
        Route::post('', 'OurCustomerController@store')->middleware(['auth:api']);
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'OurCustomerController@show');
            Route::patch('', 'OurCustomerController@update')->middleware(['auth:api']);
            Route::delete('', 'OurCustomerController@destroy')->middleware(['auth:api']);
        });
    });

    Route::prefix('categories')->group(function () {
        Route::get('', 'CategoryController@index');
        Route::post('', 'CategoryController@store')->middleware(['auth:api']);
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'CategoryController@show');
            Route::get('/products', 'CategoryController@showProductsCategory');
            Route::post('/products', 'CategoryController@addProducts')->middleware(['auth:api']);
            Route::patch('', 'CategoryController@update')->middleware(['auth:api']);
            Route::delete('', 'CategoryController@destroy')->middleware(['auth:api']);
        });
    });

    Route::prefix('subcategories')->group(function () {
        Route::prefix('/{id}')->group(function () {
            Route::get('/products', 'CategoryController@showProductsSubCategory');
        });
    });

    Route::prefix('roles')->group(function () {
        Route::get('', 'RoleController@index')->middleware(['auth:api']);;
        Route::post('', 'RoleController@store')->middleware(['auth:api']);;
        Route::prefix('/{id}')->group(function () {
            Route::get('', 'RoleController@show')->middleware(['auth:api']);;
            Route::patch('', 'RoleController@update')->middleware(['auth:api']);;
            Route::delete('', 'RoleController@destroy')->middleware(['auth:api']);;
        });
    });
    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('register', 'AuthController@register');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});
