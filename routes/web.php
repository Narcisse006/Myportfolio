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

	$xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

	foreach ($urls as $url) {
		$xml .= "\t<url>\n";
		$xml .= "\t\t<loc>".e($url['loc'])."</loc>\n";
		$xml .= "\t\t<changefreq>".e($url['changefreq'])."</changefreq>\n";
		$xml .= "\t\t<priority>".e($url['priority'])."</priority>\n";
		$xml .= "\t</url>\n";
	}

	$xml .= '</urlset>';

	return response($xml, 200)
		->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap')->withoutMiddleware([
	\Illuminate\Session\Middleware\StartSession::class,
	\Illuminate\View\Middleware\ShareErrorsFromSession::class,
]);

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
})->withoutMiddleware([
	\Illuminate\Session\Middleware\StartSession::class,
	\Illuminate\View\Middleware\ShareErrorsFromSession::class,
]);
