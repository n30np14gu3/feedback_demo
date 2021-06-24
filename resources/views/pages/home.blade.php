@extends('index')

@section('page-title', 'FEEDBACK DEMO')
@section('home-active', 'active')

@section('page-content')
    <div class="ui  container">
        <div class="ui segment">
            <form class="ui form" id="submit-feedback-form">
                {{csrf_field()}}
                <div class="field">
                    <label>Your name:</label>
                    <input type="text" maxlength="100" name="name" placeholder="Vova" required>
                </div>
                <div class="field">
                    <label>Feedback topic:</label>
                    <input type="text" maxlength="100" name="topic" placeholder="I wanna pizza :(" required>
                </div>
                <div class="field">
                    <label>Feedback text:</label>
                    <textarea name="text" placeholder="I hate this site..."></textarea>
                </div>
                <button type="submit" class="ui fluid primary button">Submit feedback</button>
            </form>
        </div>
    </div>
@endsection
