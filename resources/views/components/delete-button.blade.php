<form action="{{ $action }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Удалить?')">
        Удалить
    </button>
</form>