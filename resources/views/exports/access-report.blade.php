<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Accesos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #303845;
        }
        .filters {
            margin-bottom: 15px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #303845;
            color: white;
            padding: 6px;
            text-align: left;
            font-size: 12px;
        }
        td {
            padding: 6px;
            border-bottom: 1px solid #ccc;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <h1>Reporte de Accesos - Zona A</h1>

    <div class="filters">
        <strong>Fecha inicio:</strong> {{ $start ? \Carbon\Carbon::parse($start)->format('d/m/Y') : 'Todas' }} <br>
        <strong>Fecha fin:</strong> {{ $end ? \Carbon\Carbon::parse($end)->format('d/m/Y') : 'Todas' }}
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Institución</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accesses as $access)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $access->sfstaff_id }}</td>
                    <td>{{ $access->staff->name }}</td>
                    <td>{{ $access->staff->position }}</td>
                    <td>{{ $access->staff->institution->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($access->start_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $access->end_at ? \Carbon\Carbon::parse($access->end_at)->format('d/m/Y H:i') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
