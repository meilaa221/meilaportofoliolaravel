<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

// Portfolio routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Contact form route
Route::post('/contact/send', [ContactController::class, 'sendMessage'])->name('contact.send');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Chat status route (accessible without auth for checking)
Route::get('/chat/status', [ChatController::class, 'getUserChatStatus'])->name('chat.status');

// Debug route (remove in production)
Route::get('/debug/session', function() {
    return response()->json([
        'authenticated' => auth()->check(),
        'user' => auth()->user(),
        'session_id' => session()->getId(),
        'csrf_token' => csrf_token(),
    ]);
})->name('debug.session');

// Chat routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::post('/chat/start', [ChatController::class, 'startChat'])->name('chat.start');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{sessionId}', [ChatController::class, 'getMessages'])->name('chat.messages');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/chat', [AdminController::class, 'chatIndex'])->name('admin.chat');
    Route::get('/chat/{session}', [AdminController::class, 'chatShow'])->name('admin.chat.show');
    Route::post('/chat/{session}/reply', [AdminController::class, 'chatReply'])->name('admin.chat.reply');
    Route::patch('/chat/{session}/close', [AdminController::class, 'chatClose'])->name('admin.chat.close');
});
