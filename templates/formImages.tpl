<div class="form-center" id="cover-title">
    <div>
        <label class="oculto">---------</label>
    </div>
    <div>
        <h2>Change Cover</h2>
    </div>
    <div>
        <label class="oculto">-</label>
    </div>
    <div>
        <figcaption class="portada">
            <img src="" class="big_img" id="cover" alt="" />
        </figcaption>
    </div>
    <form action="library/admin/editCover" method="POST" enctype="multipart/form-data">
        <div>
            <input class="oculto" type="text" name="id_book_cover" id="id_book_cover">
            <input class="oculto" type="text" name="link_img" id="link_img" value="">
        </div>
        <div>
            <input type="file" id="input-cover" name="cover">
        </div>
        <div>
            <label>
                <p>si no selecciona una imagen borrara la actual</p>
            </label>
        </div>
        <div>
            <input type="submit" id="submitCover" name="submitCover" value="Delete Cover">
        </div>
    </form>
</div>