@if(Auth::user()->userable instanceof \App\Models\Candidate)
<li>
    <a href="#">Dashboard</a>
</li>
<li>
    <a href="{{route('candidate.profile')}}">Meu perfil</a>
</li>
<li>
    <a href="#">Curriculo</a>
</li>
<li>
    <a href="#">Dados cadastrais</a>
</li>
@else
    <li>
        <a href="#">Dashboard</a>
    </li>

@endif