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

                        <form method="post" action="{{ url('upload-controller') }}" enctype="multipart/form-data">{{ @csrf_field() }}

                                <div class="form-group">
                                    <label><strong>Name :</strong></label>
                                    <input type="file" name="file" class="form-control">
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
