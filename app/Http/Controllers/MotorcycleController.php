<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MotorcycleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Create a new motorcycle instance
            $motorcycle = new Motorcycle();
            $motorcycle->name = $request->name;
            $motorcycle->price = $request->price;
            $motorcycle->status = $request->status;
            $motorcycle->user_id = Auth::id();

            // Handle the image upload
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('motorcycle_images', 'public');
                $motorcycle->image = $path;
            }

            // Save the motorcycle
            $motorcycle->save();

            // Redirect with success message
            return redirect('/')->with('success', 'Motorcycle added successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error adding motorcycle: '.$e->getMessage());

            // Redirect with error message
            return redirect('/')->with('error', 'An error occurred while adding the motorcycle.');
        }
    }

    public function update(Request $request, $id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $motorcycle->name = $request->input('name');
        $motorcycle->price = $request->input('price');
        $motorcycle->status = $request->input('status');

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($motorcycle->image) {
                Storage::disk('public')->delete($motorcycle->image);
            }

            // Store the new image
            $path = $request->file('image')->store('motorcycle_images', 'public');
            $motorcycle->image = $path;
        }

        $motorcycle->save();

        return redirect('/')->with('success', 'Motorcycle updated successfully.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        try {
            // Delete the motorcycle
            $motorcycle->delete();

            // Redirect with success message
            return redirect('/')->with('success', 'Motorcycle deleted successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error deleting motorcycle: '.$e->getMessage());

            // Redirect with error message
            return redirect('/')->with('error', 'An error occurred while deleting the motorcycle.');
        }
    }
}
