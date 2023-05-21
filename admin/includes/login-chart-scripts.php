<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['geochart'],
  });
  google.charts.setOnLoadCallback(drawRegionsMap);

  function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable([
      ['Country', 'Logins'],
      <?php getLoginsChartData(); ?>

    ]);

    var options = {
      <?php
      if (isset($_COOKIE["theme_color"])) {
        $color = $_COOKIE["theme_color"];
        echo $color;
      } else {
        echo "colors : ['#40c4ff']";
      }
      ?>


    };

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }
</script>