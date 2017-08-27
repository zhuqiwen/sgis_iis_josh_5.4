<li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
    <a href="{{ route('admin.dashboard') }}">
        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Dashboard</span>
    </a>
</li>