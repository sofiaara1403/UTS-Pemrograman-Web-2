<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Data Matakuliah</title>

<style>
body{
    font-family: Arial, sans-serif;
}

table{
    width:100%;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid black;
}

th,td{
    padding:8px;
}

h2{
    text-align:center;
}
</style>

</head>
<body>

<h2>Data Matakuliah</h2>

<table>
<thead>
<tr>
<th>No</th>
<th>Nama Matakuliah</th>
<th>SKS</th>
<th>Jurusan</th>
</tr>
</thead>

<tbody>
@foreach($matakuliah as $index => $m)
<tr>
<td>{{ $index + 1 }}</td>
<td>{{ $m->nama_matakuliah }}</td>
<td>{{ $m->sks }}</td>
<td>{{ $m->jurusan->nama_jurusan }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>