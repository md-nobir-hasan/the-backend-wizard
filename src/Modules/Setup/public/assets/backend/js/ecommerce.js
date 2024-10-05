(function () {
    "use strict";

    /**
     * ------------------------------------------------------------------------
     *  Move the demo script to the footer before </body>
     *  and edit the script for dynamic data needs.
     * ------------------------------------------------------------------------
     */

    // Colors
    const text_primary_500 = "#6366F1";
    const text_secondary_500 = "#EC4899";
    const text_yellow_500 = "#F59E0B";
    const text_green_500 = "#22C55E";
    const text_gray_500 = "#84848f";

    // Convert HEX TO RGBA
    function hexToRGBA(hex, opacity) {
        if (hex != null) {
            return (
                "rgba(" +
                (hex = hex.replace("#", ""))
                    .match(new RegExp("(.{" + hex.length / 3 + "})", "g"))
                    .map(function (l) {
                        return parseInt(hex.length % 2 ? l + l : l, 16);
                    })
                    .concat(isFinite(opacity) ? opacity : 1)
                    .join(",") +
                ")"
            );
        }
    }

    // Demo Charts JS
    const myCharts = function () {
        Chart.defaults.color = text_gray_500;

        // ECOMMERCE DOUGHNUT CHART
        const chart_dougnut = document.getElementById("DoughnutChart");
        if (chart_dougnut != null) {
            const ctd = chart_dougnut.getContext("2d");
            const DoughnutChart = new Chart(ctd, {
                type: "doughnut",
                data: {
                    labels: [
                        "Search Engine",
                        "Social Post",
                        "Paid Ads",
                        "Refferal Link",
                        "Direct Link",
                        "Other Source",
                    ],
                    datasets: [
                        {
                            label: "Traffic Source",
                            data: [925, 430, 252, 135, 78, 53],
                            backgroundColor: [
                                text_green_500,
                                text_primary_500,
                                hexToRGBA(text_primary_500, 0.6),
                                text_yellow_500,
                                hexToRGBA(text_yellow_500, 0.6),
                                text_secondary_500,
                            ],
                            hoverOffset: 4,
                        },
                    ],
                },
                options: {
                    animation: {
                        delay: 2000,
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: "bottom",
                        },
                    },
                },
            });
        }
        // ECOMMERCE BAR CHART
        const chart_bar = document.getElementById("BarChart");
        if (chart_bar != null) {
            const ctb = chart_bar.getContext("2d");
            const BarChart = new Chart(ctb, {
                type: "bar",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                    ],
                    datasets: [
                        {
                            label: "# Visitors",
                            data: [
                                1170, 1321, 1835, 1834, 2183, 1504, 2175, 2521,
                            ],
                            backgroundColor: [hexToRGBA(text_primary_500, 0.6)],
                            borderColor: [hexToRGBA(text_primary_500, 0.6)],
                            borderWidth: 1,
                        },
                        {
                            label: "# Sales",
                            data: [670, 721, 835, 734, 683, 724, 875, 1021],
                            backgroundColor: [text_primary_500],
                            borderColor: [text_primary_500],
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    animation: {
                        y: {
                            duration: 4000,
                            from: 500,
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: false,
                            },
                        },
                        y: {
                            display: true,
                            grid: {
                                borderDash: [4, 4],
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: "bottom",
                        },
                    },
                },
            });
        }
        // ECOMMERCE LINE CHART
        const chart_line = document.getElementById("LineChart");
        if (chart_line != null) {
            const ctl = chart_line.getContext("2d");
            const LineChart = new Chart(ctl, {
                type: "line",
                data: {
                    labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    datasets: [
                        {
                            label: "Previous Week",
                            data: [70, 121, 235, 334, 483, 304, 475],
                            fill: false,
                            borderColor: text_primary_500,
                            cubicInterpolationMode: "monotone",
                            tension: 0.1,
                        },
                        {
                            label: "Current Week",
                            data: [13, 204, 175, 421, 331, 532, 683],
                            fill: false,
                            borderColor: text_green_500,
                            cubicInterpolationMode: "monotone",
                            tension: 0.1,
                        },
                    ],
                },
                options: {
                    animation: {
                        y: {
                            duration: 4000,
                            from: 500,
                        },
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: "bottom",
                        },
                    },
                    interaction: {
                        mode: "index",
                        intersect: false,
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                            },
                            grid: {
                                display: false,
                            },
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: "Daily Sales",
                            },
                            grid: {
                                borderDash: [4, 4],
                            },
                            Min: -10,
                            Max: 200,
                        },
                    },
                },
            });
        }
    };

    /**
     * ------------------------------------------------------------------------
     * Launch Functions
     * ------------------------------------------------------------------------
     */
    myCharts();
})();
