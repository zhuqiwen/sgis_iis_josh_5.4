<li {!! (Request::is('admin/calendar') ? 'class="active"' : '') !!}>
    <a href="{{ URL::to('admin/calendar') }}">
        <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="calendar" data-size="18"
           data-loop="true"></i>
        Calendar
        <span class="badge badge-danger event_count">7</span>
    </a>
</li>