<div class="form-center">
    <label class="oculto"> ---------------- </label>
    <div>
        <h2>All Users (without me)</h2>
    </div>
    <label class="oculto"> ---------------- </label>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Priority</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                    <tr>
                        <td>{$user->userName}</td>
                        <td>{$user->priority}</td>
                        <td>
                            <form action="library/admin/deleteUser" method="POST">
    
                                <input type="text" class="none" name="idUser" value="{$user->id_user}">
    
                                <input type="submit" value="delete">
    
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>