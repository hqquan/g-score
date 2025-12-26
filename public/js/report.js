$(document).ready(function () {
    $("canvas[id$=Chart]").each(function () {
        const labels = $(this).data("labels");
        const values = $(this).data("values");
        new Chart(this, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Number of Students",
                        data: values,
                        backgroundColor: "skyblue",
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
});
