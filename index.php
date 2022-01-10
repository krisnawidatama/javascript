<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Hello, world!</title>
    </head>
    <body>
        <?php
        if ($_FILES) {
            if (is_array($_FILES['img']['name'])) {
                foreach ($_FILES['img']['name'] as $key => $value) {
                    move_uploaded_file($_FILES["img"]["tmp_name"][$key], $_FILES['img']['name'][$key]);
                }
            }
        }
        ?>

        <div class="container">
            <div class="row mt-3">
                <form action="" method="post" enctype="multipart/form-data" id="form">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload File</label>
                        <input class="form-control" type="file" name="img" id="img">
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" id="handleForm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("handleForm").addEventListener("click", function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onloadstart = function () {
                        document.getElementById("handleForm").innerHTML = "Loading...";
                    }
                    var formData = new FormData(document.getElementById("form"));
                    for (var i = 0; i < document.getElementById("img").files.length; i++) {
                        console.log(i)
                        formData.append("img[]", document.getElementById("img").files[i]);
                    }

                    xhr.open("POST","", true);
                    xhr.send(formData);
                    setTimeout(function () {
                        alert("Berhasil");
                        document.getElementById("img").value = "";
                        document.getElementById("handleForm").innerHTML = "Simpan";
                    }, 3000);
                });

            });
        </script>
    </body>
</html>
