<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Test</title>
    </head>

    <body>
        <div style="width:500px;">
            <canvas id="myChart" width="1600" height="800"></canvas>
        </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
    <script>
        var data = {!! json_encode($data) !!};
        var dateArray = [];
        var priceArray = [];
        for (var key in data) {
            dateArray.push(data[key]['updated_at']);
            priceArray.push(data[key]['price']);
        };

        var ctx = document.getElementById("myChart").getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateArray,
                datasets: [
                    {
                        label: "OmiseGo",
                        data: priceArray
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
</html>