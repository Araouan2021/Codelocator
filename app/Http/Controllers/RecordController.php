<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Record;

class RecordController extends Controller
{
     public function index()
    {
        return Record::all();
    }
 
    public function show($id)
    {
        return Record::find($id);
    }

    public function store(Request $request)
    {
        return Record::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->update($request->all());

        return $record;
    }

    public function delete(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return 204;
    }
}
}
