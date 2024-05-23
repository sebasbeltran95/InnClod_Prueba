<div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100" type="submit">Salir</button>
    </form>
</div>
