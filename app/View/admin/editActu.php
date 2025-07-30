<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<?php include_once __DIR__ . '/partialsAdmin/navBarActu.php'; ?>

<link rel="stylesheet" href="../../style/header.css">
<link rel="stylesheet" href="../style/style.css">

<script src="https://cdn.tiny.cloud/1/m9bc9wcsl99glc0dz88tjkdxs6mgqi7ki9zvelirtm96qehu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- <script>
    tinymce.init({
        selector: 'textarea',

        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],

        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],

        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),

        setup: function(editor) {
            // À chaque modification, on sauvegarde dans le textarea HTML
            editor.on('change', function() {
                editor.save();
            });
        }
    });
</script> -->

<h1>Modifier l'actualité</h1>
<form action="/admin/edit-actu/<?php echo $article['id']; ?>" method="post">
    <div class="container my-5">
        <div class=" mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" class="form-control" id="exampleFormControlInput1" placeholder="titre">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message"><?php echo htmlspecialchars($article['content']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>