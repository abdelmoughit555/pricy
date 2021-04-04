<div>
    <canvas id="line-chart" class="w-full" height="400"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: {!! $label !!},
            datasets: [{
                data: {!! $data !!},
                backgroundColor: "rgb(255,217,101, .6)",
            }, ]
        },
        options: {
            legend: {
                display: false,
            },
        }
    });

</script>
<style>
    .text-green {
        color: #00BC8B
    }

    .bg-green {
        background-color: #00BC8B
    }

</style>
