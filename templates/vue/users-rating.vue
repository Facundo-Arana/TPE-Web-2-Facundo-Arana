{literal}

<section class="rating" id="assessment">
    </br>

    <div v-if="loading">
        <p>Loading users rating...</p>
    </div>

    <div v-if="!loading">

        <div v-if="!users_rating" >
            <h3>no hay calificaciones para este libro</h3>
        </div>

        <div v-if="users_rating" >
            <div class="rating-img">
                <img class="min_img" src="img/star1.png"/>
                <h1 class="rating-info">{{users_rating}}</h1>
            </div>
        </div>
        
    </div>
</section>
{/literal}