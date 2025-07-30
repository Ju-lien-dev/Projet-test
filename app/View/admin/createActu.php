<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<?php include_once __DIR__ . '/partialsAdmin/navBarActu.php'; ?>
<link rel="stylesheet" href="../../style/header.css">
<link rel="stylesheet" href="../style/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/m9bc9wcsl99glc0dz88tjkdxs6mgqi7ki9zvelirtm96qehu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<!-- <script>
    tinymce.init({
        selector: 'textarea',


        plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            // Your account includes a free trial of TinyMCE premium features
            // Try the most popular premium features until Jul 14, 2025:
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
    });
    
</script> -->



<h1>Nouvelle actualité</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container my-5">
        <div class=" mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image">Image : </label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>