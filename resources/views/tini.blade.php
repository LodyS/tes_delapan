<!DOCTYPE html>
<div class="page-header">
    <h1 class="page-title">Tini</h1>
</div>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.tiny.cloud/1/4rz2jr6pppeuktgimrteby3pax3yz4xomhawkbjfnqji46ha/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div class="page-content">
    <div class="panel">
        <div class="panel-body">
            @include('flash-message')
	        <form action="{{ url('tini-store')}}" method="post" enctype="multipart/form-data">@csrf

                <textarea class="form-control"  name="lagu">{{ $data->lagu ?? '' }}</textarea>


                <button type="submit" align="right" class="btn btn-primary"><i class="icon glyphicon glyphicon-list-alt"></i>Simpan</button>
            </form>
        </div>
    </div>
</div>
</html>

<script>
        tinymce.init({
            selector: 'textarea',

            image_class_list: [
            {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />


