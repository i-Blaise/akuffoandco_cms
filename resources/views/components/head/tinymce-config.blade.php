{{-- <script src="https://cdn.tiny.cloud/1/tyyxmenmdgznh2o3kecrdz3goo4q5541avldss8w1vlzhr3b/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdn.tiny.cloud/1/4i8rd2x61wxq9jwjm1g9xcc0psxqg5x24fujxurkxmrid9hk/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>


<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance-caption', // Replace this CSS selector to match the placeholder element for TinyMCE
    height: 200,
    plugins: 'code table lists',
    menubar: 'edit format',
    toolbar: 'undo redo | blocks | bold italic'
    setup: function(editor) {
        var maxChars = 300;
        editor.on('keydown', function(e) {
          var content = editor.getContent({format: 'text'});
          if (content.length >= maxChars && e.keyCode !== 8 && e.keyCode !== 46) {
            e.preventDefault();
          }
        });
      }
  });
</script>

<script>
    tinymce.init({
      selector: 'textarea#myeditorinstance-body', // Replace this CSS selector to match the placeholder element for TinyMCE
      height: 600,
      plugins: 'code table lists',
      toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

<script>
    tinymce.init({
      selector: 'textarea#myeditorinstance-excerpt', // Replace this CSS selector to match the placeholder element for TinyMCE
      height: 300,
      plugins: 'code table lists',
      toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    });
</script>


<script>
    tinymce.init({
      selector: 'textarea#myeditorinstance-modal-body', // Replace this CSS selector to match the placeholder element for TinyMCE
      height: 700,
      plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
        'codesample', 'quickbars', 'directionality', 'visualchars', 'nonbreaking',
        'pagebreak', 'save', 'template'
      ],
      toolbar: 'undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image media table codesample | ' +
        'charmap emoticons searchreplace visualblocks code fullscreen preview | ' +
        'forecolor backcolor removeformat | help',
      menubar: 'file edit view insert format tools table help'
    });
</script>
