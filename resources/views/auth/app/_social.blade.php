<form action="{{route('login.social')}}" method="POST">
    {{csrf_field()}}
    <ul class="social-icons">
        <li>
            <button class="btn-facebook" name="social_type" value="facebook" title="Facebook">
                <i class="fa fa-facebook"></i>
            </button>
        </li>
        <li>
            <button class="btn-github" name="social_type" value="github" title="Github">
                <i class="fa fa-github"></i>
            </button>
        </li>
    </ul>
</form>
