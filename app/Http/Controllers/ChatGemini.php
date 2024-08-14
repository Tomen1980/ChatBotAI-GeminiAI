<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatModel;
use Gemini\Laravel\Facades\Gemini;
class ChatGemini extends Controller
{
    
    public function chat()
    {
        $chat = ChatModel::where('user_id', Auth::user()->id)->get();
        return view('Chat.chat',[
            'chat' => $chat
        ]);
    }

    public function sendMessage(Request $request){
        $validation = $request->validate([
            'message' => 'required'
        ]);
        $gemini = Gemini::geminiPro()->generateContent($validation['message']);
        ChatModel::create([
            'user_id' => Auth::user()->id,
            'message' => $validation['message'],
            'answer' => $gemini->text(),
        ]);
        return redirect('/chat');
    }

    public function deleteChat($id){
        ChatModel::where('id', $id)->delete();
        return redirect('/chat');
    }
}
