<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminPartnerController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\AgentAuthController;
use App\Http\Controllers\AgentPortfolioController;
use App\Http\Controllers\AccreditedAgentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Testimonials & Partners
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

// Premium Services / Subscriptions
Route::get('/premium', function () {
    return view('premium.index');
})->name('premium');

// Accredited agents public
Route::get('/accredited-agents', [AccreditedAgentController::class, 'index'])->name('agents.index');
Route::get('/accredited-agents/apply', [AccreditedAgentController::class, 'create'])->name('agents.apply');
Route::post('/accredited-agents/apply', [AccreditedAgentController::class, 'store'])->name('agents.store');
Route::get('/accredited-agents/{agent}', [AccreditedAgentController::class, 'show'])->name('agents.show');

Route::get('/join-us', [JoinUsController::class, 'create'])->name('join.create');
Route::post('/join-us', [JoinUsController::class, 'store'])->name('join.store');

Route::get('/talent', [TalentController::class, 'index'])->name('talent.index');
Route::get('/talent/{talent}', [TalentController::class, 'show'])->name('talent.show');
Route::post('/talent/{talent}/booking', [TalentController::class, 'storeBooking'])->name('talent.booking.store');

Route::middleware('admin')->get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/login', [AdminLoginController::class, 'show'])->name('admin.login.show');
Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Agent auth (separate from owner admin)
Route::get('/agent/login', [AgentAuthController::class, 'showLogin'])->name('agent.login.show');
Route::post('/agent/login', [AgentAuthController::class, 'login'])->name('agent.login');
Route::post('/agent/logout', [AgentAuthController::class, 'logout'])->name('agent.logout');

Route::middleware('agent')->group(function () {
    Route::get('/agent/portfolio', [AgentPortfolioController::class, 'index'])->name('agent.portfolio.index');
    Route::get('/agent/portfolio/create', [AgentPortfolioController::class, 'create'])->name('agent.portfolio.create');
    Route::post('/agent/portfolio', [AgentPortfolioController::class, 'store'])->name('agent.portfolio.store');
    Route::get('/agent/portfolio/{portfolio}/edit', [AgentPortfolioController::class, 'edit'])->name('agent.portfolio.edit');
    Route::put('/agent/portfolio/{portfolio}', [AgentPortfolioController::class, 'update'])->name('agent.portfolio.update');
    Route::delete('/agent/portfolio/{portfolio}', [AgentPortfolioController::class, 'destroy'])->name('agent.portfolio.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/bookings', [BookingAdminController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/applications', [\App\Http\Controllers\ApplicationsAdminController::class, 'index'])->name('admin.applications.index');

    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin.posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/admin/agents', [AdminAgentController::class, 'index'])->name('admin.agents.index');
    Route::get('/admin/agents/{agent}', [AdminAgentController::class, 'show'])->name('admin.agents.show');
    Route::post('/admin/agents/{agent}/approve', [AdminAgentController::class, 'approve'])->name('admin.agents.approve');
    Route::post('/admin/agents/{agent}/suspend', [AdminAgentController::class, 'suspend'])->name('admin.agents.suspend');

    // Testimonials management
    Route::get('/admin/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/admin/testimonials/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Partners management
    Route::get('/admin/partners', [AdminPartnerController::class, 'index'])->name('admin.partners.index');
    Route::get('/admin/partners/create', [AdminPartnerController::class, 'create'])->name('admin.partners.create');
    Route::post('/admin/partners', [AdminPartnerController::class, 'store'])->name('admin.partners.store');
    Route::get('/admin/partners/{partner}/edit', [AdminPartnerController::class, 'edit'])->name('admin.partners.edit');
    Route::put('/admin/partners/{partner}', [AdminPartnerController::class, 'update'])->name('admin.partners.update');
    Route::delete('/admin/partners/{partner}', [AdminPartnerController::class, 'destroy'])->name('admin.partners.destroy');

    // Contact messages management
    Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/admin/contacts/{contact}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
    Route::put('/admin/contacts/{contact}', [AdminContactController::class, 'update'])->name('admin.contacts.update');
    Route::delete('/admin/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

// QR Code route for talent profiles
Route::get('/talent/{talent}/qr', [TalentController::class, 'qrCode'])->name('talent.qr');
