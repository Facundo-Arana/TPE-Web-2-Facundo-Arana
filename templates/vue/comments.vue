{literal}
<section class="form-center" id="comments">
  <h2 class="subtitle">comments</h2>

  <div v-if="loading">
    <p>Loading comments...</p>
  </div>

  <div v-if="!loading" >
    <div v-if="!error">
      <table >
        <thead>
          <tr>
            <th>comentarios</th>
            <th>puntaje</th>
            <th>usuario</th>
            <th v-if="priority == 2"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="comentario in book_comments">
            <td class="text-size">{{comentario.content}}</td>
            <td>{{comentario.puntaje}}</td>
            <td>{{comentario.userName}}</td>
            <td v-if="priority == 2">

              <button v-on:click="deleteComment(comentario.id)">delete</button>
            
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="error">
      <h3>no hay comentarios en este libro</h3>
    </div>
  </div>
</section>


{/literal}