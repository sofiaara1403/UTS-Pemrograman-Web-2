<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Data Jurusan</title>

```
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background: #eeeeee;
    }
</style>
```

</head>
<body>

<h2>Data Jurusan</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>
    </thead>

```
<tbody>
    @foreach($jurusan as $index => $j)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $j->nama_jurusan }}</td>
        <td>{{ $j->akreditasi }}</td>
    </tr>
    @endforeach
</tbody>
```

</table>

</body>
</html>
