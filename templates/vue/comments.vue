{literal}

<section id="comments">
  
  <table>
    <thead>
      <tr>
        <th>comentario</th>
        <th>puntaje</th>
        <th>usuario</th>
        <th></th>
      </tr>
    </thead>
    <tbody v-for="comentario in comentarios">
      <tr>
        <td>{{comentario.comment}}</td>
        <td>{{comentario.puntaje}}</td>
        <td>{{comentario.userName}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
 



</section>







{/literal}