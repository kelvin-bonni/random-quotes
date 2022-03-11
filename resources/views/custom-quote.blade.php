<html>
<body>
<form action="{{ url('/quote/customize') }}">
    <input type="text" name="firstName" required value="{{ request('firstName') }}" placeholder="First name"> <br>
    <input type="text" name="lastName" required value="{{ request('lastName') }}" placeholder="Last name"> <br>
    <button type="submit">Submit</button>
</form>
@if($quote)
<br>
<hr>
<h3>Custom Quote</h3>
<blockquote>
    {{ $quote }}
</blockquote>
@endif
</body>
</html>
