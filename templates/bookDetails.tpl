{include 'templates/header.tpl' }
{include 'templates/nav.tpl'}
<div class="main">
    <section class="wrapper">
        <div>
            <figure>
                {if ($book->img)}
                    <img class="big_img" src="{$book->img}" name="{$book->book_name}">
                {else}
                    <img class="big_img" alt="no image" name="{$book->book_name}">
                {/if}
            </figure>
        </div>
        <div class="description">
            <h2 class="subtitle">{$book->book_name}</h2>
            <p>"{$book->details}"</p>

            {include 'templates/vue/users-rating.vue'}
        </div>
    </section>
    <section class="wrapper">
        <p class="none" id="id_user">{$id_user}</p>
        <div>
            {include 'templates/vue/form-add-comment.vue'}
        </div>
        <div>
            {include 'templates/vue/comments.vue'}
        </div>
        <script src="js/comments.js"></script>
    </section>
</div>

{include 'templates/footer.tpl'}