{include 'templates/header.tpl' }

<div class="subtitle">
    <h2>Escribe tu nombre de usuario y recibiras un mail</h2>
</div>
{if isset($msjr)}
    <div>
        <p>{$msjr}</p>
    </div>
{/if}
<div class="login">
    <div>
        <a href="library/login">volver al login</a>
    </div>
    <div class="subtitle">
        <h2>Recuperar cuenta</h2>
    </div>
    <form action="library/checkUserToGetToken" method="POST">
        <div>
            <label class="oculto"> ---------------- </label>
        </div>
        <label>UserName</label>
        <div>
            <input type="text" name="username">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="send">
        </div>
    </form>
</div>

{include 'templates/footer.tpl' }