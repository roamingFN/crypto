<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Test</title>
    </head>

    <body>
        <div style="width:500px;">
            <canvas id="myChart" width="1600" height="400"></canvas>
        </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
    <script>
        var data = {!! json_encode($data) !!};
        var priceArray = [];
        for (var key in data) {
            priceArray.push(data[key]['price']);
        };

        var ctx = document.getElementById("myChart").getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1', '2', '3', '4', '5'],
                datasets: [
                    {
                        label: "OmiseGo",
                        data: priceArray,
                        borderColor: "red"
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
</html>