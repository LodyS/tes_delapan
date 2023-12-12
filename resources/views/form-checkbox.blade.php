<!DOCTYPE html>
<html>
<head>
    <title>Nang Sinyo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Nang Sinyo - Restu Singgih duet maut</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a href="{{ url('nang-sinyo') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>

                        <form method="post" action="{{ url('/simpan-checkbox') }}" enctype="multipart/form-data">
                        {{ @csrf_field() }}
                            <div class="form-group">
                                <label><strong>Name :</strong></label>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label><strong>Category :</strong></label><br>
                                <label><input type="checkbox" name="category[]" value="RNA Viral Load HIV">RNA/Viral Load HIV</label>
                                <label><input type="checkbox" name="category[]" value="HIV Ag/Ab">HIV Ag/Ab</label>
                                <label><input type="checkbox" name="category[]" value="HIV Antibody ELISA">HIV Antibody ELISA</label>
                                <label><input type="checkbox" name="category[]" value="Rapid HIV test">Rapid HIV test</label>
                                <label><input type="checkbox" name="category[]" value="Oral Fuild HIV test">Oral Fluid test</label>
                            </div>
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea class="form-control" rows="4" cols="40" name="description"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
