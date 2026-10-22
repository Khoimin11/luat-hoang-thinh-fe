<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;

class ConsultationController extends Controller
{
    public function store(
        StoreConsultationRequest $request
    ): JsonResponse {
        $consultation = Consultation::create($request->validated());

        return response()->json([
            'message' => 'Gửi lời nhắn thành công.',
            'data' => [
                'id' => $consultation->id,
            ],
        ], 201);
    }
}