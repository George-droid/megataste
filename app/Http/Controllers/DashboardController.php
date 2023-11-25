<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('be.dashboard');
    }
    public function addMenus()
    {
        return view('be.addmenus');
    }
    public function saveMenus(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules for the 'name' field
        ]);

        // Create a new menu instance and save the 'name' to the 'menus' table
        $menu = new Menu();
        $menu->name = $request->input('name');
        $menu->save();

        // Optionally, you can return a response or redirect as needed
        return redirect()->back()->with('success', 'Menu saved successfully');
    }
    public function listMenus()
    {
        $menus = Menu::with('dishes')->get();
        return view('be.deletemenus', compact('menus'));
    }
    public function deleteMenus($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function addDishes()
    {   
        $menus = DB::table('menus')->get();
        return view('be.adddishes', compact('menus'));
    }
    public function saveDishes(Request $request)
{
    $request->validate([
        'menu_id' => 'required',
        'dish_name' => 'required|string|max:255',
        'description' => 'required|string', 
        'price' => 'required|numeric', 
    ]);

    $newDish = new Dish();
    $newDish->menus_id = $request->input('menu_id');
    $newDish->name = $request->input('dish_name');
    $newDish->description = $request->input('description');
    $newDish->price = $request->input('price');
    // Assign other fields as needed

    $newDish->save();

    // $request->session()->flash('success', 'Dish added successfully');

    return redirect()->back()->with('success', 'Dish added successfully');
}
    public function orders()
    {
        return view('be.orders');
    }
}
