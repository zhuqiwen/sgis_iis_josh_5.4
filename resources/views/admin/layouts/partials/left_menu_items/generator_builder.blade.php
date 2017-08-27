<li {!! (Request::is('admin/generator_builder') ? 'class="active"' : '') !!}>
    <a href="{{  URL::to('admin/generator_builder') }}">
        <i class="livicon" data-name="shield" data-size="18" data-c="#F89A14" data-hc="#F89A14"
           data-loop="true"></i>
        Generator Builder
    </a>
</li>