Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
