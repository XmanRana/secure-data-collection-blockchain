<?php

namespace App\Http\Controllers;

use App\Models\DataSubmission;
use App\Http\Requests\DataSubmissionRequest;
use App\Services\AIValidationService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DataCollectionController extends Controller
{
    use AuthorizesRequests;

    protected $aiValidation;

    public function __construct(AIValidationService $aiValidation)
    {
        $this->aiValidation = $aiValidation;
    }

    public function create()
    {
        return view('data-collection.create');
    }

    public function store(DataSubmissionRequest $request)
    {
        try {
            $validated = $request->validated();

            // ✅ AI Validation Service
            $aiValidationResult = $this->aiValidation->validateSubmission($validated);

            // File Upload & Encryption
            $filePath = null;
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = Str::uuid() . '.' . $file->extension();
                $filePath = $file->storeAs('secure-uploads', $filename, 'local');
            }

            // Encrypt Data with AES-256
            $dataToEncrypt = [
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'file_path' => $filePath,
            ];

            $encryptedData = Crypt::encrypt(json_encode($dataToEncrypt));

            // Save to Database
            $submission = DataSubmission::create([
                'user_id' => auth()->id(),
                'form_data' => $encryptedData,
                'validation_status' => $aiValidationResult['is_valid'] ? 'validated' : 'review_needed',
                'ai_confidence_score' => $aiValidationResult['confidence_score'],
                'validation_notes' => json_encode([
                    'issues' => $aiValidationResult['issues'] ?? [],
                    'suggestions' => $aiValidationResult['suggestions'] ?? [],
                ]),
            ]);

            return redirect()
                ->route('data.success')
                ->with('success', 'Data submitted successfully!')
                ->with('transaction_id', 'TX_' . str_pad($submission->id, 8, '0', STR_PAD_LEFT))
                ->with('confidence_score', round($aiValidationResult['confidence_score'], 2));

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Submission failed: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function show(DataSubmission $submission)
    {
        try {
            $decryptedData = json_decode(Crypt::decrypt($submission->form_data), true);
        } catch (\Exception $e) {
            $decryptedData = [
                'full_name' => 'Error',
                'email' => 'N/A',
                'phone' => 'N/A',
                'address' => 'N/A',
            ];
        }

        $validationNotes = json_decode($submission->validation_notes, true) ?? [];

        return view('data-collection.show', [
            'submission' => $submission,
            'data' => $decryptedData,
            'validationNotes' => $validationNotes,
        ]);
    }
}
