<div class="courses">
    <div class="content">
        <div class="title">
            <h1>Meus Cursos</h1>
        </div>
        <div class="grid">
            <?=DesafioLeo\Controllers\CourseController::listAll();?>
            <?=DesafioLeo\Utility::showComponent('empty-card.php');?>
        </div>
    </div>
</div>
