Admin Page
<br>
Xin chào: {{ Session::get('inforUser')['usname'] }}
<br>
Bạn là: 
@switch(Session::get('inforUser')['acctype_id'])
    @case("1")
        Super Admin<br>
        Bạn có toàn quyền
        @break
    @case("2")
        Admin<br>
        Bạn có 1 số quyền
        @break
@endswitch
<a href="/logout"><button id="btnLogOut">Logout</button></a>
