// graficoJuegos.js

// Esta función se puede llamar después de definir los datos en PHP
function crearGraficoJuegos(duenos, cantidades) {
    const ctx = document.getElementById('graficoJuegos').getContext('2d');
    const grafico = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: duenos,
        datasets: [{
          label: 'Cantidad',
          data: cantidades,
          backgroundColor: ['#4e79a7', '#f28e2b', '#e15759', '#76b7b2', '#59a14f']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Juegos por dueño',
            font: { size: 20 }
          }
        },
        scales: {
          y: { beginAtZero: true, ticks: { stepSize: 1 } }
        }
      }
    });
  }
  