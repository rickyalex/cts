<div class="row">
<div id="chart" style = "height:280px" class="col-lg-6">
</div>
<script src="<?echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart'
  },
  credits: {
        enabled: false
    },
  title: {
   text: 'Revenue',
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
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: 'Revenue',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Target',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Revenue',
            type: 'column',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik); ?>
        }, {
            name: 'Target Revenue',
            type: 'line',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik1); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>

<div id="chart2" style = "height:280px" class="col-lg-6">
</div>
<script src="<?echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
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
   text: 'cost',
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
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: 'Cost',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Target Cost',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Cost',
            type: 'column',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik4); ?>
        }, {
            name: 'Target Cost',
            type: 'line',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik5); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>

<div id="chart1" style = "height:280px" class="col-lg-6">
</div>
<script src="<?echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
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
   text: 'Ebitda',
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
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: 'Ebitda',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Target Ebitda',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: 'Rp. {value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: 'Ebitda',
            type: 'column',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik2); ?>
        }, {
            name: 'Target Ebitda',
            type: 'line',
            tooltip: {
                valuePrefix: 'Rp. '
            },
            data: <?php echo json_encode($grafik3); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>

<div id="chart3" style = "height:280px" class="col-lg-6">
</div>
<script src="<?echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?echo base_url();?>assets/highcharts/themes/grid-light.js" type="text/javascript"></script>
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
   text: 'cost / revenue',
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
            labels: {
                format: '{value} %',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: '% Cost/Revenue',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '% Target Cost/Revenue',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} %',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
  
  series: [{
            name: '% Cost/Revenue',
            type: 'column',
            tooltip: {
                valueSufix: '%'
            },
            data: <?php echo json_encode($grafik6); ?>
        }, {
            name: '% Target Cost/Revenue',
            type: 'line',
            tooltip: {
                valueSufix: '%'
            },
            data: <?php echo json_encode($grafik7); ?>
        }],
  exporting: {
            enabled: false
        }
 });
});
</script>
</div>
