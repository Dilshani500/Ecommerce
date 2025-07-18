<?php

use App\Livewire\HomePage;
use App\Livewire\CategoriesPage; 
use Illuminate\Support\Facades\Route;
use App\Livewire\ProductPage;
use App\Livewire\CartPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;






Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductPage::class);
Route::get('/cart',CartPage::class);
Route::get('/products/{slug}',ProductDetailPage::class);

Route::get('/checkout',CheckoutPage::class);
Route::get('/my-orders',MyOrdersPage::class);
Route::get('/my-orders/{order}',MyOrderDetailPage::class);

Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);
Route::get('/forgot', ForgotPasswordPage::class);
Route::get('/reset', ResetPasswordPage::class);

Route::get('success',SuccessPage::class);
Route::get('cancel',CancelPage::class);

