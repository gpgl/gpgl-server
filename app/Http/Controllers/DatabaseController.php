<?php

namespace App\Http\Controllers;

use App\Database;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDatabase;

class DatabaseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Database::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'databases' => Database::all(),
        ];

        return view('databases.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('databases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateDatabase  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDatabase $request)
    {
        $database = new Database($request->all());
        $request->user()->databases()->save($database);
        return redirect(route('databases.show', $database));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function show(Database $database)
    {
        return $database;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function edit(Database $database)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database $database)
    {
        //
    }
}
