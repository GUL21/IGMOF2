CKEDITOR.editorConfig = function(config) {
// ...
   config.filebrowserBrowseUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'http://localhost:8080/igmof/admin/js/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...
};