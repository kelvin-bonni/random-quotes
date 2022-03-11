<html>
<body>
<form action="{{ url('/quote/category') }}">
    <select name="categories[]" id="" multiple>
        @foreach($categories as $category)
            <option value="{{ $category }}">{{ $category }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>
