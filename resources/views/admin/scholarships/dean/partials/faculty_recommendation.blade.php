<h1 style="text-align: center">
    Faculty Recommendation
</h1>

<h2>
    {{$recommender_first_name}} {{$recommender_last_name}}
</h2>

<h3>
    {{$recommender_department}}
</h3>

<h3>
    {{$recommender_email}}
</h3>

<?php
        echo preg_replace("/[\r\n]/","<p>",$recommendation);
?>


