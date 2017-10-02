<table style="width: 100%; float: left;" border="1" cellpadding="10">
    <tbody>
    <tr style="height: 21px;">
        <td style="height: 21px; text-align: center;" colspan="2">STUDENT INFORMATION/REQUEST</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">Student Name: {{$applicant->first_name}} {{$applicant->last_name}}</td>
        <td style="height: 21px;">Email Address: {{$applicant->email}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">IUID: {{$applicant->iuid}}</td>
        <td style="height: 21px;">Year and Term: {{$internship->intern_application_year}} {{$internship->intern_application_term}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Credit Hours Desired: {{$internship->intern_application_credit_hours}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px; text-align: center;" colspan="2">THE INTERNSHIP/VOLUNTEER EXPERIENCE</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">Organization Name: {{$organization->intern_organization_name}}</td>
        <td style="height: 21px;">Organization Website: {{$organization->intern_organization_url}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">Supervisor First Name: {{$supervisor->intern_supervisor_first_name}}</td>
        <td style="height: 21px;">Supervisor Last Name: {{$supervisor->intern_supervisor_last_name}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">Supervisor Phone: {{$supervisor->intern_supervisor_phone_country_code}} {{$supervisor->intern_supervisor_phone}}</td>
        <td style="height: 21px;">Supervisor Email: {{$supervisor->intern_supervisor_email}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Experience Location (City/State/Country): {{$internship->intern_application_city}}, {{$internship->intern_application_state}}, {{$internship->intern_application_country}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Has a U.S. State Department Travel Warning been issued for this location: NO</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Provide a detailed description of the internship/volunteer experience and your specific duties:</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">{{$internship->intern_application_description}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">U.S. Departure Date: {{$internship->intern_application_depart_date}}</td>
        <td style="height: 21px;">U.S. Return Date: {{$internship->intern_application_return_date}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;">Internship Start Date: {{$internship->intern_application_start_date}}</td>
        <td style="height: 21px;">Internship End Date: {{$internship->intern_application_end_date}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Work Schedule (including number of work hours per week):</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Hours per week:{{$internship->intern_application_work_hours_per_week}}; {{$internship->intern_application_work_schedule}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Explain why this internship opportunity was chosen (i.e., how will it help you in your future career goals?):</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">{{$internship->intern_application_reasons}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">If it is an internship abroad, explain how you will interact with the host culture:</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">{{$internship->intern_application_cultural_interaction}}</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">Detail any challenges you expect to face during the internship and explain how you intend to face these challenges:</td>
    </tr>
    <tr style="height: 21px;">
        <td style="height: 21px;" colspan="2">{{$internship->intern_application_challenges}}</td>
    </tr>
    </tbody>
</table>