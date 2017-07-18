<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />

    <title>附近的问卷</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <style>
        @media (min-width: 922px) {
.whole-panel {
            max-width: 80%;
            margin: 30px auto;
        }
         }
        
    </style>
</head>

<body>
    <div class="panel panel-default whole-panel">
        <!-- Default panel contents -->
        <div class="panel-heading">附近的问卷</div>

        <table class="table">
            <thead>
                <td>问卷名称</td>
                <td>距离</td>
                <td>填写</td>
            </thead>
            @foreach($questions as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->dist }}</td>
                <td><a href="{{ $item->url }}">点击填写</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>