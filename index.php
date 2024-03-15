<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">

<body>
    <from action="download.php" method="post">
        <div class="p-5">
            <div class="py-3 row">
                <label class="col-3 col-form-label" for="employee">Number of Employees: </label>
                <div class="col-2">
                    <input class="form-control" type="number" id="employee" name="employee" min="1" max="100" value="5">
                </div>
            </div>
            <div class="py-3 row">
                <label class="col-3 col-form-label" for="location">Number of Location: </label>
                <div class="col-2">
                    <input class="form-control" type="number" id="location" name="location" min="1" max="100" value="5">
                </div>
            </div>

            <div class="py-3 row">
                <label class="col-3 col-form-label" for="salary_min">Salary Range: </label>
                <div class="col-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="number" id="salary_min" name="salary_min" min="1" max="100" value="5">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <p>~</p>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="number" id="salary_max" name="salary_max" min="1" max="100" value="5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-3 row">
                <label class="col-3 col-form-label" for="postcode_min">Postal Code Range: </label>
                <div class="col-3">
                    <div class="input-group">
                        <div class="col-8">
                            <input class="form-control" type="number" id="postcode_min" name="postcode_min" min="1" max="100" value="5">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <p>~</p>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <div class="col-8">
                            <input class="form-control" type="number" id="postcode_max" name="postcode_max" min="1" max="100" value="5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="format" class="col-3"> Download Format: </label>

                <div class="col-2">
                    <div class="input-group">
                        <select name="format" id="format" class="form-select">
                            <option value="html">HTML</option>
                            <option value="markdown">MarkDown</option>
                            <option value="json">JSON</option>
                            <option value="text">Text</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center py-2">
            <button class="btn btn-primary col-3" type="submit">Generate</button>
        </div>
        </div>

    </from>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>


<!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
      From: "transform opacity-0 scale-95"
      To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
      From: "transform opacity-100 scale-100"
      To: "transform opacity-0 scale-95"
  -->