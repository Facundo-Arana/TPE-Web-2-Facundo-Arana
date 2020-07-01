{literal}

<section class="rating" id="assessment">
    </br>
    <div v-if="loading == true">
        <p>Loading users rating...</p>
    </div>
    <div v-else>
        <div v-if="users_rating != 0">
            <div class="rating-img">
                <img class="min_img" src="img/star1.png"/>
                <h1 class="rating-info">{{users_rating}}</h1>
            </div>
        </div>
        <div v-else>
            <h3>no hay calificaciones para este libro</h3>
        </div>
    </div>
</section>
{/literal}