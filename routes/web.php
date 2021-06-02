<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'Home']);
Route::post('/send', [FrontendController::class, 'Store'])->name('send');
Route::get('/download/{pdf}', [FrontendController::class, 'Download'])->name('download');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Group Routes For Users
Route::group(['middleware' => 'auth'], function () {
    //Routes For The Users Section
    Route::get('/users', [UserController::class, 'Index'])->name('users.index');

    //Routes For The Home Section
    Route::get('/home/details', [HomeController::class, 'Index'])->name('home.index');
    Route::get('/home/create', [HomeController::class, 'Create'])->name('home.create');
    Route::post('/home/store', [HomeController::class, 'Store'])->name('home.store');
    Route::get('/home/{id}/pdf', [HomeController::class, 'Pdf'])->name('home.pdf');
    Route::get('/home/{id}/edit', [HomeController::class, 'Edit'])->name('home.edit');
    Route::post('/home/{id}/update', [HomeController::class, 'Update'])->name('home.update');
    Route::get('/home/{id}/delete', [HomeController::class, 'Delete'])->name('home.delete');

    //Routes For The Titles Section
    Route::get('/title/details', [TitleController::class, 'Index'])->name('title.index');
    Route::get('/title/create', [TitleController::class, 'Create'])->name('title.create');
    Route::post('/title/store', [TitleController::class, 'Store'])->name('title.store');
    Route::get('/title/{id}/edit', [TitleController::class, 'Edit'])->name('title.edit');
    Route::post('/title/{id}/update', [TitleController::class, 'Update'])->name('title.update');
    Route::get('/title/{id}/delete', [TitleController::class, 'Delete'])->name('title.delete');

    //Routes For The About Section
    Route::get('/about/details', [AboutController::class, 'Index'])->name('about.index');
    Route::get('/about/create', [AboutController::class, 'Create'])->name('about.create');
    Route::post('/about/store', [AboutController::class, 'Store'])->name('about.store');
    Route::get('/about/{id}/edit', [AboutController::class, 'Edit'])->name('about.edit');
    Route::post('/about/{id}/update', [AboutController::class, 'Update'])->name('about.update');
    Route::get('/about/{id}/delete', [AboutController::class, 'Delete'])->name('about.delete');

    //Routes For The Education Section
    Route::get('/education/details', [EducationController::class, 'Index'])->name('education.index');
    Route::get('/education/create', [EducationController::class, 'Create'])->name('education.create');
    Route::post('/education/store', [EducationController::class, 'Store'])->name('education.store');
    Route::get('/education/{id}/edit', [EducationController::class, 'Edit'])->name('education.edit');
    Route::post('/education/{id}/update', [EducationController::class, 'Update'])->name('education.update');
    Route::get('/education/{id}/delete', [EducationController::class, 'Delete'])->name('education.delete');

    //Routes For The Experience Section
    Route::get('/experience/details', [ExperienceController::class, 'Index'])->name('experience.index');
    Route::get('/experience/create', [ExperienceController::class, 'Create'])->name('experience.create');
    Route::post('/experience/store', [ExperienceController::class, 'Store'])->name('experience.store');
    Route::get('/experience/{id}/edit', [ExperienceController::class, 'Edit'])->name('experience.edit');
    Route::post('/experience/{id}/update', [ExperienceController::class, 'Update'])->name('experience.update');
    Route::get('/experience/{id}/delete', [ExperienceController::class, 'Delete'])->name('experience.delete');

    //Routes For The Services Section
    Route::get('/service/details', [ServiceController::class, 'Index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'Create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'Store'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'Edit'])->name('service.edit');
    Route::post('/service/{id}/update', [ServiceController::class, 'Update'])->name('service.update');
    Route::get('/service/{id}/delete', [ServiceController::class, 'Delete'])->name('service.delete');

    //Routes For The Portfolio Section
    Route::get('/portfolio/details', [PortfolioController::class, 'Index'])->name('portfolio.index');
    Route::get('/portfolio/create', [PortfolioController::class, 'Create'])->name('portfolio.create');
    Route::post('/portfolio/store', [PortfolioController::class, 'Store'])->name('portfolio.store');
    Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'Edit'])->name('portfolio.edit');
    Route::post('/portfolio/{id}/update', [PortfolioController::class, 'Update'])->name('portfolio.update');
    Route::get('/portfolio/{id}/delete', [PortfolioController::class, 'Delete'])->name('portfolio.delete');

    //Routes For The Review Section
    Route::get('/review/details', [ReviewController::class, 'Index'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'Create'])->name('review.create');
    Route::post('/review/store', [ReviewController::class, 'Store'])->name('review.store');
    Route::get('/review/{id}/edit', [ReviewController::class, 'Edit'])->name('review.edit');
    Route::post('/review/{id}/update', [ReviewController::class, 'Update'])->name('review.update');
    Route::get('/review/{id}/delete', [ReviewController::class, 'Delete'])->name('review.delete');

    //Routes For The Contact Section
    Route::get('/contact/details', [ContactController::class, 'Index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'Create'])->name('contact.create');
    Route::post('/contact/store', [ContactController::class, 'Store'])->name('contact.store');
    Route::get('/contact/{id}/edit', [ContactController::class, 'Edit'])->name('contact.edit');
    Route::post('/contact/{id}/update', [ContactController::class, 'Update'])->name('contact.update');
    Route::get('/contact/{id}/delete', [ContactController::class, 'Delete'])->name('contact.delete');

    //Routes For The Message Section
    Route::get('/message/details', [MassageController::class, 'Index'])->name('message.index');
    Route::get('/message/{id}/detail', [MassageController::class, 'Show'])->name('message.show');
    Route::get('/message/{id}/delete', [MassageController::class, 'Delete'])->name('message.delete');
});
