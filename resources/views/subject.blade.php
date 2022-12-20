<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remainder</title>
</head>

<body>
    <h1>This is a remainder for your advertisment that will be started tomorrow</h1>


    <table>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        <tr>

            <td>{{ $data->title }}</td>
            <td>{{ $data->type }}</td>
            <td>{{ $data->description }}</td>
            <td>{{ $data->start_date }}</td>

        </tr>
    </table>

</body>

</html>
