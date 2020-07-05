{include 'templates/header.tpl' }
<div class="msj">
    <div>
        <h2 class="subtitle">Escribe la clave que recibiste</h2>
    </div>
    {if isset($msj)}
        <div>
            <p>{$msj}</p>
        </div>
    {/if}
</div>
<div class="login">
    <div>
        <a href="library/forgetfulUser">Volver a generar clave</a>
    </div>
    <form action="library/checkToken" method="POST">
        <div>
            <label class="oculto"> ---------------- </label>
        </div>
        <label>Clave</label>
        <div>
            <input class="none" type="text" name="user_id" value="{$user_id}">
        </div>
        <div>
            <input type="text" name="token" required>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="send">
        </div>
    </form>
</div>

{include 'templates/footer.tpl' }