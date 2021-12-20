<div class="form">
    <div class="content">
        <img src="https://st3.depositphotos.com/1606977/16957/i/600/depositphotos_169576438-stock-photo-top-view-of-people-studying.jpg" alt="nome do curso">
        <form method="POST" action="/course/store">
            <div class="input">
                <label for="title">Título</label>
                <input id="title" type="text">
            </div>
            <div class="input">
                <label for="description">Descrição</label>
                <textarea name="description" id="text" cols="30" rows="4"></textarea>
            </div>
            <div class="input">
                <label for="link">Link</label>
                <input id="link" type="text">
            </div>
            <div class="input">
                <label for="image">Imagem</label>
                <input id="image" type="file">
            </div>

            <div class="actions">
                <button class="delete">Excluir</button>
                <button class="edit">Editar</button>
                <button class="save">Salvar</button>
            </div>
        </form>
    </div>
</div>
