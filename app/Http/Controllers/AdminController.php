<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request) {

$category = new Category;
$category ->category_name = $request->category;
$category->save();

toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Category Added Successfully.');

return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Category Deleted Successfully.');

        return redirect()->back();
    }

    public function edit_category($id) //post
    {
        $data = Category::find($id);
       return view('admin.edit_category', compact('data')); 
    }

    public function update_category(Request $request,$id) //get
    {
        $data = Category::find($id);
        $data -> category_name=$request->category;
        $data -> save();

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Category Updated Successfully.');

        return redirect('/view_category');
    }

    public function add_product() 
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

       /* $data-> title from database table attribute  = $request->title; from 'name' in form */
        $data-> title = $request->title; 
        $data-> description = $request->description;
        $data-> price = $request->price;
        $data-> quantity = $request->qty;
        $data-> category = $request->category;

        $image = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Correctly get the file object
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imagename); // Save the image
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Added Successfully.');


        return redirect() -> back();
    }

    public function view_product() {

        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id) {

        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Deleted Successfully.');

        return redirect()->back();
    }

    public function update_product($slug)
    {
        $data = Product::where('slug',$slug)->get()->first();
        $category = Category::all();
        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
if($image)
{
    $imagename = time().'.'.$image->getClientOriginalExtension();

    $request->image->move('products', $imagename); //save image

    $data->image = $imagename;
    $data->save();

}
toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Updated Successfully');
        return redirect('/view_product');
    }

public function search_product(Request $request)
{
    $search = $request->search;
    $product = Product::where('title', 'LIKE', '%'.$search. '%')->orWhere('description', 'LIKE', '%'.$search. '%')->orWhere('category', 'LIKE', '%'.$search. '%')->paginate(3);

    return view('admin.view_product', compact('product'));
}

public function view_orders()
{
    $data = Order::all();

    return view('admin.order', compact('data'));
}

public function shipped ($id)
{

    $data = Order::find($id);

    $data->status = 'Shipped';
    $data->save();

    return redirect('/view_orders');

}

public function delivered ($id)
{

    $data = Order::find($id);

    $data->status = 'Delivered';
    $data->save();

    return redirect('/view_orders');

}

public function print_pdf($id)
{
    $data = Order::find($id);
    $pdf = Pdf::loadView('admin.invoice', compact('data'));
    return $pdf->download('invoice.pdf');
}

}
