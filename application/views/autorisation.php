<div class="border" id="autorisation">
    <div class="control-group" id="errors">
        <?php if (isset($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <?php echo $error; ?><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="control-group">
        <label class="control-label" for="login">Login</label>
        <div class="controls">
            <input type="text" id="username" name="login" class="input-xlarge required">
            <p class="help-block">Username can contain any letters or numbers</p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="password" class="input-xlarge required">
            <p class="help-block">Password should be at least 4 characters</p>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button class="btn btn-success">Log in</button>
        </div>
    </div>
</div>