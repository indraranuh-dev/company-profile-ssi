$(function() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "http://127.0.0.1:8000/api/visitors",
        method: "GET",
        success: function(data) {
            const label = [],
                value = [];
            let obj = Object.keys(data.data);
            obj.forEach((val, index) => {
                label.push(val);
                value.push(data.data[val]);
            });

            let ctx = document.getElementById("visitor-chart").getContext("2d");
            let myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: label,
                    datasets: [
                        {
                            label: "Jumlah visitor",
                            data: value,
                            borderWidth: 2,
                            borderColor: "rgb(34,85,164)",
                            fill: true,
                            backgroundColor: "rgb(46, 106, 199)",
                            pointHoverBackgroundColor: "rgb(46, 106, 199)",
                            pointHoverBorderWidth: 1,
                            showLines: true
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                },
                                gridLines: {
                                    color: "#e2e2e2",
                                    drawOnChartArea: false,
                                    zeroLineColor: "rgb(230, 230, 230)"
                                }
                            }
                        ],
                        xAxes: [
                            {
                                gridLines: {
                                    display: false
                                }
                            }
                        ]
                    },
                    animation: {
                        tension: {
                            duration: 1000,
                            easing: "easeInQuint",
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    }
                }
            });
        },
        error: function(err) {
            console.log(err);
        }
    });
});
