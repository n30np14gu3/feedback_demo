<div class="ui small modal" id="modal-auth-form">
    <i class="close icon"></i>
    <div class="header">
        Sign in
    </div>
    <div class="content">
        <form id="auth-form" class="ui form">
            {{csrf_field()}}
            <div class="field">
                <label>Login:</label>
                <input type="text" maxlength="100" placeholder="user" name="username" required>
            </div>
            <div class="field">
                <label>Password:</label>
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="field">
                <button type="submit" class="ui fluid primary button">Log in</button>
            </div>
        </form>
    </div>
</div>
© 2021 GitHub, Inc.
