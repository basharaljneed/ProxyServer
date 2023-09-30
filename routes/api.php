<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Facadeproxy;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::match(['get', 'post', 'head', 'patch', 'put', 'delete'] , 'proxy/{slug}', function(Request $request){

//     return Facadeproxy::CreateProxy($request)
//             ->withHeaders(['x-proxy' => 'laravel'])
//             ->withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6Imp1YW5AZ21haWwuY29tIiwic2oxNTkwMTkyNTE1fQ.db5AZuw3eSAHqjdaRn9AZX8LPbNAxPmuO8BZlEmIGk4')
//             ->preserveQuery(true)
//             ->toHost('http://dockerserver.test','api/proxy');

// })->where('slug', '([A-Za-z0-9\-\/]+)');

Route::match(['get', 'post', 'head', 'patch', 'put', 'delete'] , 'proxy/{slug}', function(Request $request){

    return Facadeproxy::CreateProxy($request)
            // add a header before sending the request
            ->withHeaders(['x-custom' => 'customHeader'])
            // add a Bearer token (this is useful for the client not to have the token, and from the intermediary proxy we add it.
            ->withToken('eyJhbGcLPbNA...')
            //Maintain the query of the url.
            ->preserveQuery(true)
            ->toHost('http://my.server2.test','api/proxy');

})->where('slug', '([A-Za-z0-9\-\/]+)');