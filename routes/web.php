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

//------------------RUTAS CLIENTE----------------------
Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');

Route::get('nosotros', 'WebController@about_us')->name('web.about_us');
Route::get('blog_detalles', 'WebController@blog_details')->name('web.blog_details');
Route::get('blog', 'WebController@blog')->name('web.blog');
Route::get('contacto', 'WebController@contact_us')->name('web.contact_us');
Route::get('registro', 'WebController@login_register')->name('web.login_register');
Route::get('productos', 'WebController@shop_grid')->name('web.shop_grid');
Route::get('micuenta', 'MyAccountController@my_account')->name('web.my_account');
Route::get('pagar', 'MyAccountController@checkout')->name('web.checkout');
Route::get('/', 'WebController@welcome')->name('web.welcome');
Route::get('producto/{product}', 'WebController@product_details')->name('web.product_details');
Route::get('mi_carrito_de_compras', 'WebController@cart')->name('web.cart');
Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->only([
    'update'
])->names('shopping_cart_details');
Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_details.destroy');
Route::post('add_to_shopping_cart/{product}/store', 'ShoppingCartDetailController@store')->name('shopping_cart_details.store');
Route::get('add_a_product_to_the_shopping_cart/{product}/store', 'ShoppingCartDetailController@store_a_product')->name('store_a_product');
Route::put('shoppings_cart','ShoppingCartController@update')->name('shopping_cart.update');
Route::get('mis_ordenes', 'MyAccountController@orders')->name('web.orders');
Route::get('detalles_de_mi_cuenta', 'MyAccountController@account_info')->name('web.account_info');
Route::get('editar_direccion', 'MyAccountController@address_edit')->name('web.address_edit');

//----------------FIN----------------------------------
Route::resource('orders','OrderController')->names('orders')->only([
'index','show',
]);;
Route::put('orders_update/{id}','OrderController@orders_update')->name('orders_update');
Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::get('payment/reports_saldos', 'ReportController@reports_saldos')->name('reports.saldos');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::get('sales/reports_payments_day', 'ReportController@reports_payments_day')->name('reports.payment_day');
Route::get('sales/reports_payments_date', 'ReportController@reports_payments_date')->name('reports.payment_date');

Route::post('sales/report_payments_results', 'ReportController@report_payments_results')->name('report.payment_results');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::post('/upload/product/{id}/image','ProductController@upload_image')->name('upload.product.image');
  
Route::resource('purchases', 'PurchaseController')->names('purchases');
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::resource('payments', 'PaymentController')->names('payments')->only([
    'index', 'create', 'store','show'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('payments/create/{sale}', 'PaymentController@create')->name('payments.create');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->except([
    'store','create','destroy'
])->names('roles');
Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('get_subcategories','AjaxController@get_subcategories')->name('get_subcategories');
Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');
Route::resource('subcategories','SubcategoryController')->except([
    'edit','update'
])->names('subcategories');
Route::put('category/{category}/subcategory/{subcategory}/update', 'SubcategoryController@update')->name('subcategories.update');
Route::get('category/{category}/subcategory/{subcategory}', 'SubcategoryController@edit')->name('subcategories.edit');
Route::resource('tags','TagController')->names('tags');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
