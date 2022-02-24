<?php



Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Route::get('/package', function () {
    return view('package');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/media', 'RolesController@storeMedia')->name('roles.storeMedia');
    Route::post('roles/ckmedia', 'RolesController@storeCKEditorImages')->name('roles.storeCKEditorImages');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Shop
    Route::delete('shops/destroy', 'ShopController@massDestroy')->name('shops.massDestroy');
    Route::post('shops/media', 'ShopController@storeMedia')->name('shops.storeMedia');
    Route::post('shops/ckmedia', 'ShopController@storeCKEditorImages')->name('shops.storeCKEditorImages');
    Route::resource('shops', 'ShopController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomerController');

    // Order
    Route::post('orders/products', 'OrderController@products')->name('orders.products');
    Route::post('orders/status-change', 'OrderController@statusChange')->name('orders.statusChange');
    Route::post('orders/order-count', 'OrderController@orderCount')->name('orders.orderCount');
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Courier
    Route::delete('couriers/destroy', 'CourierController@massDestroy')->name('couriers.massDestroy');
    Route::resource('couriers', 'CourierController');

    // Order Product
    Route::delete('order-products/destroy', 'OrderProductController@massDestroy')->name('order-products.massDestroy');
    Route::resource('order-products', 'OrderProductController');

    // Send Sms
    Route::post('send-sms/getCustomerNumber', 'SendSmsController@getCustomerNumber')->name('send-sms.getCustomerNumber');
    Route::delete('send-sms/destroy', 'SendSmsController@massDestroy')->name('send-sms.massDestroy');
    Route::resource('send-sms', 'SendSmsController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Product Purchase
    Route::delete('product-purchases/destroy', 'ProductPurchaseController@massDestroy')->name('product-purchases.massDestroy');
    Route::resource('product-purchases', 'ProductPurchaseController');

    // Stock
    Route::delete('stocks/destroy', 'StockController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StockController');

    // Ticket
    Route::delete('tickets/destroy', 'TicketController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/ckmedia', 'TicketController@storeCKEditorImages')->name('tickets.storeCKEditorImages');
    Route::resource('tickets', 'TicketController');

    // Reply
    Route::delete('replies/destroy', 'ReplyController@massDestroy')->name('replies.massDestroy');
    Route::resource('replies', 'ReplyController');

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
