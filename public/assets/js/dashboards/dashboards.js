(function ($) {
  "use strict";
  $.fn.andSelf = function () {
    return this.addBack.apply(this, arguments);
  };
  $(function () {
    if ($("#disponibilidade-salas").length) {
      const doughnutChartCanvas = document.getElementById(
        "disponibilidade-salas"
      );
      new Chart(doughnutChartCanvas, {
        type: "doughnut",
        data: {
          labels: ["Reservadas", "Disponíveis", "Indisponíveis"],
          datasets: [
            {
              data: [doughnutChartCanvas.getAttribute('data-reserv'), doughnutChartCanvas.getAttribute('data-disp'), doughnutChartCanvas.getAttribute('data-indisp')],
              backgroundColor: ["#ffab00", "#00d25b", "#fc424a"],
              borderColor: "#191c24",
            },
          ],
        },
        options: {
          cutout: 70,
          animationEasing: "easeOutBounce",
          animateRotate: true,
          animateScale: false,
          responsive: true,
          maintainAspectRatio: true,
          showScale: false,
          legend: false,
          plugins: {
            legend: {
              display: false,
            },
          },
        },
      });
    }
    if ($("#disponibilidade-professores").length) {
        const doughnutChartCanvas = document.getElementById(
          "disponibilidade-professores"
        );
        new Chart(doughnutChartCanvas, {
          type: "doughnut",
          data: {
            labels: ["Disponíveis", "Indisponíveis"],
            datasets: [
              {
                data: [doughnutChartCanvas.getAttribute('data-disp'), doughnutChartCanvas.getAttribute('data-indisp')],
                backgroundColor: ["#0090e7", "#8f5fe8"],
                borderColor: "#191c24",
              },
            ],
          },
          options: {
            cutout: 70,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: false,
            legend: false,
            plugins: {
              legend: {
                display: false,
              },
            },
          },
        });
      }
      if ($("#disponibilidade-salas-noite").length) {
        const doughnutChartCanvas = document.getElementById(
          "disponibilidade-salas-noite"
        );
        new Chart(doughnutChartCanvas, {
          type: "doughnut",
          data: {
            labels: ["Reservadas", "Disponíveis", "Indisponíveis"],
            datasets: [
              {
                data: [15, 35, 5],
                backgroundColor: ["#ffab00", "#00d25b", "#fc424a"],
                borderColor: "#191c24",
              },
            ],
          },
          options: {
            cutout: 70,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: false,
            legend: false,
            plugins: {
              legend: {
                display: false,
              },
            },
          },
        });
      }
  });
})(jQuery);
