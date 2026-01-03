<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\Web\AuthController;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended uicards/basic
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');




Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


// صفحة dashboard محمية للمستخدمين المسجلين فقط
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// عملية logout تحتاج أن يكون المستخدم مسجل دخول
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// list categories
Route::get('/categories', [CategoryController::class, 'index'])
  ->name('categories.index');

// show create form
Route::get('/categories/create', [CategoryController::class, 'create'])
  ->name('categories.create');

// store category
Route::post('/categories', [CategoryController::class, 'store'])
  ->name('categories.store');

// show edit form
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
  ->name('categories.edit');

// update category
Route::put('/categories/{category}', [CategoryController::class, 'update'])
  ->name('categories.update');

// delete category
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
  ->name('categories.destroy');


use App\Http\Controllers\SubCategoryController;
use Illuminate\Http\Request;

// index
Route::get('/subcategories', [SubCategoryController::class, 'index'])
  ->name('subcategories.index');

// create
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])
  ->name('subcategories.create');

// store
Route::post('/subcategories', [SubCategoryController::class, 'store'])
  ->name('subcategories.store');

// edit
Route::get('/subcategories/{subCategory}/edit', [SubCategoryController::class, 'edit'])
  ->name('subcategories.edit');

// update
Route::put('/subcategories/{subCategory}', [SubCategoryController::class, 'update'])
  ->name('subcategories.update');

// destroy
Route::delete('/subcategories/{subCategory}', [SubCategoryController::class, 'destroy'])
  ->name('subcategories.destroy');

// Index - عرض جميع المنتجات
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Create - عرض الفورم لإنشاء منتج
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Store - حفظ المنتج الجديد
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Edit - عرض الفورم لتعديل منتج موجود
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update - تحديث المنتج
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Destroy - حذف المنتج
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');




// عرض جميع الموظفين
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// صفحة إنشاء موظف جديد
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// تخزين الموظف الجديد
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// صفحة تعديل موظف موجود
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// تحديث بيانات الموظف
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

// حذف موظف
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');



// عرض قائمة الأدوار
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// إنشاء دور جديد
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// تعديل الدور
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

// حذف الدور
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

// مزامنة الصلاحيات
Route::post('/roles/{role}/permissions', [RoleController::class, 'syncPermissions'])
  ->name('roles.syncPermissions');

// // مزامنة المستخدمين
// Route::post('/roles/{role}/users', [RoleController::class, 'syncUsers'])
//     ->name('roles.syncUsers');


Route::post('users/{employee}/sync-roles', [RoleController::class, 'syncUserRoles'])
  ->name('users.roles.sync');


Route::get('lang/{lang}', function (Request $request, $lang) {
    $request->session()->put('locale', $lang);
// dd($request->session()->get('locale'));
    return redirect()->back();
})->name('lang');
