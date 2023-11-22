<!-- Display a list of items -->
@foreach($items as $item)
    {{ $item->name }} - {{ $item->arabic_name }} - Price: {{ $item->price }} - Stock: {{ $item->stock }}<br>
@endforeach
<html>
    hi
</html>