{include 'templates/header.tpl' }

<div class="subtitle">
    <h2>Escribe la clave que recibiste</h2>
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
            <input class="none" type="text" name="user" value="{$name}">
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