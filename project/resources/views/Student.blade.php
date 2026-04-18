<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h2>Student List</h2>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Marks</th>
        <th>Result</th>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{ $student['name'] }}</td>
        <td>{{ $student['marks'] }}</td>
        <td>
            @if($student['marks'] >= 40)
                Pass
            @else
                Fail
            @endif
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
