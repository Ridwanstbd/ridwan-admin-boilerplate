<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function settings(){
        return view("pages.Admin.setting-system");
    }
    public function updateSystem(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'description' => 'nullable|string|max:1000',
                'address' => 'nullable|string|max:500',
                'favicon' => 'nullable|image|mimes:png,ico|max:2048'
            ]);

            $system = System::first();

            if ($request->hasFile('favicon')) {
                if ($system->favicon && Storage::disk('public')->exists($system->favicon)) {
                    Storage::disk('public')->delete($system->favicon);
                }

                $favicon = $request->file('favicon');
                $filename = 'favicon-' . Str::random(10) . '.' . $favicon->getClientOriginalExtension();
                $path = $favicon->storeAs('favicons', $filename, 'public');
                $validated['favicon'] = $path;
            }

            $system->update($validated);

            return redirect()->route('dashboard')->with([
                'flash.status' => 'success',
                'flash.message' => 'System settings updated successfully!',
                'reload' => true
            ]);

        } catch (ValidationException $e) {
            return redirect()->route('dashboard')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('dashboard')
                ->withInput()
                ->withErrors(['error' => 'Failed to update system settings. Please try again.'])
                ->with([
                    'flash.status' => 'error',
                    'flash.message' => 'Failed to update system settings. Please try again.'
                ]);
        }
    }
}
