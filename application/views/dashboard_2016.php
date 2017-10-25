<div class="row">
<div id="chart" style = "height:280px" class="col-lg-6">
</div>
<script src="<?php echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
	new Highcharts.setOptions({
    lang: {
        decimalPoint: ',',
        thousandsSep: '.'
    },
	chart: {
        style: {
            fontFamily: 'Arial'
        }
    }
	});
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart'
  },
  credits: {
        enabled: false
    },
  title: {
   text: 'Report  Revenue 2016',
   x: -20
  },
  tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
  subtitle: {
   text: '',
   x: -20
  },
  plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },  
  series: [{
            name: 'Rev',
            type: 'pie',
            data: <?php echo $grafik; ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>


<div id="chart1" style = "height:280px" class="col-lg-6">
</div>
<script src="<?php echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart1'
  },
  credits: {
        enabled: false
    },
  title: {
   text: 'revenue bisnis bcs  2016',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: [{ // Primary yAxis
            title: {
                text: 'Revenue',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            min: 10000000000,
            max: 40000000000
        }, { // Secondary yAxis
            title: {
                text: 'Target Revenue',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Revenue',
            type: 'column',
            data: <?php echo json_encode($grafik1); ?>
        }, {
            name: 'Target Revenue',
            type: 'line',
            data: <?php echo json_encode($grafik2); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>
<div id="chart2" style = "height:280px" class="col-lg-6">
</div>
<script src="<?php echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart2'
  },
  credits: {
        enabled: false
    },
  title: {
   text: 'cost bisnis bcs  2016',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: [{ // Primary yAxis
            title: {
                text: 'Cost',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
			min: 10000000000,
            max: 40000000000
        }, { // Secondary yAxis
            title: {
                text: 'Target Cost',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Cost',
            type: 'column',
            data: <?php echo json_encode($grafik3); ?>
        }, {
            name: 'Target Cost',
            type: 'line',
            data: <?php echo json_encode($grafik4); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>
<div id="chart3" style = "height:280px" class="col-lg-6">
</div>
<script src="<?php echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart3'
  },
  credits: {
        enabled: false
    },
  title: {
   text: 'Year to date  2016',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Revenue', 'Cost', 'Gross Margin']
  },
  yAxis: [{ // Primary yAxis
            title: {
                text: 'Actual',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
						
        }, { // Secondary yAxis
            title: {
                text: 'Target',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
				format: 'Rp. {value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Actual',
            type: 'column',
            data: <?php echo json_encode($grafik5); ?>
        }, {
            name: 'Target',
            type: 'line',
            data: [388036448473, 295430964960, 92605483513]
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>
</div>
