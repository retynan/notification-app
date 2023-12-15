<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Notifications - View Notification</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ route('notification.index') }}>Notifications</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('notification.create') }}>Add Notification</a>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h3>View Notification</h3>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h4>#{{ $notification->id }}</h4>
                    <div class="mt-1">
                        <span class="badge text-bg-primary">
                            Type: {{ $notification->typeLabel[$notification->type] }}
                        </span>
                        <span class="badge text-bg-primary">
                            Status: {{ $notification->statusLabel[$notification->status] }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <span class="card-title">To: {!! $notification->to !!}</span>
                    <p class="card-text">{!! $notification->body !!}</p>
                </div>
                <div class="card-body">
                    <h5>Result:</h5>
                    @if ($notification->result)
                        <code>{{ $notification->result }}</code>
                    @else
                        <code>{}</code>
                    @endif
                </div>
                <div class="card-footer">
                    <div>Created Date: {{ date('Y-m-d H:i:s', strtotime($notification->created_at)) }}</div>
                    @if ($notification->updated_at)
                        <div>Updated Date: {{ date('Y-m-d H:i:s', strtotime($notification->updated_at)) }}</div>
                    @endif
                    @if ($notification->sent_at)
                        <div>Sent Date: {{ date('Y-m-d H:i:s', strtotime($notification->sent_at)) }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
