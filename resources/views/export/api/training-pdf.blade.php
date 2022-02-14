<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Scenario Training</title>
</head>
<style>
    .table_title {
        text-align: center;
        color: rgb(24, 101, 255);
        font-weight: 600;
    }

    .detail {
        border: 2px solid rgb(187, 196, 215);
        padding: 10px 40px;
    }

    .trainees_table {
        border: 2px solid rgb(187, 196, 215);
        width: 100%;
        border-collapse: collapse;
    }

    .trainees_table th {
        text-align: left;
        border: 1px solid rgb(187, 196, 215);
        padding: 5px 20px;
    }

    .trainees_table td {
        border: 1px solid rgb(187, 196, 215);
        padding: 5px 20px;
    }
</style>
<body>

<p class="table_title">AFTER ACTION REVIEW(AAR)</p>

<div class="detail">
    <p>Scenario Name: {{ $data->scenario->name }}</p>
    <p>Firing Detail: {{ $data->firing_detail }}</p>
    <p>Training Mode: {{ $data->type }}</p>
    <p>Total Hits: {{ $data->total_hits }}</p>
    <p>Start Time: {{ $data->start_at }}</p>
    <p>End Time: {{ $data->end_at }}</p>
</div>

<p class="table_title">TRAINEES INFO</p>

<table class="trainees_table">
    <tr>
        <th>Name</th>
        <th>Rank</th>
        <th>IC No.</th>
    </tr>
    @foreach($data->trainees as $trainee)
        <tr>
            <td>{{ $trainee["name"] }}</td>
            <td>{{ $trainee["rank"] }}</td>
            <td>{{ $trainee["ic"] }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
