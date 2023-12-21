<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\MyFirstNotification;


class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id())
        {

            $data= category::all();
            return view('admin.category', compact('data'));
        }
        else {
            return redirect('login');
        }
    }

    public function add_category(Request $request)
    {
        
        $data = new category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', "New Category has been added successfully");
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('delete', "You have deleted the category");
    }
    public function view_product()
    {   if(Auth::id())
        {

            $category=category::all();
            return view('admin.product', compact('category'));
        }
        else{
            return redirect('login');
        }
    }

    public function add_product(Request $request)
    {
        $data = new product;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quanitity=$request->quantity;
        $data->discount_price=$request->discount;
        $data->category=$request->category;

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('Product_img', $imagename);

        $data->image = $imagename;
        
        $data->save();

        return redirect()->back()->with('message', "Product has been added successfully");
    }

    public function show_product()
    {
        if(Auth::id())
        {

            
            $data = product::all();
            return view('admin.show_product', compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function delete_product($id)
    {   
        $data = product::find($id);
        $data->delete();

        return redirect()->back()->with('message', "Product hase been deleted");

    }

    public function update_product($id)
    {   
        $data = product::find($id);
        $category = category::all();
        return view('admin.update_product', compact('data','category'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quanitity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->category = $request->category;

        $image = $request->image;

        if($image){

            $imagename= time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('product_img', $imagename);
            
            $product->image= $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', "Successfully Updated the Product details");


    }
    public function order()
    {

        if(Auth::id())
        {

            
            $order = order::all();
            return view('admin.order', compact('order'));
        }
        else 
        {
            return redirect('login');
        }
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status= "Delivered";
        $order->payment_status = "Paid";

        $order->save();

        return redirect()->back()->with('message' , "Delivery Status has been chamged");
    }
    public function payment_done($id)
    {
        $order = order::find($id);
        $order->payment_status = "Paid";

        $order->save();

        return redirect()->back()->with('message', "Payment status has been changed");
    }
    public function print_pdf($id)
    {
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');
    }
    public function send_email($id)
    {
        $order=order::find($id);

        return view('admin.send_email',compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {

        $order=order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,


        ];
        Notification::send($order, new MyFirstNotification($details));

        return redirect()->back()->with('message', "Mail has been successfully sent");
    }
    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = order::where('name','LIKE', "%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('product_title','LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));

    }
}


