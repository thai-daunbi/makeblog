<html>
    <body>
        <ul>
            @foreach ($data as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    </body>
</html>