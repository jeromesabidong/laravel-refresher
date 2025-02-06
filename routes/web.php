<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';

// ---- 

Route::get('/', function() {
    return view('pages.home');
});


Route::get('/jobs', function(){
    // eager loading >>> lazy loading (to avoid n+1 problem)
    $jobs = JobListing::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function($id) {

    $job = JobListing::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function() {
    // validation ...

    JobListing::create([
        'title' => request('title'), 
        'salary' => request('salary'), 
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function() {
    return view('pages.contact');
});