<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Gallery</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Control Gallery</h1>
        <div class="controls">
            <div class="control">
                <h2>Button</h2>
                <button class="btn btn-primary">Primary Button</button>
            </div>
            <div class="control">
                <h2>Input</h2>
                <input type="text" class="form-control" placeholder="Enter text">
            </div>
            <div class="control">
                <h2>Checkbox</h2>
                <input type="checkbox" id="checkbox1">
                <label for="checkbox1">Check me!</label>
            </div>
            <div class="control">
                <h2>Radio Buttons</h2>
                <input type="radio" id="radio1" name="radio">
                <label for="radio1">Option 1</label>
                <input type="radio" id="radio2" name="radio">
                <label for="radio2">Option 2</label>
            </div>
            <div class="control">
                <h2>Select</h2>
                <select class="form-control">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>