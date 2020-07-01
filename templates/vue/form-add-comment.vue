{literal}
<section id="form-add-comment" class="form-center">
    <div v-if="priority == 0" >
        <h2 class="subtitle">no tienes permiso para realizar comentarios</h2>
    </div>
    <div v-else>
        <h2 class="subtitle">Post your comment</h2>
        <form @submit="checkForm" method="POST">
            <div>
                <textarea v-model="userComment" id="userComment" placeholder="write comment" required></textarea>
            </div>
            <div>
                <input type="number" v-model="puntaje" id="puntaje" max=5 min=1 placeholder="rate" required>
                <input type="submit" value="Send Comment">
            </div>
        </form>
    </div>


</section>
{/literal}