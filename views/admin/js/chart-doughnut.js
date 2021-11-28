$(document).ready(function () {
  $.ajax({
    method: "POST",
    url: "../../controller/AdminViewController.php",
    data: { option: "adminDashboard" },
  })
    .done(function (data) {
      var graphData = $.parseJSON(data);
      var graphLabels = [];
      var graphValues = [];
      console.log(graphData);
      for (var i = 0; i < graphData.length; i++) {
        graphLabels.push(graphData[i]["category_name"]);
        graphValues.push(graphData[i]["total_posts"]);
      }
      newChart(graphLabels, graphValues);
    })
    .fail(function (error) {
      console.log(error);
    });
});

function newChart(graphLabels, graphValues) {
  const dataDoughnut = {
    labels: graphLabels,
    datasets: [
      {
        label: "My First Dataset",
        data: graphValues,
        backgroundColor: colors,
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut = {
    type: "doughnut",
    data: dataDoughnut,
  };

  const doughnutChart = new Chart(
    document.getElementById("myDoughnutChart"),
    configDoughnut
  );
}

const colors = [
  "#fafa6e",
  "#e0f470",
  "#c7ed73",
  "#aee678",
  "#97dd7d",
  "#81d581",
  "#6bcc86",
  "#56c28a",
  "#42b98d",
  "#2eaf8f",
  "#18a48f",
  "#009a8f",
  "#00908d",
  "#008589",
  "#007b84",
  "#0c707d",
  "#196676",
  "#215c6d",
  "#275263",
  "#2a4858",
];
