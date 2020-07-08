{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

<div class="main">
    <div class="wrapper">
        <section>
            <h2 class="subtitle">My Profile</h2>
            {include 'templates/form-edit-pass.tpl'}
        </section>
    </div>
    {if isset($msj)}
        <div class="wrapper">
            <h3>{$msj}</h3>
        </div>
    {/if}
</div>
{include 'templates/footer.tpl'}