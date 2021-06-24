<?php

namespace App\Http\Controllers;

use App\Models\FeedbackMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function newMessage(Request  $request): array
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required|alpha|max:100',
           'topic' => 'required|max:100',
           'text' => 'required'
        ], [
            'name.required' => 'Your name is required!',
            'name.max' => 'Max name length: 100 symbols',
            'name.alpha' => 'Invalid name characters',

            'topic.required' => 'Topic is required!',
            'topic.max' => 'Max topic length: 100 symbols',

            'text.required' => 'Feedback message is required!'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            return $this->response;
        }

        //Я мог бы и через create, но так нагляднее :)
        $message = new FeedbackMessage();
        $message->message_name = $request['name'];
        $message->message_topic = $request['topic'];
        $message->message_text = $request['text'];
        $message->save();

        $this->response['status'] = 'OK';
        return $this->response;
    }

    public function messages(){
        return view('pages.messages')->with([
           'messages' => FeedbackMessage::all()
        ]);
    }

    public function singleMessage(Request $request, $message_id){
        $message = @FeedbackMessage::query()->where('id', $message_id)->get()->first();
        if($message === null)
            return redirect()->route('message_list');

        return view('pages.single-message')->with([
           'message' => $message
        ]);
    }
}
