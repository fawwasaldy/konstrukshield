<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AnalyzeController extends Controller
{
    public function index()
    {
        return view('analyze.index');
    }

    public function result(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

//        dd($request->file('image')->getMimeType(), $request->file('image')->getClientOriginalExtension());

        if (!$validated) {
            return response()->json(['error' => 'Validation failed'], 422);
        }

        $imagePath = $request->file('image')->store('uploads', 'public');

        // Send the image to the prediction API
        $response = Http::attach(
            'file', file_get_contents($request->file('image')->getRealPath()), $request->file('image')->getClientOriginalName()
        )->post('http://127.0.0.1:5000/predict');

        $data = $response->json();

        // Decode the base64 image and save it
        $decodedImage = base64_decode($data['image']);
        $decodedImagePath = 'uploads/decoded_' . basename($imagePath);
        Storage::disk('public')->put($decodedImagePath, $decodedImage);

        // Get the predictions
        $predictions = $data['predictions'];

        // Apply the existing logic to determine the category
        $personCount = collect($predictions)->where('class_name', 'person')->count();
        $helmetCount = collect($predictions)->where('class_name', 'Safety-Helmet')->count();
        $vestCount = collect($predictions)->where('class_name', 'Reflective-Jacket')->count();

//        dd($personCount, $helmetCount, $vestCount);

        if ($personCount < $helmetCount && $personCount < $vestCount) {
            $message = 'Selamat, tempat kerja anda sudah aman!';
            $link = null;
        } elseif ($personCount < $helmetCount) {
            $message = 'Sepertinya kamu membutuhkan vest';
            $link = route('products', ['category' => 'vest']);
        } elseif ($personCount < $vestCount) {
            $message = 'Sepertinya kamu membutuhkan helmet';
            $link = route('products', ['category' => 'helmet']);
        } else {
            $message = 'Sepertinya kamu membutuhkan helmet dan vest';
            $link = route('products');
        }

        return view('analyze.result', compact('decodedImagePath', 'predictions', 'message', 'link', 'personCount', 'helmetCount', 'vestCount'));
    }
}
