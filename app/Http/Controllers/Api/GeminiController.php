<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatModel;
use Gemini\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    public function sendChat(ChatRequest $request)
    {
        $validation = $request->validated();

        try {
            $gemini = Gemini::geminiPro()->generateContent($validation['message']);
            ChatModel::create([
                'user_id' => Auth::user()->id,
                'message' => $validation['message'],
                'answer' => $gemini->text(),
            ]);
            return response()->json(
                [
                    'message' => 'Success',
                    'data' => [
                        'message' => $validation['message'],
                        'answer' => $gemini->text(),
                    ],
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Error',
                    'data' => $e,
                ],
                500,
            );
        }
    }

    public function getChat()
    {
        try {
            $chat = ChatModel::where('user_id', Auth::user()->id)->get();
            return response()->json(
                [
                    'message' => 'Success',
                    'data' => $chat,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Error',
                    'data' => $e,
                ],
                500,
            );
        }
    }

    public function deleteChat($id)
    {
        try {
            ChatModel::where('id', $id)->delete();
            return response()->json(
                [
                    'message' => 'Success',
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Error',
                    'data' => $e,
                ],
                500,
            );
        }
    }
}
