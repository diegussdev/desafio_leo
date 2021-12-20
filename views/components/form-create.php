<div class="form">
    <div class="content">
        <form method="POST" enctype="multipart/form-data">
            <div class="input">
                <label for="title">Título</label>
                <input id="title" type="text" name="title" required>
            </div>
            <div class="input">
                <label for="description">Descrição</label>
                <textarea name="description" id="text" cols="30" rows="4" required></textarea>
            </div>
            <div class="input">
                <label for="link">Link</label>
                <input id="link" type="text" name="link" required>
            </div>
            <div class="input">
                <label for="image">Imagem</label>
                <input id="image" type="file" name="image">
            </div>

            <div class="actions">
                <button class="save" formaction="{{action}}">Salvar</button>
            </div>
        </form>
    </div>
</div>
