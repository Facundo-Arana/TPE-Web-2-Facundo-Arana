<div class="form-center">
    <label class="oculto"> ---------------- </label>
    <div>
        <h2>All Users</h2>
    </div>
    <label class="oculto"> ---------------- </label>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                    <tr>
                        <td>{$user->id_user}</td>
                        <td>{$user->userName}</td>
                        <td>{$user->priority}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>