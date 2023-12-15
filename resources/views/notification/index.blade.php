<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Notifications</title>
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
    <h3>Notifications</h3>
    <div class="row row-cols-2">
        @foreach ($notifications as $notification)
            <div class="col mb-4">
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
                        <a href="{{ route('notification.show', $notification->id) }}"
                           class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('notification.edit', $notification->id) }}"
                           class="btn btn-success btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" data-id="{{ $notification->id  }}">Delete</button>
                    </div>
                    <div class="card-footer">
                        Created Date: {{ date('Y-m-d H:i:s', strtotime($notification->created_at)) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $('.btn-danger').click(function ()
    {
        if (window.confirm('Do you really want to delete the notification?'))
        {
            let id    = $(this).data('id');
            let token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: `/notifications/${id}`,
                type: 'DELETE',
                data: {'_token': token}
            })
            .done((response) => {
                location.reload();
            })
            .fail(() => {
            });
        }
    });
</script>

</body>
</html>
