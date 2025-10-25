<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications, Environments & Deployments</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        h2, h3 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Applications, Environments & Deployments</h1>

    @foreach($applications as $app)
        <h2>Application: {{ $app->name }} (ID: {{ $app->id }})</h2>

        <table>
            <thead>
                <tr>
                    <th>Environment ID</th>
                    <th>Environment Name</th>
                    <th>Deployments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($app->environments as $env)
                    <tr>
                        <td>{{ $env->id }}</td>
                        <td>{{ $env->name }}</td>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Deployment ID</th>
                                        <th>Commit Hash</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($env->deployments as $deployment)
                                        <tr>
                                            <td>{{ $deployment->id }}</td>
                                            <td>{{ $deployment->commit_hash }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>
</html>
