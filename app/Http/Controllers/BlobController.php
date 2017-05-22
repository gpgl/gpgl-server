<?php

namespace App\Http\Controllers;

use App\Blob;
use App\Database;
use Illuminate\Http\Request;

class BlobController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Database::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function show(Database $database)
    {
        $blob = $database->blobs()->latest()->first();

        if (!empty($blob->gpgldb)) {
            return response($blob->gpgldb)
                ->header('Content-Type', 'application/pgp-encrypted');
        }

        return response(null, 204);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Database $database)
    {
        $blob = new Blob;
        $blob->gpgldb = $request->getContent();
        $database->blobs()->save($blob);
        return response(null, 204);
    }
}
