<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('/cv', [indexController::class, 'cv'])->name('cv');
Route::post('/contact', [indexController::class, 'store'])
	->middleware('throttle:5,1')
	->name('contact.store');

Route::get('/sitemap.xml', function () {
	$urls = [
		['loc' => url('/'), 'changefreq' => 'weekly', 'priority' => '1.0'],
		['loc' => url('/cv'), 'changefreq' => 'monthly', 'priority' => '0.8'],
	];

	$content = view('sitemap', compact('urls'))->render();

	return response($content, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
	$lines = [
		'User-agent: *',
		'Allow: /',
		'',
		'Sitemap: '.url('/sitemap.xml'),
		'',
	];

	return response(implode("\n", $lines), 200)
		->header('Content-Type', 'text/plain; charset=UTF-8');
});
