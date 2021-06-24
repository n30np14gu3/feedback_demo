@extends('index')

@section('page-title', 'FEEDBACK DEMO :: '.@$message->message_name)

@section('page-content')
    <div class="ui  container">
        <div class="ui segment">
            <h3>Feedback at: {{@$message->created_at}}</h3>
            <h3>Name: {{@$message->message_name}}</h3>
            <h3>Topic: {{@$message->message_topic}}</h3>
            <h3>Message:</h3>
            <div>
                {!! str_replace("\r\n", "<br>", htmlspecialchars(@$message->message_text)) !!}
            </div>
            <div class="ui divider"></div>
            <a href="{{url('/messages')}}" class="ui primary fluid button">Back</a>
        </div>

    </div>
@endsection
