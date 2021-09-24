<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
            $query = Category::query();

            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a href="' . route('category.edit', $item->id) . '" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <div class="btn-group">
                            <form 
                                action="'. route('category.destroy', $item->id) .'"
                                method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submit" class="btn btn-danger" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->editColumn('photo', function($item) {
                    return $item->photo ? 
                    '   
                        <img 
                            src="'. Storage::url($item->photo) .'"
                            style="max-height:40px;" />
                    ' : ''; 
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }
        return view('pages.admin.category.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');
        
        // echo "<pre>";var_dump($data);die; (for check data in php);

        Category::create($data);

        return redirect()->route('category.index')->with('message', 'Data berhasil ditambahkan');
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
        $item = Category::findOrFail($id);

        return view('pages.admin.category.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->all();

        $item = Category::findOrFail($id);
        $data['slug'] = Str::slug($request->name);
        
        if (isset($request->photo)){
            Storage::disk('local')->delete('public/'.$item->photo);
            $data['photo'] = $request->file('photo')->store('assets/category', 'public');
        }


        $item->update($data);

        return redirect()->route('category.index')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index')->with('message', 'Data berhasil dihapus');
    }
}
