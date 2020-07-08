<div class="form-center">
    <form action="library/editPassword" method="POST">
        <label class="oculto"> ---------------- </label>
        <h2>Edit Password</h2>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="password" name="oldPass" placeholder="old password" required>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="password" name="newPass" placeholder="new password" required>
        </div>
        <label class="oculto"> ---------------- </label>
        <div class="oculto">
            <input type="text" name="username" value="{$username}" required>
        </div>
        <div>
            <input type="submit" value="edit">
        </div>
    </form>
</div>