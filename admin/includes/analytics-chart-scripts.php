
<?php getChartData(); ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
     google.charts.load('current', {
         'packages': ['bar']
     });
     google.charts.setOnLoadCallback(drawChart);

     function drawChart() {
         var data = google.visualization.arrayToDataTable([
             ['Category', 'Total'],
             <?php
                $stats_categories = ["Users", "Admins", "Regular", "Posts", "Published", "Drafted", "Comments", "Published", "Drafted"];
                $stats = [
                    $total_users, $total_admin_users, $total_regular_users, $total_posts_cnt, $total_published_posts_cnt,
                    $total_drafted_posts_cnt, $total_comments_cnt, $total_published_comments_cnt, $total_drafted_comments_cnt
                ];
                for ($i = 0 ; $i < count($stats) ; $i++) {
                    echo "['{$stats_categories[$i]}'" . "," . "{$stats[$i]}],";
                }
                ?>
         ]);

         var options = {
             chart: {
                 title: 'Total Analytics',

             },
             bar: {
                 groupWidth: "50%"
             },
             colors: ["#40c4ff"]
         };

         var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

         chart.draw(data, google.charts.Bar.convertOptions(options));
     }
 </script>