<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Form</title>

    <style>
    #box {
        background: #0E2954;
    }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body style="background  : #0E2954;">
    <div class="d-flex justify-content-center" id="box">
        <form class="container p-5 m-5 w-50 rounded-start rounded-end bg-white shadow p-3 mb-5 bg-body-tertiary rounded"
            action="login.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="fs-2 text-center pb-3">Registration Form</div>
            <div class="mb-3">
                <label class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" max_length=100 required>
            </div>
            <div class="mb-3">
                <label class="form-label">Your Age</label>
                <input type="number" class="form-control" name="age" min=5 max=120 required>
            </div>
            <div class="mb-3">
                <label class="form-label">Your Weight</label>
                <input type="number" class="form-control" name="weight" min=10 max=300 required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email_id" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload your health report</label>
                <input type="file" class="form-control" accept=".pdf" name="pdf_file" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="67108864" />
            </div>

            <div class="d-flex justify-content-center mt-5">
                <button class="btn btn-success w-50" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>