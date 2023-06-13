
<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 CRUD (Create, Read, Update and Delete) with Bootstrap and Datatables</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <style>
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
<div class="container">
    <p><h1>Codeigniter 4 CRUD (Create, Read, Update and Delete) with Bootstrap</h1></p>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form method="post" id="add_create" name="add_create" action="<?= site_url('/submit-form') ?>">
              <div class="form-group">
                <label>nombre</label>
                <input type="text" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                <label>apellido</label>
                <input type="text" name="apellido" class="form-control">
              </div>
              <div class="form-group">
                <label>cedula</label>
                <input type="text" name="cedula" class="form-control">
              </div>
              <div class="form-group">
                <label>usuario</label>
                <input type="text" name="usuario" class="form-control">
              </div>
              <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>telefono</label>
                <input type="text" name="telefono" class="form-control">
              </div>
              <div class="form-group"><br/>
                <button type="submit" class="btn btn-primary btn-block">Submit Data</button>
              </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>
</html>