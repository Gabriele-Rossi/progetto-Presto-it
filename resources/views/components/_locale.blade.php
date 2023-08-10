<form action="{{route('set_language_locale', $lang)}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" alt="" width="32" height="32">
    </button>
</form>