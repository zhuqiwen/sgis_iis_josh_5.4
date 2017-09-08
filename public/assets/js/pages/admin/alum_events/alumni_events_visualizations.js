var chart = c3.generate({
    bindto: '#attendance_chart',
    data: {
        // iris data from R
        columns: [
            ['data1', 30],
            ['data2', 120],
            ['data3', 85]
        ],
        type : 'pie'
    }
});