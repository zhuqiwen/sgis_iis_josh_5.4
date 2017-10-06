<div style="text-align: left">
@if($editable)
    <form action="#">
    @else
@endif
    <div class="form-body">
        <div class="form-group mar-top">
            <label for="title" class="control-label">
                Title
            </label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="livicon" data-name="tag" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                </span>
                @if($editable)
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$notification->title}}" />
                @else
                    <input type="text" class="form-control" placeholder="Title" value="{{$notification->title}}" readonly />
                @endif
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label" for="to">
                To
            </label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                </span>
                @if($editable)
                    <input type="text" class="form-control" name="title" value="{{$notification->to}}" />
                @else
                    <input type="text" class="form-control" value="{{$notification->to}}" readonly />
                @endif
            </div>
        </div>
        <div class="form-group mbn">
            <label for="body" class="control-label">Message</label>
            @if($editable)
                <textarea class="form-control resize_vertical" rows="5" name="body">
<!--                    --><?php //echo preg_replace("/[\r\n]/","<p>",$notification->body); ?>
                    <?php echo $notification->body; ?>
                </textarea>
            @else
                <textarea class="form-control resize_vertical" rows="5" name="body" readonly>
<!--                    --><?php //echo preg_replace("/[\r\n]/","<p>",$notification->body); ?>
                    <?php echo $notification->body; ?>

                </textarea>
            @endif
        </div>

        <div class="form-group mbn">
            <label for="body" class="control-label">Attachment</label>
            <a class="form-control" href="{{route('admin.dean_scholarship_package_file', ['record_id' => $application->id, 'file' => 'package'])}}" target="_blank">
                {{$applicant->first_name}} {{$applicant->last_name}}'s Deans Scholarship Application Package.pdf
            </a>
        </div>
    </div>
    <div class="form-actions">
        @if($editable)
        <button type="submit" class="btn btn-primary">Forward to committee</button>
        &nbsp;
        <button type="button" class="btn btn-danger">Save</button>
        &nbsp;
        <input type="reset" class="btn btn-default hidden-xs" value="Reset">
        @endif
    </div>

@if($editable)
    </form>
    @else

@endif
</div>