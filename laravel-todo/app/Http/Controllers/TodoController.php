<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $todos = Todo::get();
        return response()->json( $todos );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $todo['content'] = $request->content;
        $todo['is_done'] = false;

        $todo = Todo::create( $todo );

        return response( $todo );
    }

    /**
     * Display the specified resource.
     */
    public function show( Todo $todo ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Todo $todo ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Todo $todo ) {
        $todo->is_done = !$todo->is_done;
        $todo->save();

        return response( $todo );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Todo $todo ) {
        $todo->delete();
        return response( true );
    }
}
