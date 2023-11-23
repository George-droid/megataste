<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

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
    public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function dishes()
    {
        return view('be.dishes');
    }
    public function orders()
    {
        return view('be.orders');
    }
}
