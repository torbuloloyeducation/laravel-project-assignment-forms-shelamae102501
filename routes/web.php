<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');

Route::get('/formtest', function () {
    return view('formtest');
});

Route::post('/formtest', function () {
    request()->validate([
        'email' => 'required|email'
    ]);

    $emails = session('emails', []);

    if (!in_array(request('email'), $emails)) {
        if (count($emails) >= 5) {
            return back()->with('warning', 'Maximum of 5 emails only!');
        }

        $emails[] = request('email');
        session(['emails' => $emails]);

        return back()->with('success', 'Email added successfully!');
    }

    return back()->with('error', 'Email already exists!');
});

Route::post('/formtest/delete', function () {
    $emails = session('emails', []);
    $index = request('index');

    if (array_key_exists($index, $emails)) {
        array_splice($emails, $index, 1);
        session(['emails' => $emails]);
    }

return redirect('/formtest')->with('success', 'Email deleted!');});