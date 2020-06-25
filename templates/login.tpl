{include 'templates/header.tpl' }
<div class="index">

    <div class="button-login">
        <button id="checkin" value="login">create account</button>
    </div>

    {if isset($msj) }
        <h2 id="msj">{$msj}</h2>
    {/if}
    <div class="login none" id="form-checkin">
        <div class="subtitle">
            <h2>Registrarse</h2>
        </div>
        <form action="library/validate" method="POST">
            <div>
                <label class="oculto"> ---------------- </label>
            </div>
            <label>Email</label>
            <div>
                <input type="email" name="email" required>
            </div>
            <label>UserName</label>
            <div>
                <input type="text" name="user">
            </div>
            <label>Password</label>
            <div>
                <input type="password" name="password">
            </div>
            <label class="oculto"> ---------------- </label>
            <div>
                <input type="submit" value="create">
            </div>
        </form>
    </div>
    <div class="login" id="form-login">
        <form action="library/verify" method="GET">
            <input type="submit" name="guest" value="acceder como invitado">
        </form>
        <div class="subtitle">
            <h2>Acceder</h2>
        </div>
        <form action="library/verify" method="POST">
            <div>
                <label class="oculto"> ---------------- </label>
            </div>
            <label>UserName</label>
            <div>
                <input type="text" name="user">
            </div>
            <label>Password</label>
            <div>
                <input type="password" name="password">
            </div>
            <label class="oculto"> ---------------- </label>
            <div>
                <input type="submit" value="login">
            </div>
        </form>
    </div>
</div>
{if isset($newAccount)}
    <script type="text/javascript" src="js/newAccount.js"></script>
{/if}
<script type="text/javascript" src="js/login.js"></script>
{include 'templates/footer.tpl' }