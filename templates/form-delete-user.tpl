<div class="form-center">
    <form action="library/admin/deleteUser" method="POST">
        <label class="oculto"> ---------------- </label>
        <div>
            <h2>Delete User</h2>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idUser">
                <option value="">Select User</option>
                {foreach from=$users item=user}
                    <option value="{$user->id_user}">{$user->userName}</option>
                {/foreach}
            </select>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="delete">
        </div>
    </form>
</div>