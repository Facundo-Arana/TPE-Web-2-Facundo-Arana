{literal}
<section id="comments">
  <h2 v-if="priority == 0">no tienes permiso para realizar comentarios</h2>
  <h2 class="subtitle" v-else>comments</h2>
  <div v-if="error == false">
    <table>
      <thead>
        <tr>
          <th>comentario</th>
          <th>puntaje</th>
          <th>usuario</th>
          <th v-if="priority == 2"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="comentario in book_comments">
          <td>{{comentario.content}}</td>
          <td>{{comentario.puntaje}}</td>
          <td>{{comentario.userName}}</td>
          <td v-if="priority == 2">
            <button v-on:click="deleteComment(comentario.id)">delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div v-else>
    <h3>no hay comentarios en este libro</h3>
  </div>
</section>
{/literal}