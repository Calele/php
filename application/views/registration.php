<div class="border" id="registration">
    <div class="control-group" id="errors">
        <?php if (isset($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <?php echo $error; ?><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="control-group">
        <!-- Username -->
        <label class="control-label"  for="username">Login</label>
        <div class="controls">
            <input type="text" id="login" name="login" class="input-xlarge required" minleght="2">
            <p class="help-block">Username can contain any letters or numbers</p>
        </div>
    </div>

    <div class="control-group">
        <!-- E-mail -->
        <label class="control-label" for="email required">E-mail</label>
        <div class="controls">
            <input type="text" id="email" name="email" class="input-xlarge email">
            <p class="help-block">Please provide your E-mail</p>
        </div>
    </div>

    <div class="control-group">
        <!-- Password-->
        <label class="control-label required" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="password" class="input-xlarge required">
            <p class="help-block">Password should be at least 4 characters</p>
        </div>
    </div>

    <div class="control-group">
        <!-- Password -->
        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
        <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" class="input-xlarge required password">
            <p class="help-block">Please confirm password</p>
        </div>
    </div>

    <div class="control-group">
        <!-- Button -->
        <div class="controls">
            <button class="btn btn-success">Register</button>
        </div>
    </div>
</div>