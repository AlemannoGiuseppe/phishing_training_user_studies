<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserEmailQuestionnaire;
use Illuminate\Support\Facades\Log;


class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the questionnaires.
     */
    public function index()
    {
        return view('questionnaires_screen');
    }

    public function showQuestionnaire1()
    {
        session(['questionnaire1_view' => true]);
        return view('questionnaires.bfi2xs'); 
    }

    public function showQuestionnaire2()
    {
        session(['questionnaire2_view' => true]);
        return view('questionnaires.stp-ii-b'); 
    }

    public function showQuestionnaire3()
    {
        session(['questionnaire3_view' => true]);
        return view('questionnaires.tei-que-sf'); 
    }

    public function saveEmailClassification(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'emailId'    => 'required|integer|exists:emails,id', 
                'confidence' => 'required|integer|min:1|max:10', 
                'phishing'   => 'required|in:yes,no', 
            ]);

            $dataToInsert = [
                'email_id'   => $validatedData['emailId'],
                'confidence' => $validatedData['confidence'],
                'phishing'   => $validatedData['phishing'] === 'yes' ? 1 : 0,
                'user_id'    => Auth::id(),
                'title_email' => 'null' 
            ];            
    
            UserEmailQuestionnaire::create($dataToInsert);

            return redirect(route('show', ['folder' => 'inbox']));
        } catch (\Exception $e) {
            // Catch any exceptions and return a JSON response with error details
            return response()->json([
                'error' => 'Server error: ' . $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }




}