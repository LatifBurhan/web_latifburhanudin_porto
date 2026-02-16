<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/monkeytype-stats', function () {

  $token = config('services.monkeytype.key');

  if (!$token) {
    return response()->json([
      'error' => 'Monkeytype API key not set'
    ], 500);
  }

  try {
    $headers = [
      'Authorization' => 'ApeKey ' . $token
    ];

    $pbResponse = Http::withHeaders($headers)
      ->timeout(10)
      ->get('https://api.monkeytype.com/users/personalBests?mode=time');

    $statsResponse = Http::withHeaders($headers)
      ->timeout(10)
      ->get('https://api.monkeytype.com/users/stats');

    if ($pbResponse->failed() || $statsResponse->failed()) {
      return response()->json([
        'error' => 'Monkeytype API failed',
        'pb' => $pbResponse->body(),
        'stats' => $statsResponse->body(),
      ], 502);
    }

    return response()->json([
      'pbs' => $pbResponse->json('data') ?? [],
      'stats' => $statsResponse->json('data') ?? []
    ]);

  } catch (\Throwable $e) {
    return response()->json([
      'error' => $e->getMessage()
    ], 500);
  }
});
