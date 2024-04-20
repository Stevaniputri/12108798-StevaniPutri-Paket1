<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class CategoryController extends Controller
{
    private function generatePDF($view, $data, $filename)
    {

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view($view, $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream($filename);
    }

        public function exportCategoriesPDF(Request $request)
    {
        $query = Category::query();
        
        // Lakukan filter berdasarkan kata kunci pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $categories = $query->get();

        return $this->generatePDF('pdf.category', compact('categories'), 'Categories.pdf');
    }

    public function category(Request $request)
    {
        $query = Category::latest();
               
        // Lakukan filter berdasarkan kata kunci pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $categories = $query->get();

        return view('Book.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category')->with('success', 'berhasil menambahkan category');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('category')->with('success', 'berhasil menambahkan category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'berhasil menghapus data');
    }
}
