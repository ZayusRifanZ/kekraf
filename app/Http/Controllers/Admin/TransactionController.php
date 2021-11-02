<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) 
        {
            $query = Transaction::with(['user']);
            // for look data in database remove
            // $query = Transaction::with(['user'])->withTrashed();
            

            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('transaction.edit', $item->id) . '" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <div class="btn-group">
                            <form 
                                action="'. route('transaction.destroy', $item->id) .'"
                                method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submit" class="btn btn-danger" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        
                    ';
                })
                
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index')->with('message', 'Data berhasil dihapus');
    }
}
