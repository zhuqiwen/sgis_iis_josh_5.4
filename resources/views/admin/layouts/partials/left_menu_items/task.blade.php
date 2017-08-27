<li {!! (Request::is('admin/tasks') ? 'class="active"' : '') !!}>
    <a href="{{ URL::to('admin/tasks') }}">
        <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list-ul" data-size="18"
           data-loop="true"></i>
        Tasks
        <span class="badge badge-danger" id="taskcount">{{ Request::get('tasks_count') }}</span>
    </a>
</li>