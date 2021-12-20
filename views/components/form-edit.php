<div class="form">
    <div class="content">
        <img src="{{course.image}}" alt="nome do curso">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{course.id}}">
            <div class="input">
                <label for="title">Título</label>
                <input id="title" type="text" name="title" value="{{course.title}}" required>
            </div>
            <div class="input">
                <label for="description">Descrição</label>
                <textarea name="description" id="text" cols="30" rows="4" required>{{course.description}}</textarea>
            </div>
            <div class="input">
                <label for="link">Link</label>
                <input id="link" type="text" name="link" value="{{course.link}}" required>
            </div>
            <div class="input">
                <label for="image">Imagem</label>
                <input id="image" name="image" type="file">
            </div>

            <div class="actions">
                <button class="delete" formaction="{{action.delete}}">Excluir</button>
                <button class="edit" formaction="{{action.update}}">Editar</button>
            </div>
        </form>
    </div>
</div>
